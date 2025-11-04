@extends('secretary.shell')

@section('title', 'Secretary Dashboard')

@extends('secretary.shell')

@section('title', 'Dashboard')

@section('secretary-content')

    <!-- Main Content -->
    <div class="pt-16 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Welcome Section -->
            <div class="bg-gradient-to-r from-blue-600 to-cyan-600 rounded-xl shadow-lg p-8 mb-8 text-white">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-3xl font-bold mb-2">Welcome, {{ auth()->user()->name }}</h1>
                        <p class="text-blue-100">Manage administrative tasks and church records</p>
                    </div>
                </div>
            </div>

            <!-- Main Statistics Cards -->
            <div class="grid md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Baptismal Records</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $baptismalCount }}</h3>
                            <p class="text-sm text-green-600 mt-1">
                                <i class="fas fa-arrow-up mr-1"></i>{{ $recentStats['baptismal'] }} this month
                            </p>
                        </div>
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-water text-blue-600 text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Burial Records</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $burialCount }}</h3>
                            <p class="text-sm text-green-600 mt-1">
                                <i class="fas fa-arrow-up mr-1"></i>{{ $recentStats['burial'] }} this month
                            </p>
                        </div>
                        <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-cross text-purple-600 text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Confirmation Records</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $confirmationCount }}</h3>
                            <p class="text-sm text-green-600 mt-1">
                                <i class="fas fa-arrow-up mr-1"></i>{{ $recentStats['confirmation'] }} this month
                            </p>
                        </div>
                        <div class="w-14 h-14 bg-indigo-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-hands-praying text-indigo-600 text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Wedding Records</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $weddingCount }}</h3>
                            <p class="text-sm text-green-600 mt-1">
                                <i class="fas fa-arrow-up mr-1"></i>{{ $recentStats['wedding'] }} this month
                            </p>
                        </div>
                        <div class="w-14 h-14 bg-pink-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-heart text-pink-600 text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Schedule Statistics -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Schedule Statistics</h2>
                <div class="grid md:grid-cols-5 gap-6">
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-calendar text-gray-600 text-xl"></i>
                        </div>
                        <p class="text-sm text-gray-600 font-medium mb-2">Total Schedules</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $scheduleStats['total'] }}</h3>
                    </div>

                    <div class="text-center p-4 bg-yellow-50 rounded-lg">
                        <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-clock text-yellow-600 text-xl"></i>
                        </div>
                        <p class="text-sm text-gray-600 font-medium mb-2">Pending</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $scheduleStats['pending'] }}</h3>
                    </div>

                    <div class="text-center p-4 bg-blue-50 rounded-lg">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-check-circle text-blue-600 text-xl"></i>
                        </div>
                        <p class="text-sm text-gray-600 font-medium mb-2">Approved</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $scheduleStats['approved'] }}</h3>
                    </div>

                    <div class="text-center p-4 bg-green-50 rounded-lg">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-calendar-check text-green-600 text-xl"></i>
                        </div>
                        <p class="text-sm text-gray-600 font-medium mb-2">Completed</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $scheduleStats['completed'] }}</h3>
                    </div>

                    <div class="text-center p-4 bg-orange-50 rounded-lg">
                        <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-calendar-day text-orange-600 text-xl"></i>
                        </div>
                        <p class="text-sm text-gray-600 font-medium mb-2">Today</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $scheduleStats['today'] }}</h3>
                    </div>
                </div>
            </div>

            <!-- This Year Overview -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">This Year Overview ({{ now()->year }})</h2>
                <div class="grid md:grid-cols-4 gap-6">
                    <div class="text-center p-4 bg-blue-50 rounded-lg">
                        <i class="fas fa-water text-4xl text-blue-600 mb-3"></i>
                        <p class="text-sm text-gray-600 font-medium">Baptismals</p>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ $thisYearStats['baptismal'] }}</p>
                    </div>
                    <div class="text-center p-4 bg-purple-50 rounded-lg">
                        <i class="fas fa-cross text-4xl text-purple-600 mb-3"></i>
                        <p class="text-sm text-gray-600 font-medium">Burials</p>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ $thisYearStats['burial'] }}</p>
                    </div>
                    <div class="text-center p-4 bg-indigo-50 rounded-lg">
                        <i class="fas fa-hands-praying text-4xl text-indigo-600 mb-3"></i>
                        <p class="text-sm text-gray-600 font-medium">Confirmations</p>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ $thisYearStats['confirmation'] }}</p>
                    </div>
                    <div class="text-center p-4 bg-pink-50 rounded-lg">
                        <i class="fas fa-heart text-4xl text-pink-600 mb-3"></i>
                        <p class="text-sm text-gray-600 font-medium">Weddings</p>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ $thisYearStats['wedding'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions and Recent Activities -->
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Quick Actions -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Quick Actions</h2>
                    <div class="space-y-4">
                        <a href="#" class="flex items-center p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition group">
                            <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-user-plus text-white text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800 group-hover:text-blue-600">Register Member</h3>
                                <p class="text-sm text-gray-600">Add new church member</p>
                            </div>
                        </a>

                        <a href="{{ route('secretary.baptismal.index') }}" class="flex items-center p-4 bg-green-50 hover:bg-green-100 rounded-lg transition group">
                            <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-water text-white text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800 group-hover:text-green-600">Baptism Records</h3>
                                <p class="text-sm text-gray-600">Manage baptism certificates</p>
                            </div>
                        </a>

                        <a href="{{ route('secretary.burial.index') }}" class="flex items-center p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition group">
                            <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-cross text-white text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800 group-hover:text-purple-600">Burial Records</h3>
                                <p class="text-sm text-gray-600">Manage burial certificates</p>
                            </div>
                        </a>

                        <a href="{{ route('secretary.confirmation.index') }}" class="flex items-center p-4 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition group">
                            <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-hands-praying text-white text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800 group-hover:text-indigo-600">Confirmation Records</h3>
                                <p class="text-sm text-gray-600">Manage confirmation certificates</p>
                            </div>
                        </a>

                        <a href="{{ route('secretary.wedding.index') }}" class="flex items-center p-4 bg-pink-50 hover:bg-pink-100 rounded-lg transition group">
                            <div class="w-12 h-12 bg-pink-600 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-heart text-white text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800 group-hover:text-pink-600">Wedding Records</h3>
                                <p class="text-sm text-gray-600">Manage wedding certificates</p>
                            </div>
                        </a>

                        <a href="{{ route('secretary.schedule.create') }}" class="flex items-center p-4 bg-orange-50 hover:bg-orange-100 rounded-lg transition group">
                            <div class="w-12 h-12 bg-orange-600 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-calendar-alt text-white text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800 group-hover:text-orange-600">Schedule Appointment</h3>
                                <p class="text-sm text-gray-600">Book appointments</p>
                            </div>
                        </a>

                        <a href="#" class="flex items-center p-4 bg-red-50 hover:bg-red-100 rounded-lg transition group">
                            <div class="w-12 h-12 bg-red-600 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-bullhorn text-white text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800 group-hover:text-orange-600">Send Announcements</h3>
                                <p class="text-sm text-gray-600">Notify members</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Recent Activities</h2>
                    <div class="space-y-4">
                        @forelse($recentActivities as $activity)
                            <div class="flex items-start pb-4 border-b border-gray-200 last:border-0">
                                <div class="w-10 h-10 bg-{{ $activity['color'] }}-100 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                    <i class="fas {{ $activity['icon'] }} text-{{ $activity['color'] }}-600"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-gray-800">{{ $activity['title'] }}</p>
                                    <p class="text-sm text-gray-600 truncate">{{ $activity['description'] }}</p>
                                    <p class="text-xs text-gray-400 mt-1">{{ $activity['time']->diffForHumans() }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8 text-gray-500">
                                <i class="fas fa-inbox text-4xl mb-3"></i>
                                <p>No recent activities</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
