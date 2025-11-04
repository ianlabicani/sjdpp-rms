@extends('shell')

@section('content')
    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed w-full top-0 z-50 print:hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2 md:space-x-3 min-w-0">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Church Logo" class="h-10 md:h-12 w-10 md:w-12 rounded-full object-cover flex-shrink-0">
                    <div class="hidden sm:block min-w-0">
                        <span class="text-lg md:text-xl font-bold text-gray-800 block truncate">SJDPP Church</span>
                        <p class="text-xs text-gray-600 hidden md:block">Priest Dashboard</p>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden sm:flex items-center space-x-2 md:space-x-4 flex-shrink-0">
                    <a href="{{ route('priest.dashboard') }}" class="font-medium text-sm md:text-base transition {{ request()->routeIs('priest.dashboard') ? 'text-blue-600 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                        <i class="fas fa-home mr-1 md:mr-2"></i><span class="hidden md:inline">Dashboard</span>
                    </a>

                    <a href="{{ route('priest.schedule.index') }}" class="font-medium text-sm md:text-base transition {{ request()->routeIs('priest.schedule.*') ? 'text-blue-600 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                        <i class="fas fa-calendar-check mr-1 md:mr-2"></i><span class="hidden md:inline">Schedules</span>
                    </a>

                    <!-- Profile Dropdown -->
                    <div class="relative group">
                        <button class="font-medium text-sm md:text-base text-gray-700 hover:text-blue-600 transition flex items-center">
                            <i class="fas fa-user-circle mr-1 md:mr-2"></i><span class="hidden md:inline">{{ auth()->user()->name }}</span>
                            <i class="fas fa-chevron-down ml-0.5 md:ml-1 text-xs"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-2">
                                <a href="{{ route('priest.profile.edit') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
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

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="sm:hidden p-2 rounded-lg text-gray-700 hover:bg-gray-100 transition">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden sm:hidden border-t border-gray-200 bg-white">
                <div class="px-4 py-3 space-y-2">
                    <a href="{{ route('priest.dashboard') }}" class="block px-4 py-2 rounded-lg font-medium transition {{ request()->routeIs('priest.dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>

                    <a href="{{ route('priest.schedule.index') }}" class="block px-4 py-2 rounded-lg font-medium transition {{ request()->routeIs('priest.schedule.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i class="fas fa-calendar-check mr-2"></i>Schedules
                    </a>

                    <div class="border-t border-gray-200 my-2 pt-2">
                        <a href="{{ route('priest.profile.edit') }}" class="block px-4 py-2 rounded-lg font-medium text-gray-700 hover:bg-gray-100 transition">
                            <i class="fas fa-user-cog mr-2 text-blue-600"></i>Profile Settings
                        </a>

                        <form method="POST" action="{{ route('logout') }}" class="mt-2">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 rounded-lg font-medium text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                <i class="fas fa-sign-out-alt mr-2 text-red-600"></i>Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            menuBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });

            // Close menu when a link is clicked
            const menuLinks = mobileMenu.querySelectorAll('a');
            menuLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                });
            });
        });
    </script>

    <main>
        @yield('priest-content')
    </main>
@endsection
