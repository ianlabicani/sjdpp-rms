@extends('priest.shell')

@section('title', 'Baptism Records')

@section('priest-content')
    <div class="min-h-screen bg-gray-50 py-6 md:py-8 pt-20">
        <div class="max-w-7xl mx-auto px-3 sm:px-4 md:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-4 md:mb-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Baptism Records</h1>
            <p class="text-sm md:text-base text-gray-600 mt-1">View Baptism records (Read-only)</p>
        </div>

        <!-- Statistics -->
        <div class="bg-white rounded-lg shadow p-4 md:p-6 mb-4 md:mb-6">
            <div class="flex items-center">
                <div class="p-2 md:p-3 bg-blue-100 rounded-lg flex-shrink-0">
                    <i class="fas fa-water text-xl md:text-2xl text-blue-600"></i>
                </div>
                <div class="ml-3 md:ml-4 min-w-0">
                    <p class="text-xs md:text-sm text-gray-600">Total Baptism Records</p>
                    <p class="text-xl md:text-2xl font-bold text-gray-900">{{ $total }}</p>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-lg shadow p-4 md:p-6 mb-4 md:mb-6">
            <form method="GET" action="{{ route('priest.records.baptismal') }}" class="space-y-3 md:space-y-0 md:grid md:grid-cols-1 lg:grid-cols-4 lg:gap-4">
                <div>
                    <label class="block text-xs md:text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search name..."
                           class="w-full px-3 md:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-xs md:text-sm font-medium text-gray-700 mb-1">Date From</label>
                    <input type="date"
                           name="date_from"
                           value="{{ request('date_from') }}"
                           class="w-full px-3 md:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-xs md:text-sm font-medium text-gray-700 mb-1">Date To</label>
                    <input type="date"
                           name="date_to"
                           value="{{ request('date_to') }}"
                           class="w-full px-3 md:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div class="flex gap-2 lg:items-end">
                    <button type="submit" class="flex-1 bg-blue-600 text-white px-3 md:px-4 py-2 text-sm rounded-lg hover:bg-blue-700 transition font-medium">
                        <i class="fas fa-search mr-1 md:mr-2"></i><span class="hidden md:inline">Filter</span>
                    </button>
                    <a href="{{ route('priest.records.baptismal') }}" class="bg-gray-200 text-gray-700 px-3 md:px-4 py-2 text-sm rounded-lg hover:bg-gray-300 transition font-medium">
                        <i class="fas fa-redo"></i>
                    </a>
                </div>
            </form>
        </div>

        <!-- Records Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm md:text-base">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Child Name</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Birth Date</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">Baptism Date</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Parents</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($baptismals as $record)
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 md:px-6 py-3 md:py-4">
                                    <div class="text-sm md:text-base font-medium text-gray-900">{{ $record->child_name }}</div>
                                    <div class="text-xs md:text-sm text-gray-500">{{ $record->place_of_birth }}</div>
                                </td>
                                <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-xs md:text-sm text-gray-900 hidden sm:table-cell">
                                    {{ $record->birth_date->format('M d, Y') }}
                                </td>
                                <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-xs md:text-sm text-gray-900 hidden lg:table-cell">
                                    {{ $record->baptism_date->format('M d, Y') }}
                                </td>
                                <td class="px-3 md:px-6 py-3 md:py-4 hidden md:table-cell">
                                    <div class="text-xs md:text-sm text-gray-900">Father: {{ $record->father_name }}</div>
                                    <div class="text-xs md:text-sm text-gray-500">Mother: {{ $record->mother_name }}</div>
                                </td>
                                <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-xs md:text-sm font-medium">
                                    <a href="{{ route('priest.records.baptismal.show', $record) }}" class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-eye"></i> <span class="hidden md:inline">View</span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-3 md:px-6 py-8 md:py-12 text-center text-gray-500">
                                    <i class="fas fa-water text-3 md:text-4xl mb-2 md:mb-3 text-gray-300"></i>
                                    <p class="text-base md:text-lg font-medium">No Baptism records found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($baptismals->hasPages())
                <div class="bg-white px-3 md:px-4 py-3 border-t border-gray-200 sm:px-6">
                    {{ $baptismals->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
