@extends('secretary.shell')

@section('title', 'Funeral Records')

@section('secretary-content')

    <!-- Main Content -->
    <div class="pt-16 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Funeral Records</h1>
                    <p class="text-gray-600 mt-2">Manage all funeral certificates and records</p>
                </div>
                <a href="{{ route('secretary.burial.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-medium inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i>Add New Record
                </a>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg flex items-center">
                    <i class="fas fa-check-circle mr-3 text-xl"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Search and Filter -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                <form action="{{ route('secretary.burial.index') }}" method="GET">
                    <!-- Main Search -->
                    <div class="flex gap-4 mb-4">
                        <div class="flex-1">
                            <input type="text" name="search" placeholder="Search by name, informant, place, presider, or status..." value="{{ request('search') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-medium whitespace-nowrap">
                            <i class="fas fa-search mr-2"></i>Search
                        </button>
                        @if(request()->hasAny(['search', 'date_from', 'date_to', 'year', 'sort_by']))
                            <a href="{{ route('secretary.burial.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition font-medium whitespace-nowrap">
                                <i class="fas fa-times mr-2"></i>Clear
                            </a>
                        @endif
                    </div>

                    <!-- Advanced Filters -->
                    <details class="mt-4">
                        <summary class="cursor-pointer text-gray-700 font-medium hover:text-blue-600 transition">
                            <i class="fas fa-sliders-h mr-2"></i>Advanced Filters
                        </summary>
                        <div class="grid md:grid-cols-4 gap-4 mt-4 pt-4 border-t border-gray-200">
                            <!-- Date Range -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Funeral Date From</label>
                                <input type="date" name="date_from" value="{{ request('date_from') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Funeral Date To</label>
                                <input type="date" name="date_to" value="{{ request('date_to') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            </div>

                            <!-- Year Filter -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Funeral Year</label>
                                <select name="year" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                    <option value="">All Years</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Sort By -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Sort By</label>
                                <select name="sort_by" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                    <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Recently Added</option>
                                    <option value="date_of_burial" {{ request('sort_by') == 'date_of_burial' ? 'selected' : '' }}>Funeral Date</option>
                                    <option value="date_of_death" {{ request('sort_by') == 'date_of_death' ? 'selected' : '' }}>Death Date</option>
                                    <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Name (A-Z)</option>
                                    <option value="age" {{ request('sort_by') == 'age' ? 'selected' : '' }}>Age</option>
                                </select>
                            </div>
                        </div>
                    </details>
                </form>
            </div>

            <!-- Funeral Records Table -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Name</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Age</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Date of Death</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Date of Funeral</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($burials as $burial)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-gray-800">{{ $burial->name }}</div>
                                        <div class="text-sm text-gray-600">
                                            Informant: {{ $burial->informant }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-700">
                                        {{ $burial->age }} years old
                                    </td>
                                    <td class="px-6 py-4 text-gray-700">
                                        {{ $burial->date_of_death->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-700">
                                        {{ $burial->date_of_burial->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm font-medium">
                                            {{ $burial->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('secretary.burial.show', $burial) }}" class="text-blue-600 hover:text-blue-800 transition" title="View">
                                                <i class="fas fa-eye text-lg"></i>
                                            </a>
                                            <a href="{{ route('secretary.burial.edit', $burial) }}" class="text-green-600 hover:text-green-800 transition" title="Edit">
                                                <i class="fas fa-edit text-lg"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                        <i class="fas fa-inbox text-4xl mb-4 text-gray-400"></i>
                                        <p class="text-lg">No funeral records found</p>
                                        <a href="{{ route('secretary.burial.create') }}" class="text-blue-600 hover:text-blue-800 mt-2 inline-block">
                                            Add your first record
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($burials->hasPages())
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                        {{ $burials->links() }}
                    </div>
                @endif
            </div>

            <!-- Statistics Cards -->
            <div class="grid md:grid-cols-3 gap-6 mt-8">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Total Records</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $burials->total() }}</h3>
                        </div>
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-book-open text-blue-600 text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">This Month</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\Burial::whereMonth('created_at', now()->month)->count() }}</h3>
                        </div>
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-calendar text-green-600 text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">This Year</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\Burial::whereYear('created_at', now()->year)->count() }}</h3>
                        </div>
                        <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-chart-line text-purple-600 text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
