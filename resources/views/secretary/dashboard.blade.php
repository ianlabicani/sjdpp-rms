@extends('secretary.shell')

@section('secretary-content')

    <!-- Main Content -->
    <div class="pt-16 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Welcome Section -->
            <div class="bg-gradient-to-r from-blue-600 to-cyan-600 rounded-xl shadow-lg p-8 mb-8 text-white">
                <h1 class="text-3xl font-bold mb-2">Welcome, {{ auth()->user()->name }}</h1>
                <p class="text-blue-100">Manage administrative tasks and church records</p>
            </div>

            <!-- Statistics Cards -->
            <div class="grid md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Pending Records</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">15</h3>
                        </div>
                        <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-clock text-yellow-600 text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">New Registrations</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">7</h3>
                        </div>
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-plus text-green-600 text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Documents Filed</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">142</h3>
                        </div>
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-file-alt text-blue-600 text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Appointments</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">9</h3>
                        </div>
                        <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-calendar-check text-purple-600 text-2xl"></i>
                        </div>
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
                                <h3 class="font-semibold text-gray-800 group-hover:text-green-600">Baptismal Records</h3>
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
                        <div class="flex items-start pb-4 border-b border-gray-200">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check-circle text-green-600"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800">Member Registration Completed</h4>
                                <p class="text-sm text-gray-600">John Smith registered successfully</p>
                                <p class="text-xs text-gray-500 mt-1">2 hours ago</p>
                            </div>
                        </div>

                        <div class="flex items-start pb-4 border-b border-gray-200">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-file-alt text-blue-600"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800">Baptism Certificate Issued</h4>
                                <p class="text-sm text-gray-600">Certificate for Maria Santos</p>
                                <p class="text-xs text-gray-500 mt-1">5 hours ago</p>
                            </div>
                        </div>

                        <div class="flex items-start pb-4 border-b border-gray-200">
                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-calendar-check text-purple-600"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800">Appointment Scheduled</h4>
                                <p class="text-sm text-gray-600">Wedding consultation for tomorrow</p>
                                <p class="text-xs text-gray-500 mt-1">Yesterday</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-bell text-orange-600"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800">Announcement Sent</h4>
                                <p class="text-sm text-gray-600">Sunday mass schedule update</p>
                                <p class="text-xs text-gray-500 mt-1">2 days ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
