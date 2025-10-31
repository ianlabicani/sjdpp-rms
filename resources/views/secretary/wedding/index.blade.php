@extends('secretary.shell')

@section('title', 'Wedding Records')

@section('secretary-content')
<div class="pt-16 min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Wedding Records</h1>
                <p class="text-gray-600 mt-1">Manage marriage records</p>
            </div>
            <a href="{{ route('secretary.wedding.create') }}"
               class="inline-flex items-center px-4 py-2 bg-pink-600 hover:bg-pink-700 text-white font-semibold rounded-lg shadow transition duration-150">
                <i class="fas fa-plus mr-2"></i>
                Add New Record
            </a>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-pink-100 rounded-lg">
                        <i class="fas fa-heart text-2xl text-pink-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Total Records</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-lg">
                        <i class="fas fa-calendar-check text-2xl text-green-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">This Year</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['this_year'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <i class="fas fa-calendar-day text-2xl text-blue-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">This Month</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['this_month'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search and Filter Section -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <form method="GET" action="{{ route('secretary.wedding.index') }}" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Search -->
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                        <input type="text"
                               name="search"
                               id="search"
                               value="{{ request('search') }}"
                               placeholder="Names, location..."
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    </div>

                    <!-- Date From -->
                    <div>
                        <label for="date_from" class="block text-sm font-medium text-gray-700 mb-1">Marriage From</label>
                        <input type="date"
                               name="date_from"
                               id="date_from"
                               value="{{ request('date_from') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    </div>

                    <!-- Date To -->
                    <div>
                        <label for="date_to" class="block text-sm font-medium text-gray-700 mb-1">Marriage To</label>
                        <input type="date"
                               name="date_to"
                               id="date_to"
                               value="{{ request('date_to') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    </div>

                    <!-- Year Filter -->
                    <div>
                        <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Year</label>
                        <select name="year"
                                id="year"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            <option value="">All Years</option>
                            @foreach($years as $year)
                                <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <!-- Sort -->
                    <div class="flex-1">
                        <label for="sort" class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                        <select name="sort"
                                id="sort"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Recently Added</option>
                            <option value="date_of_marriage" {{ request('sort') == 'date_of_marriage' ? 'selected' : '' }}>Marriage Date</option>
                            <option value="husband_name" {{ request('sort') == 'husband_name' ? 'selected' : '' }}>Husband Name</option>
                            <option value="wife_name" {{ request('sort') == 'wife_name' ? 'selected' : '' }}>Wife Name</option>
                            <option value="year" {{ request('sort') == 'year' ? 'selected' : '' }}>Year</option>
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-2 mt-6">
                        <button type="submit"
                                class="px-6 py-2 bg-pink-600 hover:bg-pink-700 text-white font-semibold rounded-lg shadow transition duration-150">
                            <i class="fas fa-search mr-2"></i>Filter
                        </button>
                        <a href="{{ route('secretary.wedding.index') }}"
                           class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow transition duration-150">
                            <i class="fas fa-undo mr-2"></i>Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Records Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Year</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Husband</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Wife</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Marriage Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($weddings as $wedding)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $wedding->year }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $wedding->husband_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $wedding->wife_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $wedding->date_of_marriage->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $wedding->municipality }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex gap-2">
                                        <a href="{{ route('secretary.wedding.show', $wedding) }}"
                                           class="text-blue-600 hover:text-blue-900" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('secretary.wedding.edit', $wedding) }}"
                                           class="text-pink-600 hover:text-pink-900" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                    <i class="fas fa-heart text-4xl mb-4 text-gray-300"></i>
                                    <p class="text-lg">No wedding records found.</p>
                                    <a href="{{ route('secretary.wedding.create') }}"
                                       class="text-pink-600 hover:text-pink-800 mt-2 inline-block">
                                        Add your first record
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($weddings->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $weddings->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
