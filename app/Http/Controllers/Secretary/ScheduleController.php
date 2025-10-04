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
            'confirmed' => Schedule::where('status', 'confirmed')->count(),
            'today' => Schedule::whereDate('schedule_date', now())->count(),
        ];

        return view('secretary.schedule.index', compact('schedules', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('secretary.schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sacrament_type' => 'required|in:baptismal,burial,confirmation,wedding',
            'client_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'schedule_date' => 'required|date|after_or_equal:today',
            'schedule_time' => 'required',
            'notes' => 'nullable|string',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

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
        $validated = $request->validate([
            'sacrament_type' => 'required|in:baptismal,burial,confirmation,wedding',
            'client_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'schedule_date' => 'required|date',
            'schedule_time' => 'required',
            'notes' => 'nullable|string',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

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
            'status' => 'required|in:pending,confirmed,completed,cancelled',
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
            ->groupBy(function($schedule) {
                return $schedule->schedule_date->format('Y-m-d');
            });

        // Statistics
        $stats = [
            'total' => Schedule::count(),
            'pending' => Schedule::where('status', 'pending')->count(),
            'confirmed' => Schedule::where('status', 'confirmed')->count(),
            'today' => Schedule::whereDate('schedule_date', now())->count(),
        ];

        return view('secretary.schedule.calendar', compact('schedules', 'date', 'stats'));
    }
}
