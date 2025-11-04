@extends('shell')

@section('content')
    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed w-full top-0 z-50 print:hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Church Logo" class="h-12 w-12 rounded-full object-cover">
                    <div>
                        <span class="text-xl font-bold text-gray-800">SJDPP Church</span>
                        <p class="text-xs text-gray-600">Secretary Dashboard</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('secretary.dashboard') }}" class="font-medium transition {{ request()->routeIs('secretary.dashboard') ? 'text-blue-600 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>

                    <!-- Records Dropdown -->
                    <div class="relative group">
                        <button class="font-medium transition flex items-center {{ request()->routeIs('secretary.Baptism.*') || request()->routeIs('secretary.burial.*') || request()->routeIs('secretary.confirmation.*') || request()->routeIs('secretary.wedding.*') ? 'text-blue-600 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                            <i class="fas fa-book mr-2"></i>Records
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-2">
                                <a href="{{ route('secretary.baptismal.index') }}" class="flex items-center px-4 py-3 transition {{ request()->routeIs('secretary.Baptism.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                                <div class="w-5 h-5 mr-3 flex items-center justify-center">
                                    <img src="{{ asset('images/shell-only.png') }}" alt="shell-only" class="w-5 h-5 object-contain">
                                </div>
                                <span class="font-medium">Baptism</span>
                                </a>
                                <a href="{{ route('secretary.burial.index') }}" class="flex items-center px-4 py-3 transition {{ request()->routeIs('secretary.burial.*') ? 'bg-purple-50 text-purple-600' : 'text-gray-700 hover:bg-purple-50 hover:text-purple-600' }}">
                                    <i class="fas fa-cross w-5 mr-3 text-purple-600"></i>
                                    <span class="font-medium">Death</span>
                                </a>
                                <a href="{{ route('secretary.confirmation.index') }}" class="flex items-center px-4 py-3 transition {{ request()->routeIs('secretary.confirmation.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                                    <i class="fas fa-hands-praying w-5 mr-3 text-indigo-600"></i>
                                    <span class="font-medium">Confirmation</span>
                                </a>
                                <a href="{{ route('secretary.wedding.index') }}" class="flex items-center px-4 py-3 transition {{ request()->routeIs('secretary.wedding.*') ? 'bg-pink-50 text-pink-600' : 'text-gray-700 hover:bg-pink-50 hover:text-pink-600' }}">
                                    <i class="fas fa-heart w-5 mr-3 text-pink-600"></i>
                                    <span class="font-medium">Wedding</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('secretary.schedule.index') }}" class="font-medium transition {{ request()->routeIs('secretary.schedule.*') ? 'text-blue-600 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                        <i class="fas fa-calendar-alt mr-2"></i>Schedule
                    </a>

                    <!-- Quick Create Dropdown -->

                    <!-- Profile Dropdown -->
                    <div class="relative group">
                        <button class="font-medium text-gray-700 hover:text-blue-600 transition flex items-center">
                            <i class="fas fa-user-circle mr-2"></i>{{ auth()->user()->name }}
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-2">
                                <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                                    <i class="fas fa-user-cog w-5 mr-3 text-blue-600"></i>
                                    <span class="font-medium">Profile Settings</span>
                                </a>
                                <div class="border-t border-gray-200 my-2"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                        <i class="fas fa-sign-out-alt w-5 mr-3 text-red-600"></i>
                                        <span class="font-medium">Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('secretary-content')
    </main>
@endsection
