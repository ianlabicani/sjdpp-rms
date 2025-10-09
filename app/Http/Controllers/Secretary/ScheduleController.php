<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Schedule::with('user');

        // Filter by sacrament type
        if ($request->filled('sacrament_type')) {
            $query->where('sacrament_type', $request->sacrament_type);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search by client name
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('client_name', 'like', "%{$search}%")
                    ->orWhere('contact_number', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('schedule_date', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('schedule_date', '<=', $request->date_to);
        }

        // Sorting
        $allowedSorts = ['schedule_date', 'schedule_time', 'created_at', 'client_name'];
        $sort = in_array($request->sort, $allowedSorts) ? $request->sort : 'schedule_date';
        $direction = $request->direction === 'asc' ? 'asc' : 'desc';
        $query->orderBy($sort, $direction);

        $schedules = $query->paginate(15)->withQueryString();

        // Statistics
        $stats = [
            'total' => Schedule::count(),
            'pending' => Schedule::where('status', 'pending')->count(),
            'cancelled' => Schedule::where('status', 'cancelled')->count(),
            'approved' => Schedule::where('status', 'approved')->count(),
            'declined' => Schedule::where('status', 'declined')->count(),
            'completed' => Schedule::where('status', 'completed')->count(),
            'today' => Schedule::whereDate('schedule_date', now())->count(),

        ];

        return view('secretary.schedule.index', compact('schedules', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Get year and month from request or use current
        $year = $request->get('year', now()->year);
        $month = $request->get('month', now()->month);

        // Create carbon instance for the first day of the month
        $date = \Carbon\Carbon::createFromDate($year, $month, 1);

        // Get schedules for the month
        $schedules = Schedule::with('user')
            ->whereYear('schedule_date', $year)
            ->whereMonth('schedule_date', $month)
            ->orderBy('schedule_date')
            ->orderBy('schedule_time')
            ->get()
            ->groupBy(function ($schedule) {
                return $schedule->schedule_date->format('Y-m-d');
            });

        return view('secretary.schedule.create', compact('schedules', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Base validation rules
        $rules = [
            'sacrament_type' => 'required|in:baptismal,burial,confirmation,wedding,blessing,parish_mass,barrio_mass,school_mass',
            'client_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'schedule_date' => 'required|date|after_or_equal:today',
            'schedule_time' => 'required',
            'notes' => 'nullable|string',
            'status' => 'required|in:pending,cancelled,approved,declined,completed',
            // Common fields
            'presider_name' => 'nullable|string|max:255',
            'location_text' => 'nullable|string',
            'expected_attendees' => 'nullable|integer|min:0',
            'sound_system_needed' => 'nullable|boolean',
            'stipend_amount' => 'nullable|numeric|min:0',
        ];

        // Add conditional validation based on sacrament type
        if ($request->sacrament_type === 'blessing') {
            $rules = array_merge($rules, [
                'blessing_type' => 'required|in:house,store,office,vehicle,image,other',
                'owner_name' => 'required|string|max:255',
                'address' => 'required|string',
                'barangay_name' => 'nullable|string|max:255',
                'occupants_count' => 'nullable|integer|min:0',
                'items_prepared' => 'nullable|string',
                'access_notes' => 'nullable|string',
            ]);
        }

        if (in_array($request->sacrament_type, ['parish_mass', 'barrio_mass', 'school_mass'])) {
            $rules = array_merge($rules, [
                'mass_category' => 'required_if:sacrament_type,parish_mass,barrio_mass,school_mass|nullable|in:sunday,weekday,holy_day,special_occasion,memorial,other',
                'intention_summary' => 'nullable|string',
                'ministers_needed' => 'nullable|boolean',
                'choir_team' => 'nullable|string|max:255',
                'recurrence' => 'nullable|in:none,weekly,monthly',
            ]);
        }

        if ($request->sacrament_type === 'parish_mass') {
            $rules['chapel_name'] = 'nullable|string|max:255';
        }

        if ($request->sacrament_type === 'barrio_mass') {
            $rules = array_merge($rules, [
                'barangay_name' => 'required|string|max:255',
                'sitio_name' => 'nullable|string|max:255',
                'chapel_name' => 'nullable|string|max:255',
                'barrio_coordinator' => 'nullable|string|max:255',
                'barrio_coordinator_phone' => 'nullable|string|max:255',
                'generator_needed' => 'nullable|boolean',
                'transport_needed' => 'nullable|boolean',
            ]);
        }

        if ($request->sacrament_type === 'school_mass') {
            $rules = array_merge($rules, [
                'school_name' => 'required|string|max:255',
                'campus_or_venue' => 'nullable|string|max:255',
                'grade_levels' => 'nullable|string|max:255',
                'expected_students' => 'nullable|integer|min:0',
                'expected_faculty' => 'nullable|integer|min:0',
                'assembly_time' => 'nullable|date_format:H:i',
            ]);
        }

        $validated = $request->validate($rules);
        $validated['user_id'] = auth()->id();

        Schedule::create($validated);

        return redirect()->route('secretary.schedule.index')
            ->with('success', 'Schedule created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        $schedule->load('user');

        return view('secretary.schedule.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        return view('secretary.schedule.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        // Base validation rules
        $rules = [
            'sacrament_type' => 'required|in:baptismal,burial,confirmation,wedding,blessing,parish_mass,barrio_mass,school_mass',
            'client_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'schedule_date' => 'required|date',
            'schedule_time' => 'required',
            'notes' => 'nullable|string',
            'status' => 'required|in:pending,cancelled,approved,declined,completed',
            // Common fields
            'presider_name' => 'nullable|string|max:255',
            'location_text' => 'nullable|string',
            'expected_attendees' => 'nullable|integer|min:0',
            'sound_system_needed' => 'nullable|boolean',
            'stipend_amount' => 'nullable|numeric|min:0',
        ];

        // Add conditional validation based on sacrament type
        if ($request->sacrament_type === 'blessing') {
            $rules = array_merge($rules, [
                'blessing_type' => 'required|in:house,store,office,vehicle,image,other',
                'owner_name' => 'required|string|max:255',
                'address' => 'required|string',
                'barangay_name' => 'nullable|string|max:255',
                'occupants_count' => 'nullable|integer|min:0',
                'items_prepared' => 'nullable|string',
                'access_notes' => 'nullable|string',
            ]);
        }

        if (in_array($request->sacrament_type, ['parish_mass', 'barrio_mass', 'school_mass'])) {
            $rules = array_merge($rules, [
                'mass_category' => 'required_if:sacrament_type,parish_mass,barrio_mass,school_mass|nullable|in:sunday,weekday,holy_day,special_occasion,memorial,other',
                'intention_summary' => 'nullable|string',
                'ministers_needed' => 'nullable|boolean',
                'choir_team' => 'nullable|string|max:255',
                'recurrence' => 'nullable|in:none,weekly,monthly',
            ]);
        }

        if ($request->sacrament_type === 'parish_mass') {
            $rules['chapel_name'] = 'nullable|string|max:255';
        }

        if ($request->sacrament_type === 'barrio_mass') {
            $rules = array_merge($rules, [
                'barangay_name' => 'required|string|max:255',
                'sitio_name' => 'nullable|string|max:255',
                'chapel_name' => 'nullable|string|max:255',
                'barrio_coordinator' => 'nullable|string|max:255',
                'barrio_coordinator_phone' => 'nullable|string|max:255',
                'generator_needed' => 'nullable|boolean',
                'transport_needed' => 'nullable|boolean',
            ]);
        }

        if ($request->sacrament_type === 'school_mass') {
            $rules = array_merge($rules, [
                'school_name' => 'required|string|max:255',
                'campus_or_venue' => 'nullable|string|max:255',
                'grade_levels' => 'nullable|string|max:255',
                'expected_students' => 'nullable|integer|min:0',
                'expected_faculty' => 'nullable|integer|min:0',
                'assembly_time' => 'nullable|date_format:H:i',
            ]);
        }

        $validated = $request->validate($rules);

        $schedule->update($validated);

        return redirect()->route('secretary.schedule.index')
            ->with('success', 'Schedule updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('secretary.schedule.index')
            ->with('success', 'Schedule deleted successfully.');
    }

    /**
     * Update the status of a schedule
     */
    public function updateStatus(Request $request, Schedule $schedule)
    {
                $validated = $request->validate([
            'status' => 'required|in:pending,cancelled,approved,declined,completed',
        ]);

        $schedule->update($validated);

        return redirect()->back()
            ->with('success', 'Schedule status updated successfully.');
    }

    /**
     * Display calendar view of schedules
     */
    public function calendar(Request $request)
    {
        // Get year and month from request or use current
        $year = $request->get('year', now()->year);
        $month = $request->get('month', now()->month);

        // Create carbon instance for the first day of the month
        $date = \Carbon\Carbon::createFromDate($year, $month, 1);

        // Get schedules for the month
        $schedules = Schedule::with('user')
            ->whereYear('schedule_date', $year)
            ->whereMonth('schedule_date', $month)
            ->orderBy('schedule_date')
            ->orderBy('schedule_time')
            ->get()
            ->groupBy(function ($schedule) {
                return $schedule->schedule_date->format('Y-m-d');
            });

        // Statistics
        $stats = [
            'total' => Schedule::count(),
            'pending' => Schedule::where('status', 'pending')->count(),
            'cancelled' => Schedule::where('status', 'cancelled')->count(),
            'approved' => Schedule::where('status', 'approved')->count(),
            'declined' => Schedule::where('status', 'declined')->count(),
            'completed' => Schedule::where('status', 'completed')->count(),
            'today' => Schedule::whereDate('schedule_date', now())->count(),
        ];

        return view('secretary.schedule.calendar', compact('schedules', 'date', 'stats'));
    }
}
