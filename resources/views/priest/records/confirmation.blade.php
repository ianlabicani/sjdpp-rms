@extends('priest.shell')

@section('title', 'Confirmation Records')

@section('priest-content')
    <div class="min-h-screen bg-gray-50 py-8 pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Confirmation Records</h1>
                <p class="mt-2 text-sm text-gray-600">View all confirmation records</p>
            </div>

            <!-- Statistics Card -->
            <div class="mb-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                            <i class="fas fa-dove text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Confirmation Records</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $confirmations->total() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search and Filters -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <form method="GET" action="{{ route('priest.records.confirmation') }}" class="space-y-4">
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
                                placeholder="Search by name or sponsor..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
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
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
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
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                            >
                        </div>
                    </div>

                    <!-- Filter Buttons -->
                    <div class="flex gap-3">
                        <button
                            type="submit"
                            class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors"
                        >
                            <i class="fas fa-filter mr-2"></i>Apply Filters
                        </button>
                        <a
                            href="{{ route('priest.records.confirmation') }}"
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
                        <thead class="bg-indigo-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase tracking-wider">
                                    Confirmand Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase tracking-wider">
                                    Confirmation Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase tracking-wider">
                                    Year
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase tracking-wider">
                                    Sponsor
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase tracking-wider">
                                    Minister
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-indigo-700 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($confirmations as $confirmation)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $confirmation->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ $confirmation->date_of_confirmation ? $confirmation->date_of_confirmation->format('M d, Y') : 'N/A' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $confirmation->year ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $confirmation->sponsor ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $confirmation->name_of_minister ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <a
                                            href="{{ route('priest.records.confirmation.show', $confirmation->id) }}"
                                            class="inline-flex items-center px-3 py-1 bg-indigo-100 text-indigo-700 rounded-lg hover:bg-indigo-200 transition-colors text-sm"
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
                                            <p class="text-lg">No confirmation records found</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($confirmations->hasPages())
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                        {{ $confirmations->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
