@extends('priest.shell')

@section('title', 'Burial Records')

@section('priest-content')
    <div class="min-h-screen bg-gray-50 py-8 pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Burial Records</h1>
                <p class="mt-2 text-sm text-gray-600">View all burial records</p>
            </div>

            <!-- Statistics Card -->
            <div class="mb-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                            <i class="fas fa-cross text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Burial Records</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $burials->total() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search and Filters -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <form method="GET" action="{{ route('priest.records.burial') }}" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Search -->
                        <div>
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-search mr-2"></i>Search
                            </label>
                            <input
                                type="text"
                                name="search"
                                id="search"
                                value="{{ request('search') }}"
                                placeholder="Search by name or informant..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                            >
                        </div>

                        <!-- Date From -->
                        <div>
                            <label for="date_from" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-calendar-alt mr-2"></i>Date From
                            </label>
                            <input
                                type="date"
                                name="date_from"
                                id="date_from"
                                value="{{ request('date_from') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                            >
                        </div>

                        <!-- Date To -->
                        <div>
                            <label for="date_to" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-calendar-alt mr-2"></i>Date To
                            </label>
                            <input
                                type="date"
                                name="date_to"
                                id="date_to"
                                value="{{ request('date_to') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                            >
                        </div>
                    </div>

                    <!-- Filter Buttons -->
                    <div class="flex gap-3">
                        <button
                            type="submit"
                            class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors"
                        >
                            <i class="fas fa-filter mr-2"></i>Apply Filters
                        </button>
                        <a
                            href="{{ route('priest.records.burial') }}"
                            class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors"
                        >
                            <i class="fas fa-redo mr-2"></i>Reset
                        </a>
                    </div>
                </form>
            </div>

            <!-- Records Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-purple-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-purple-700 uppercase tracking-wider">
                                    Deceased Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-purple-700 uppercase tracking-wider">
                                    Date of Death
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-purple-700 uppercase tracking-wider">
                                    Burial Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-purple-700 uppercase tracking-wider">
                                    Age
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-purple-700 uppercase tracking-wider">
                                    Informant
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-purple-700 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($burials as $burial)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $burial->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ $burial->date_of_death ? $burial->date_of_death->format('M d, Y') : 'N/A' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ $burial->date_of_burial ? $burial->date_of_burial->format('M d, Y') : 'N/A' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $burial->age ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $burial->informant ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <a
                                            href="{{ route('priest.records.burial.show', $burial->id) }}"
                                            class="inline-flex items-center px-3 py-1 bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200 transition-colors text-sm"
                                        >
                                            <i class="fas fa-eye mr-2"></i>View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="text-gray-400">
                                            <i class="fas fa-inbox text-4xl mb-3"></i>
                                            <p class="text-lg">No burial records found</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($burials->hasPages())
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                        {{ $burials->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
