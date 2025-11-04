<?php

namespace App\Http\Controllers\Priest;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get all pending schedules for the priest to review
        $pendingSchedules = Schedule::where('status', 'pending')
            ->orderBy('schedule_date', 'asc')
            ->limit(5)
            ->get();

        // Get today's schedule
        $todaySchedules = Schedule::where('status', 'approved')
            ->whereDate('schedule_date', today())
            ->orderBy('schedule_time', 'asc')
            ->get();

        // Get total users in the system (parishioners)
        $totalMembers = User::count();

        // Get count of upcoming schedules (next 30 days)
        $upcomingCount = Schedule::where('status', 'approved')
            ->whereDate('schedule_date', '>=', today())
            ->whereDate('schedule_date', '<=', today()->addDays(30))
            ->count();

        // Get count of all approved schedules (sacraments)
        $sacramentCount = Schedule::whereIn('sacrament_type', ['baptismal', 'burial', 'confirmation', 'wedding'])
            ->where('status', 'approved')
            ->count();

        // Get count of pending schedules for review
        $prayerRequestsCount = Schedule::where('status', 'pending')->count();

        return view('priest.dashboard', [
            'totalMembers' => $totalMembers,
            'upcomingCount' => $upcomingCount,
            'sacramentCount' => $sacramentCount,
            'prayerRequestsCount' => $prayerRequestsCount,
            'pendingSchedules' => $pendingSchedules,
            'todaySchedules' => $todaySchedules,
        ]);
    }
}
