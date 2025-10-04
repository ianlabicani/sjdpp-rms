@extends('secretary.shell')

@section('secretary-content')
<div class="pt-16 min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Schedule Calendar</h1>
                <p class="text-gray-600 mt-1">View appointments in calendar format</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('secretary.schedule.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg shadow transition duration-150">
                    <i class="fas fa-list mr-2"></i>
                    List View
                </a>
                <a href="{{ route('secretary.schedule.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition duration-150">
                    <i class="fas fa-plus mr-2"></i>
                    New Schedule
                </a>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-gray-100 rounded-lg">
                        <i class="fas fa-calendar text-2xl text-gray-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Total Schedules</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-yellow-100 rounded-lg">
                        <i class="fas fa-clock text-2xl text-yellow-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Pending</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['pending'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <i class="fas fa-check-circle text-2xl text-blue-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Confirmed</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['confirmed'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-lg">
                        <i class="fas fa-calendar-day text-2xl text-green-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Today</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['today'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Calendar Navigation -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <div class="flex justify-between items-center">
                <a href="{{ route('secretary.schedule.calendar', ['year' => $date->copy()->subMonth()->year, 'month' => $date->copy()->subMonth()->month]) }}"
                   class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-lg transition duration-150">
                    <i class="fas fa-chevron-left mr-2"></i>Previous
                </a>
                <h2 class="text-2xl font-bold text-gray-900">{{ $date->format('F Y') }}</h2>
                <a href="{{ route('secretary.schedule.calendar', ['year' => $date->copy()->addMonth()->year, 'month' => $date->copy()->addMonth()->month]) }}"
                   class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-lg transition duration-150">
                    Next<i class="fas fa-chevron-right ml-2"></i>
                </a>
            </div>
        </div>

        <!-- Calendar -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="grid grid-cols-7 bg-gray-100 border-b border-gray-200">
                <div class="p-3 text-center font-semibold text-gray-700">Sun</div>
                <div class="p-3 text-center font-semibold text-gray-700">Mon</div>
                <div class="p-3 text-center font-semibold text-gray-700">Tue</div>
                <div class="p-3 text-center font-semibold text-gray-700">Wed</div>
                <div class="p-3 text-center font-semibold text-gray-700">Thu</div>
                <div class="p-3 text-center font-semibold text-gray-700">Fri</div>
                <div class="p-3 text-center font-semibold text-gray-700">Sat</div>
            </div>

            <div class="grid grid-cols-7">
                @php
                    $firstDayOfMonth = $date->copy()->startOfMonth();
                    $lastDayOfMonth = $date->copy()->endOfMonth();
                    $startDate = $firstDayOfMonth->copy()->startOfWeek(\Carbon\Carbon::SUNDAY);
                    $endDate = $lastDayOfMonth->copy()->endOfWeek(\Carbon\Carbon::SATURDAY);
                    $currentDate = $startDate->copy();
                    $today = now()->format('Y-m-d');
                @endphp

                @while($currentDate <= $endDate)
                    @php
                        $dateKey = $currentDate->format('Y-m-d');
                        $isCurrentMonth = $currentDate->month === $date->month;
                        $isToday = $dateKey === $today;
                        $daySchedules = $schedules->get($dateKey, collect());
                    @endphp

                    <div class="min-h-32 border-b border-r border-gray-200 p-2 {{ $isCurrentMonth ? 'bg-white' : 'bg-gray-50' }} {{ $isToday ? 'ring-2 ring-indigo-500' : '' }}">
                        <div class="flex justify-between items-start mb-1">
                            <span class="text-sm font-semibold {{ $isCurrentMonth ? 'text-gray-900' : 'text-gray-400' }} {{ $isToday ? 'bg-indigo-600 text-white rounded-full w-7 h-7 flex items-center justify-center' : '' }}">
                                {{ $currentDate->day }}
                            </span>
                            @if($daySchedules->count() > 0)
                                <span class="text-xs bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full font-semibold">
                                    {{ $daySchedules->count() }}
                                </span>
                            @endif
                        </div>

                        <div class="space-y-1">
                            @foreach($daySchedules->take(3) as $schedule)
                                <a href="{{ route('secretary.schedule.show', $schedule) }}"
                                   class="block text-xs p-1 rounded cursor-pointer hover:opacity-75 transition bg-{{ $schedule->sacrament_type_color }}-100 border-l-2 border-{{ $schedule->sacrament_type_color }}-500">
                                    <div class="font-semibold text-{{ $schedule->sacrament_type_color }}-900 truncate">
                                        {{ date('g:i A', strtotime($schedule->schedule_time)) }}
                                    </div>
                                    <div class="text-{{ $schedule->sacrament_type_color }}-700 truncate">
                                        {{ $schedule->client_name }}
                                    </div>
                                    <div class="flex items-center gap-1 mt-1">
                                        <span class="px-1 py-0.5 text-xs rounded bg-{{ $schedule->sacrament_type_color }}-200 text-{{ $schedule->sacrament_type_color }}-800">
                                            @if($schedule->sacrament_type == 'baptismal')
                                                <i class="fas fa-water"></i>
                                            @elseif($schedule->sacrament_type == 'burial')
                                                <i class="fas fa-cross"></i>
                                            @elseif($schedule->sacrament_type == 'confirmation')
                                                <i class="fas fa-hands-praying"></i>
                                            @else
                                                <i class="fas fa-heart"></i>
                                            @endif
                                        </span>
                                        <span class="px-1 py-0.5 text-xs rounded bg-{{ $schedule->status_color }}-200 text-{{ $schedule->status_color }}-800">
                                            {{ substr($schedule->status, 0, 4) }}
                                        </span>
                                    </div>
                                </a>
                            @endforeach

                            @if($daySchedules->count() > 3)
                                <div class="text-xs text-gray-500 text-center font-semibold">
                                    +{{ $daySchedules->count() - 3 }} more
                                </div>
                            @endif
                        </div>
                    </div>

                    @php
                        $currentDate->addDay();
                    @endphp
                @endwhile
            </div>
        </div>

        <!-- Legend -->
        <div class="mt-6 bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Legend</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-blue-500 rounded"></div>
                    <span class="text-sm text-gray-700">Baptismal</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-purple-500 rounded"></div>
                    <span class="text-sm text-gray-700">Burial</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-indigo-500 rounded"></div>
                    <span class="text-sm text-gray-700">Confirmation</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-pink-500 rounded"></div>
                    <span class="text-sm text-gray-700">Wedding</span>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-yellow-500 rounded"></div>
                    <span class="text-sm text-gray-700">Pending</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-blue-500 rounded"></div>
                    <span class="text-sm text-gray-700">Confirmed</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-green-500 rounded"></div>
                    <span class="text-sm text-gray-700">Completed</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-red-500 rounded"></div>
                    <span class="text-sm text-gray-700">Cancelled</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
