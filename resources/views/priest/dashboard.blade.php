@extends('priest.shell')

@section('title', 'Dashboard')

@section('priest-content')
    <!-- Main Content -->
    <div class="pt-16 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 py-6 sm:py-8">
            <!-- Welcome Section -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl shadow-lg p-4 sm:p-6 md:p-8 mb-6 sm:mb-8 text-white">
                <h1 class="text-xl sm:text-2xl md:text-3xl font-bold mb-1 md:mb-2">Welcome, Father {{ auth()->user()->name }}</h1>
                <p class="text-xs sm:text-sm md:text-base text-purple-100">Manage your pastoral duties and church activities</p>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 md:gap-6 mb-6 sm:mb-8">
                <!-- Total Members Card -->
                <div class="bg-white rounded-xl shadow-md p-4 sm:p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-xs sm:text-sm font-medium">Total Members</p>
                            <h3 class="text-2xl sm:text-3xl font-bold text-gray-800 mt-2">{{ $totalMembers }}</h3>
                        </div>
                        <div class="w-12 sm:w-14 h-12 sm:h-14 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 sm:w-8 h-6 sm:h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Masses Card -->
                <div class="bg-white rounded-xl shadow-md p-4 sm:p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-xs sm:text-sm font-medium">Upcoming Schedules</p>
                            <h3 class="text-2xl sm:text-3xl font-bold text-gray-800 mt-2">{{ $upcomingCount }}</h3>
                        </div>
                        <div class="w-12 sm:w-14 h-12 sm:h-14 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 sm:w-8 h-6 sm:h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Sacraments Card -->
                <div class="bg-white rounded-xl shadow-md p-4 sm:p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-xs sm:text-sm font-medium">Sacraments</p>
                            <h3 class="text-2xl sm:text-3xl font-bold text-gray-800 mt-2">{{ $sacramentCount }}</h3>
                        </div>
                        <div class="w-12 sm:w-14 h-12 sm:h-14 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 sm:w-8 h-6 sm:h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Pending Reviews Card -->
                <div class="bg-white rounded-xl shadow-md p-4 sm:p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-xs sm:text-sm font-medium">Pending Reviews</p>
                            <h3 class="text-2xl sm:text-3xl font-bold text-gray-800 mt-2">{{ $prayerRequestsCount }}</h3>
                        </div>
                        <div class="w-12 sm:w-14 h-12 sm:h-14 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 sm:w-8 h-6 sm:h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions and Schedule -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
                <!-- Quick Actions -->
                <div class="bg-white rounded-xl shadow-md p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800 mb-4 sm:mb-6">Quick Actions</h2>
                    <div class="space-y-3 sm:space-y-4">
                        <a href="{{ route('priest.schedule.index') }}" class="flex items-center p-3 sm:p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition group">
                            <div class="w-10 sm:w-12 h-10 sm:h-12 bg-blue-600 rounded-lg flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0">
                                <svg class="w-5 sm:w-6 h-5 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-gray-800 group-hover:text-blue-600 text-sm sm:text-base">Review Schedules</h3>
                                <p class="text-xs sm:text-sm text-gray-600">Approve or decline requests</p>
                            </div>
                        </a>

                        <a href="{{ route('priest.schedule.calendar') }}" class="flex items-center p-3 sm:p-4 bg-green-50 hover:bg-green-100 rounded-lg transition group">
                            <div class="w-10 sm:w-12 h-10 sm:h-12 bg-green-600 rounded-lg flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0">
                                <svg class="w-5 sm:w-6 h-5 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-gray-800 group-hover:text-green-600 text-sm sm:text-base">View Calendar</h3>
                                <p class="text-xs sm:text-sm text-gray-600">See all scheduled events</p>
                            </div>
                        </a>

                        <a href="{{ route('profile.edit') }}" class="flex items-center p-3 sm:p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition group">
                            <div class="w-10 sm:w-12 h-10 sm:h-12 bg-purple-600 rounded-lg flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0">
                                <svg class="w-5 sm:w-6 h-5 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-gray-800 group-hover:text-purple-600 text-sm sm:text-base">Profile Settings</h3>
                                <p class="text-xs sm:text-sm text-gray-600">Update account information</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Today's Schedule -->
                <div class="bg-white rounded-xl shadow-md p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800 mb-4 sm:mb-6">Today's Schedule</h2>
                    @if($todaySchedules->count() > 0)
                        <div class="space-y-3 sm:space-y-4">
                            @foreach($todaySchedules as $schedule)
                                <div class="flex items-start border-l-4 border-{{ $schedule->sacrament_type_color }}-600 pl-3 sm:pl-4 py-2">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xs sm:text-sm text-gray-600">{{ date('g:i A', strtotime($schedule->schedule_time)) }}</p>
                                        <h4 class="font-semibold text-gray-800 text-sm sm:text-base">{{ ucfirst(str_replace('_', ' ', $schedule->sacrament_type)) }}</h4>
                                        <p class="text-xs sm:text-sm text-gray-600">{{ $schedule->client_name }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-500 text-sm sm:text-base">No scheduled events for today</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Pending Reviews Section -->
            @if($pendingSchedules->count() > 0)
                <div class="bg-white rounded-xl shadow-md p-4 sm:p-6 mt-6 sm:mt-8">
                    <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800 mb-4 sm:mb-6">Pending Schedule Reviews</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                        @foreach($pendingSchedules as $schedule)
                            <a href="{{ route('priest.schedule.show', $schedule) }}" class="border border-gray-200 rounded-lg p-3 sm:p-4 hover:border-indigo-400 hover:bg-indigo-50 transition group">
                                <div class="flex items-start justify-between mb-2">
                                    <span class="px-2 sm:px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $schedule->sacrament_type_color }}-100 text-{{ $schedule->sacrament_type_color }}-800">
                                        {{ ucfirst(str_replace('_', ' ', $schedule->sacrament_type)) }}
                                    </span>
                                    <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                </div>
                                <h3 class="font-semibold text-gray-800 group-hover:text-indigo-600 text-sm mb-1">{{ $schedule->client_name }}</h3>
                                <p class="text-xs text-gray-600">{{ $schedule->contact_number }}</p>
                                <p class="text-xs text-gray-600 mt-2">{{ $schedule->schedule_date->format('M d, Y') }} at {{ date('g:i A', strtotime($schedule->schedule_time)) }}</p>
                            </a>
                        @endforeach
                    </div>
                    <div class="mt-4 sm:mt-6">
                        <a href="{{ route('priest.schedule.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition text-sm sm:text-base">
                            View All Pending <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
