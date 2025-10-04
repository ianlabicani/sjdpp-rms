@extends('secretary.shell')

@section('title', 'Confirmation Records')

@section('secretary-content')
    <div class="pt-16 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Confirmation Records</h1>
                    <p class="text-gray-600 mt-1">Manage confirmation records</p>
                </div>
                <a href="{{ route('secretary.confirmation.create') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition duration-150">
                    <i class="fas fa-plus mr-2"></i>
                    Add New Record
                </a>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-indigo-100 rounded-lg">
                            <i class="fas fa-hands-praying text-2xl text-indigo-600"></i>
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
                <form method="GET" action="{{ route('secretary.confirmation.index') }}" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Search -->
                        <div>
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                            <input type="text"
                                name="search"
                                id="search"
                                value="{{ request('search') }}"
                                placeholder="Name, parish, sponsor..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        </div>

                        <!-- Date From -->
                        <div>
                            <label for="date_from" class="block text-sm font-medium text-gray-700 mb-1">Confirmation From</label>
                            <input type="date"
                                name="date_from"
                                id="date_from"
                                value="{{ request('date_from') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        </div>

                        <!-- Date To -->
                        <div>
                            <label for="date_to" class="block text-sm font-medium text-gray-700 mb-1">Confirmation To</label>
                            <input type="date"
                                name="date_to"
                                id="date_to"
                                value="{{ request('date_to') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        </div>

                        <!-- Year Filter -->
                        <div>
                            <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Year</label>
                            <select name="year"
                                    id="year"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
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
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Recently Added</option>
                                <option value="date_of_confirmation" {{ request('sort') == 'date_of_confirmation' ? 'selected' : '' }}>Confirmation Date</option>
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                                <option value="year" {{ request('sort') == 'year' ? 'selected' : '' }}>Year</option>
                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-2 mt-6">
                            <button type="submit"
                                    class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition duration-150">
                                <i class="fas fa-search mr-2"></i>Filter
                            </button>
                            <a href="{{ route('secretary.confirmation.index') }}"
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
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Confirmation Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Parish of Baptism</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sponsor</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($confirmations as $confirmation)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $confirmation->year }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $confirmation->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $confirmation->date_of_confirmation->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $confirmation->parish_of_baptism }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $confirmation->sponsor }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex gap-2">
                                            <a href="{{ route('secretary.confirmation.show', $confirmation) }}"
                                            class="text-blue-600 hover:text-blue-900" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('secretary.confirmation.edit', $confirmation) }}"
                                            class="text-indigo-600 hover:text-indigo-900" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="POST"
                                                action="{{ route('secretary.confirmation.destroy', $confirmation) }}"
                                                class="inline"
                                                onsubmit="return confirm('Are you sure you want to delete this record?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-900" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                        <i class="fas fa-hands-praying text-4xl mb-4 text-gray-300"></i>
                                        <p class="text-lg">No confirmation records found.</p>
                                        <a href="{{ route('secretary.confirmation.create') }}"
                                        class="text-indigo-600 hover:text-indigo-800 mt-2 inline-block">
                                            Add your first record
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($confirmations->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $confirmations->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
