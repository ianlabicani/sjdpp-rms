<?php

namespace App\Http\Controllers\Priest;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display calendar view of schedules.
     */
    public function calendar(Request $request)
    {
        $month = $request->get('month', now()->month);
        $year = $request->get('year', now()->year);

        $currentDate = \Carbon\Carbon::create($year, $month, 1);
        $startOfMonth = $currentDate->copy()->startOfMonth();
        $endOfMonth = $currentDate->copy()->endOfMonth();

        // Get all schedules for the month
        $schedules = Schedule::with('user')
            ->whereBetween('schedule_date', [$startOfMonth, $endOfMonth])
            ->orderBy('schedule_time')
            ->get()
            ->groupBy(function ($schedule) {
                return $schedule->schedule_date->format('Y-m-d');
            });

        // Statistics for the month
        $stats = [
            'total' => Schedule::whereBetween('schedule_date', [$startOfMonth, $endOfMonth])->count(),
            'pending' => Schedule::whereBetween('schedule_date', [$startOfMonth, $endOfMonth])
                ->where('status', 'pending')->count(),
            'approved' => Schedule::whereBetween('schedule_date', [$startOfMonth, $endOfMonth])
                ->where('status', 'approved')->count(),
            'declined' => Schedule::whereBetween('schedule_date', [$startOfMonth, $endOfMonth])
                ->where('status', 'declined')->count(),
        ];

        return view('priest.schedule.calendar', compact('schedules', 'stats', 'currentDate'));
    }

    /**
     * Display a listing of schedules for priest review.
     */
    public function index(Request $request)
    {
        $query = Schedule::with('user')->latest('schedule_date');

        // Filter by sacrament type
        if ($request->filled('sacrament_type')) {
            $query->where('sacrament_type', $request->sacrament_type);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->where('schedule_date', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->where('schedule_date', '<=', $request->date_to);
        }

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('client_name', 'like', '%'.$request->search.'%')
                    ->orWhere('contact_number', 'like', '%'.$request->search.'%')
                    ->orWhere('email', 'like', '%'.$request->search.'%');
            });
        }

        $schedules = $query->paginate(15);

        // Statistics
        $stats = [
            'total' => Schedule::count(),
            'pending' => Schedule::where('status', 'pending')->count(),
            'cancelled' => Schedule::where('status', 'cancelled')->count(),
            'approved' => Schedule::where('status', 'approved')->count(),
            'declined' => Schedule::where('status', 'declined')->count(),
            'completed' => Schedule::where('status', 'completed')->count(),
        ];

        return view('priest.schedule.index', compact('schedules', 'stats'));
    }

    /**
     * Display the specified schedule.
     */
    public function show(Schedule $schedule)
    {
        $schedule->load('user');

        return view('priest.schedule.show', compact('schedule'));
    }

    /**
     * Approve a schedule.
     */
    public function approve(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'priest_notes' => 'nullable|string|max:1000',
        ]);

        $schedule->update([
            'status' => 'approved',
            'priest_notes' => $validated['priest_notes'] ?? null,
            'priest_reviewed_at' => now(),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Schedule approved successfully!');
    }

    /**
     * Decline a schedule.
     */
    public function decline(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'priest_notes' => 'required|string|max:1000',
        ]);

        $schedule->update([
            'status' => 'declined',
            'priest_notes' => $validated['priest_notes'],
            'priest_reviewed_at' => now(),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Schedule declined successfully!');
    }
}
