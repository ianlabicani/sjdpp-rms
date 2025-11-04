@extends('priest.shell')

@section('title', 'Burial Records')

@section('priest-content')
    <div class="min-h-screen bg-gray-50 py-6 md:py-8 pt-20">
        <div class="max-w-7xl mx-auto px-3 sm:px-4 md:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-4 md:mb-8">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Burial Records</h1>
                <p class="mt-1 md:mt-2 text-xs md:text-sm text-gray-600">View all burial records</p>
            </div>

            <!-- Statistics Card -->
            <div class="mb-4 md:mb-6">
                <div class="bg-white rounded-lg shadow p-4 md:p-6">
                    <div class="flex items-center">
                        <div class="p-2 md:p-3 rounded-full bg-purple-100 text-purple-600 flex-shrink-0">
                            <i class="fas fa-cross text-xl md:text-2xl"></i>
                        </div>
                        <div class="ml-3 md:ml-4 min-w-0">
                            <p class="text-xs md:text-sm font-medium text-gray-600">Total Burial Records</p>
                            <p class="text-xl md:text-2xl font-semibold text-gray-900">{{ $burials->total() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search and Filters -->
            <div class="bg-white rounded-lg shadow p-4 md:p-6 mb-4 md:mb-6">
                <form method="GET" action="{{ route('priest.records.burial') }}" class="space-y-3 md:space-y-0 md:grid md:grid-cols-1 lg:grid-cols-3 lg:gap-4">
                    <!-- Search -->
                    <div>
                        <label for="search" class="block text-xs md:text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-search mr-1 md:mr-2"></i><span class="hidden md:inline">Search</span>
                        </label>
                        <input
                            type="text"
                            name="search"
                            id="search"
                            value="{{ request('search') }}"
                            placeholder="Search by name or informant..."
                            class="w-full px-3 md:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Date From -->
                    <div>
                        <label for="date_from" class="block text-xs md:text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-calendar-alt mr-1 md:mr-2"></i><span class="hidden md:inline">Date From</span>
                        </label>
                        <input
                            type="date"
                            name="date_from"
                            id="date_from"
                            value="{{ request('date_from') }}"
                            class="w-full px-3 md:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Date To -->
                    <div>
                        <label for="date_to" class="block text-xs md:text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-calendar-alt mr-1 md:mr-2"></i><span class="hidden md:inline">Date To</span>
                        </label>
                        <input
                            type="date"
                            name="date_to"
                            id="date_to"
                            value="{{ request('date_to') }}"
                            class="w-full px-3 md:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Filter Buttons -->
                    <div class="flex gap-2 lg:col-span-3 lg:justify-end">
                        <button
                            type="submit"
                            class="flex-1 lg:flex-none px-4 md:px-6 py-2 text-sm bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors font-medium"
                        >
                            <i class="fas fa-filter mr-1 md:mr-2"></i><span class="hidden md:inline">Apply</span>
                        </button>
                        <a
                            href="{{ route('priest.records.burial') }}"
                            class="px-4 md:px-6 py-2 text-sm bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors font-medium"
                        >
                            <i class="fas fa-redo mr-1 md:mr-2"></i><span class="hidden md:inline">Reset</span>
                        </a>
                    </div>
                </form>
            </div>

            <!-- Records Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm md:text-base">
                        <thead class="bg-purple-50">
                            <tr>
                                <th scope="col" class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-purple-700 uppercase tracking-wider">
                                    Deceased Name
                                </th>
                                <th scope="col" class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-purple-700 uppercase tracking-wider hidden sm:table-cell">
                                    Date of Death
                                </th>
                                <th scope="col" class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-purple-700 uppercase tracking-wider hidden lg:table-cell">
                                    Burial Date
                                </th>
                                <th scope="col" class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-purple-700 uppercase tracking-wider hidden md:table-cell">
                                    Age
                                </th>
                                <th scope="col" class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-purple-700 uppercase tracking-wider hidden xl:table-cell">
                                    Informant
                                </th>
                                <th scope="col" class="px-3 md:px-6 py-2 md:py-3 text-center text-xs font-medium text-purple-700 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($burials as $burial)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                        <div class="text-xs md:text-sm font-medium text-gray-900">{{ $burial->name }}</div>
                                    </td>
                                    <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap hidden sm:table-cell">
                                        <div class="text-xs md:text-sm text-gray-900">
                                            {{ $burial->date_of_death ? $burial->date_of_death->format('M d, Y') : 'N/A' }}
                                        </div>
                                    </td>
                                    <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap hidden lg:table-cell">
                                        <div class="text-xs md:text-sm text-gray-900">
                                            {{ $burial->date_of_burial ? $burial->date_of_burial->format('M d, Y') : 'N/A' }}
                                        </div>
                                    </td>
                                    <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap hidden md:table-cell">
                                        <div class="text-xs md:text-sm text-gray-900">{{ $burial->age ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap hidden xl:table-cell">
                                        <div class="text-xs md:text-sm text-gray-900">{{ $burial->informant ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-center">
                                        <a
                                            href="{{ route('priest.records.burial.show', $burial->id) }}"
                                            class="inline-flex items-center px-2 md:px-3 py-1 text-xs bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200 transition-colors font-medium"
                                        >
                                            <i class="fas fa-eye mr-1"></i><span class="hidden md:inline">View</span>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-3 md:px-6 py-8 md:py-12 text-center">
                                        <div class="text-gray-400">
                                            <i class="fas fa-inbox text-3 md:text-4xl mb-2 md:mb-3"></i>
                                            <p class="text-base md:text-lg font-medium">No burial records found</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($burials->hasPages())
                    <div class="bg-gray-50 px-3 md:px-6 py-3 border-t border-gray-200 overflow-x-auto">
                        {{ $burials->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
