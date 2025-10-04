<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use App\Models\Baptismal;
use App\Models\Burial;
use App\Models\Confirmation;
use App\Models\Schedule;
use App\Models\Wedding;

class DashboardController extends Controller
{
    public function index()
    {
        // Get counts for each record type
        $baptismalCount = Baptismal::count();
        $burialCount = Burial::count();
        $confirmationCount = Confirmation::count();
        $weddingCount = Wedding::count();

        // Schedule statistics
        $scheduleStats = [
            'total' => Schedule::count(),
            'pending' => Schedule::where('status', 'pending')->count(),
            'cancelled' => Schedule::where('status', 'cancelled')->count(),
            'approved' => Schedule::where('status', 'approved')->count(),
            'declined' => Schedule::where('status', 'declined')->count(),
            'completed' => Schedule::where('status', 'completed')->count(),
            'today' => Schedule::whereDate('schedule_date', now())->count(),
        ];

        // Recent records (last 30 days)
        $recentStats = [
            'baptismal' => Baptismal::where('created_at', '>=', now()->subDays(30))->count(),
            'burial' => Burial::where('created_at', '>=', now()->subDays(30))->count(),
            'confirmation' => Confirmation::where('created_at', '>=', now()->subDays(30))->count(),
            'wedding' => Wedding::where('created_at', '>=', now()->subDays(30))->count(),
        ];

        // This year statistics
        $thisYearStats = [
            'baptismal' => Baptismal::whereYear('baptism_date', now()->year)->count(),
            'burial' => Burial::whereYear('date_of_burial', now()->year)->count(),
            'confirmation' => Confirmation::whereYear('date_of_confirmation', now()->year)->count(),
            'wedding' => Wedding::whereYear('date_of_marriage', now()->year)->count(),
        ];

        // Monthly data for charts (last 6 months)
        $monthlyData = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthlyData[] = [
                'month' => $date->format('M'),
                'baptismal' => Baptismal::whereYear('baptism_date', $date->year)
                    ->whereMonth('baptism_date', $date->month)->count(),
                'burial' => Burial::whereYear('date_of_burial', $date->year)
                    ->whereMonth('date_of_burial', $date->month)->count(),
                'confirmation' => Confirmation::whereYear('date_of_confirmation', $date->year)
                    ->whereMonth('date_of_confirmation', $date->month)->count(),
                'wedding' => Wedding::whereYear('date_of_marriage', $date->year)
                    ->whereMonth('date_of_marriage', $date->month)->count(),
            ];
        }

        // Recent activities (last 10)
        $recentActivities = collect();

        $recentBaptismals = Baptismal::latest()->take(3)->get()->map(function ($item) {
            return [
                'type' => 'baptismal',
                'icon' => 'fa-water',
                'color' => 'blue',
                'title' => 'New Baptismal Record',
                'description' => $item->name,
                'time' => $item->created_at,
            ];
        });

        $recentBurials = Burial::latest()->take(3)->get()->map(function ($item) {
            return [
                'type' => 'burial',
                'icon' => 'fa-cross',
                'color' => 'purple',
                'title' => 'New Burial Record',
                'description' => $item->name,
                'time' => $item->created_at,
            ];
        });

        $recentSchedules = Schedule::latest()->take(4)->get()->map(function ($item) {
            return [
                'type' => 'schedule',
                'icon' => 'fa-calendar',
                'color' => 'orange',
                'title' => ucfirst($item->sacrament_type).' Schedule',
                'description' => $item->client_name,
                'time' => $item->created_at,
            ];
        });

        $recentActivities = $recentActivities
            ->concat($recentBaptismals)
            ->concat($recentBurials)
            ->concat($recentSchedules)
            ->sortByDesc('time')
            ->take(10);

        return view('secretary.dashboard', compact(
            'baptismalCount',
            'burialCount',
            'confirmationCount',
            'weddingCount',
            'scheduleStats',
            'recentStats',
            'thisYearStats',
            'monthlyData',
            'recentActivities'
        ));
    }
}
