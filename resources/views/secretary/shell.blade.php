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
                    <a href="{{ route('secretary.baptismal.index') }}" class="font-medium transition {{ request()->routeIs('secretary.baptismal.*') ? 'text-blue-600 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                        <i class="fas fa-water mr-2"></i>Baptismal Records
                    </a>
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
        @yield('secretary-content')
    </main>
@endsection
