@extends('secretary.shell')

@section('title', 'First Communion Records')

@section('secretary-content')
<div class="pt-16 min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 py-6 sm:py-8">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">First Communion Records</h1>
                <p class="text-xs sm:text-sm text-gray-600 mt-1">Manage communicant records</p>
            </div>
            <a href="{{ route('secretary.first-communion.create') }}"
               class="w-full sm:w-auto inline-flex items-center justify-center px-4 sm:px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition duration-150 text-sm sm:text-base">
                <i class="fas fa-plus mr-2"></i>
                <span class="hidden sm:inline">New Record</span><span class="sm:hidden">Add</span>
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-3 sm:px-4 py-2 sm:py-3 rounded mb-6 text-xs sm:text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search and Filter Section -->
        <div class="bg-white rounded-lg shadow p-4 sm:p-6 mb-6">
            <form method="GET" action="{{ route('secretary.first-communion.index') }}" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                    <!-- Search -->
                    <div>
                        <label for="search" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Search Name</label>
                        <input type="text"
                               name="search"
                               id="search"
                               value="{{ request('search') }}"
                               placeholder="Name, parents..."
                               class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm">
                    </div>

                    <!-- Year -->
                    <div>
                        <label for="year" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Year</label>
                        <input type="number"
                               name="year"
                               id="year"
                               value="{{ request('year') }}"
                               placeholder="Year"
                               class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm">
                    </div>

                    <!-- Month -->
                    <div>
                        <label for="month" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Month</label>
                        <select name="month"
                                id="month"
                                class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm">
                            <option value="">All Months</option>
                            @for($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ request('month') == $i ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::create(2024, $i, 1)->format('F') }}
                                </option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="flex gap-2">
                    <button type="submit"
                            class="flex-1 sm:flex-none px-4 sm:px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition duration-150 text-sm">
                        <i class="fas fa-search mr-2"></i>Filter
                    </button>
                    <a href="{{ route('secretary.first-communion.index') }}"
                       class="flex-1 sm:flex-none px-4 sm:px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow transition duration-150 text-sm text-center">
                        <i class="fas fa-undo mr-2"></i>Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Records Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Communicants</th>
                            <th class="hidden sm:table-cell px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Parents</th>
                            <th class="hidden md:table-cell px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                            <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($communions as $communion)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                    <div class="text-xs sm:text-sm font-medium text-gray-900">
                                        {{ \Carbon\Carbon::create($communion->year, $communion->month, $communion->day)->format('M d, Y') }}
                                    </div>
                                </td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4">
                                    <div class="flex flex-wrap gap-1">
                                        @forelse(array_slice($communion->names ?? [], 0, 8) as $name)
                                            <span class="inline-flex items-center px-2 sm:px-2.5 py-0.5 sm:py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                                {{ $name }}
                                            </span>
                                        @empty
                                            <span class="text-xs sm:text-sm text-gray-500">-</span>
                                        @endforelse
                                        @if(count($communion->names ?? []) > 8)
                                            <span class="inline-flex items-center px-2 sm:px-2.5 py-0.5 sm:py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700">
                                                +{{ count($communion->names) - 8 }} more
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="hidden sm:table-cell px-3 sm:px-6 py-3 sm:py-4">
                                    <div class="flex flex-wrap gap-1">
                                        @forelse(array_slice($communion->parents ?? [], 0, 8) as $parent)
                                            <span class="inline-flex items-center px-2 sm:px-2.5 py-0.5 sm:py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                {{ $parent }}
                                            </span>
                                        @empty
                                            <span class="text-xs sm:text-sm text-gray-500">-</span>
                                        @endforelse
                                        @if(count($communion->parents ?? []) > 8)
                                            <span class="inline-flex items-center px-2 sm:px-2.5 py-0.5 sm:py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700">
                                                +{{ count($communion->parents) - 8 }} more
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="hidden md:table-cell px-3 sm:px-6 py-3 sm:py-4">
                                    <div class="text-xs sm:text-sm text-gray-600 truncate">{{ $communion->address ?? '-' }}</div>
                                </td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex gap-2 sm:gap-3">
                                        <a href="{{ route('secretary.first-communion.show', $communion) }}"
                                           class="text-blue-600 hover:text-blue-900 text-xs sm:text-sm" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('secretary.first-communion.edit', $communion) }}"
                                           class="text-indigo-600 hover:text-indigo-900 text-xs sm:text-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST"
                                              action="{{ route('secretary.first-communion.destroy', $communion) }}"
                                              class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this record?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-600 hover:text-red-900 text-xs sm:text-sm" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-3 sm:px-6 py-8 sm:py-12 text-center text-gray-500">
                                    <i class="fas fa-inbox text-3xl sm:text-4xl mb-3 sm:mb-4 text-gray-300 block"></i>
                                    <p class="text-sm sm:text-lg font-medium">No First Communion records found.</p>
                                    <a href="{{ route('secretary.first-communion.create') }}"
                                       class="text-indigo-600 hover:text-indigo-800 mt-2 inline-block text-xs sm:text-sm">
                                        Create your first record
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($communions->hasPages())
                <div class="px-3 sm:px-6 py-3 sm:py-4 border-t border-gray-200">
                    {{ $communions->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
