@extends('priest.shell')

@section('priest-content')

    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Church Logo" class="h-12 w-12 rounded-full object-cover">
                    <div>
                        <span class="text-xl font-bold text-gray-800">SJDPP Church</span>
                        <p class="text-xs text-gray-600">Priest Dashboard</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700 font-medium">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition font-medium">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-16 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Welcome Section -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl shadow-lg p-8 mb-8 text-white">
                <h1 class="text-3xl font-bold mb-2">Welcome, Father {{ auth()->user()->name }}</h1>
                <p class="text-purple-100">Manage your pastoral duties and church activities</p>
            </div>

            <!-- Statistics Cards -->
            <div class="grid md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Total Members</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">500</h3>
                        </div>
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Upcoming Masses</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">12</h3>
                        </div>
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Sacraments</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">8</h3>
                        </div>
                        <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Prayer Requests</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">23</h3>
                        </div>
                        <div class="w-14 h-14 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions and Schedule -->
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Quick Actions -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Quick Actions</h2>
                    <div class="space-y-4">
                        <a href="#" class="flex items-center p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition group">
                            <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800 group-hover:text-blue-600">Schedule Mass</h3>
                                <p class="text-sm text-gray-600">Add a new mass schedule</p>
                            </div>
                        </a>

                        <a href="#" class="flex items-center p-4 bg-green-50 hover:bg-green-100 rounded-lg transition group">
                            <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800 group-hover:text-green-600">Sacrament Records</h3>
                                <p class="text-sm text-gray-600">Manage baptisms, weddings, etc.</p>
                            </div>
                        </a>

                        <a href="#" class="flex items-center p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition group">
                            <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800 group-hover:text-purple-600">View Members</h3>
                                <p class="text-sm text-gray-600">Parish member directory</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Today's Schedule -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Today's Schedule</h2>
                    <div class="space-y-4">
                        <div class="flex items-start border-l-4 border-blue-600 pl-4 py-2">
                            <div class="flex-1">
                                <p class="text-sm text-gray-600">6:00 AM</p>
                                <h4 class="font-semibold text-gray-800">Morning Mass</h4>
                                <p class="text-sm text-gray-600">Main Church</p>
                            </div>
                        </div>

                        <div class="flex items-start border-l-4 border-green-600 pl-4 py-2">
                            <div class="flex-1">
                                <p class="text-sm text-gray-600">10:00 AM</p>
                                <h4 class="font-semibold text-gray-800">Baptism Ceremony</h4>
                                <p class="text-sm text-gray-600">Chapel - Smith Family</p>
                            </div>
                        </div>

                        <div class="flex items-start border-l-4 border-purple-600 pl-4 py-2">
                            <div class="flex-1">
                                <p class="text-sm text-gray-600">2:00 PM</p>
                                <h4 class="font-semibold text-gray-800">Confession</h4>
                                <p class="text-sm text-gray-600">Confession Room</p>
                            </div>
                        </div>

                        <div class="flex items-start border-l-4 border-orange-600 pl-4 py-2">
                            <div class="flex-1">
                                <p class="text-sm text-gray-600">6:00 PM</p>
                                <h4 class="font-semibold text-gray-800">Evening Mass</h4>
                                <p class="text-sm text-gray-600">Main Church</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
