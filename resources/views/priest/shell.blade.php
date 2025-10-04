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
                        <p class="text-xs text-gray-600">Priest Dashboard</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('priest.dashboard') }}" class="font-medium transition {{ request()->routeIs('priest.dashboard') ? 'text-blue-600 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>

                    <a href="{{ route('priest.schedule.index') }}" class="font-medium transition {{ request()->routeIs('priest.schedule.*') ? 'text-blue-600 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                        <i class="fas fa-calendar-check mr-2"></i>Schedules
                    </a>

                    <!-- Records Dropdown -->
                    <div class="relative group">
                        <button class="font-medium transition flex items-center {{ request()->routeIs('priest.records.*') ? 'text-blue-600 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                            <i class="fas fa-book mr-2"></i>Records
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-2">
                                <a href="{{ route('priest.records.baptismal') }}" class="flex items-center px-4 py-3 transition {{ request()->routeIs('priest.records.baptismal*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                                    <i class="fas fa-water w-5 mr-3 text-blue-600"></i>
                                    <span class="font-medium">Baptismal</span>
                                </a>
                                <a href="{{ route('priest.records.burial') }}" class="flex items-center px-4 py-3 transition {{ request()->routeIs('priest.records.burial*') ? 'bg-purple-50 text-purple-600' : 'text-gray-700 hover:bg-purple-50 hover:text-purple-600' }}">
                                    <i class="fas fa-cross w-5 mr-3 text-purple-600"></i>
                                    <span class="font-medium">Burial</span>
                                </a>
                                <a href="{{ route('priest.records.confirmation') }}" class="flex items-center px-4 py-3 transition {{ request()->routeIs('priest.records.confirmation*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                                    <i class="fas fa-hands-praying w-5 mr-3 text-indigo-600"></i>
                                    <span class="font-medium">Confirmation</span>
                                </a>
                                <a href="{{ route('priest.records.wedding') }}" class="flex items-center px-4 py-3 transition {{ request()->routeIs('priest.records.wedding*') ? 'bg-pink-50 text-pink-600' : 'text-gray-700 hover:bg-pink-50 hover:text-pink-600' }}">
                                    <i class="fas fa-heart w-5 mr-3 text-pink-600"></i>
                                    <span class="font-medium">Wedding</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <span class="text-gray-700 font-medium">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition font-medium">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('priest-content')
    </main>
@endsection
