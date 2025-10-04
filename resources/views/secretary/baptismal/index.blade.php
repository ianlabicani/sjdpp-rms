@extends('secretary.shell')

@section('title', 'Baptismal Records')

@section('secretary-content')

    <!-- Main Content -->
    <div class="pt-16 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Baptismal Records</h1>
                    <p class="text-gray-600 mt-2">Manage all baptismal certificates and records</p>
                </div>
                <a href="{{ route('secretary.baptismal.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-medium inline-flex items-center">
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
                <form action="{{ route('secretary.baptismal.index') }}" method="GET">
                    <!-- Main Search -->
                    <div class="flex gap-4 mb-4">
                        <div class="flex-1">
                            <input type="text" name="search" placeholder="Search by name, parents, church, priest, or sponsor..." value="{{ request('search') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-medium whitespace-nowrap">
                            <i class="fas fa-search mr-2"></i>Search
                        </button>
                        @if(request()->hasAny(['search', 'date_from', 'date_to', 'year', 'sort_by']))
                            <a href="{{ route('secretary.baptismal.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition font-medium whitespace-nowrap">
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
                                <label class="block text-sm font-medium text-gray-700 mb-2">Baptism Date From</label>
                                <input type="date" name="date_from" value="{{ request('date_from') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Baptism Date To</label>
                                <input type="date" name="date_to" value="{{ request('date_to') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            </div>

                            <!-- Year Filter -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Baptism Year</label>
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
                                    <option value="baptism_date" {{ request('sort_by') == 'baptism_date' ? 'selected' : '' }}>Baptism Date</option>
                                    <option value="birth_date" {{ request('sort_by') == 'birth_date' ? 'selected' : '' }}>Birth Date</option>
                                    <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Name (A-Z)</option>
                                </select>
                            </div>
                        </div>
                    </details>
                </form>
            </div>

            <!-- Baptismal Records Table -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Name</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Birth Date</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Baptism Date</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Church</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Book/Page/Line</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($baptismals as $baptismal)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-gray-800">{{ $baptismal->name }}</div>
                                        <div class="text-sm text-gray-600">
                                            Parents: {{ $baptismal->fathers_name }} & {{ $baptismal->mothers_name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-700">
                                        {{ $baptismal->birth_date->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-700">
                                        {{ $baptismal->baptism_date->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-700">
                                        {{ $baptismal->church_name }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-700">
                                        <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                                            {{ $baptismal->book_number }}/{{ $baptismal->page_number }}/{{ $baptismal->line_number }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('secretary.baptismal.show', $baptismal) }}" class="text-blue-600 hover:text-blue-800 transition" title="View">
                                                <i class="fas fa-eye text-lg"></i>
                                            </a>
                                            <a href="{{ route('secretary.baptismal.edit', $baptismal) }}" class="text-green-600 hover:text-green-800 transition" title="Edit">
                                                <i class="fas fa-edit text-lg"></i>
                                            </a>
                                            <form action="{{ route('secretary.baptismal.destroy', $baptismal) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 transition" title="Delete">
                                                    <i class="fas fa-trash text-lg"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                        <i class="fas fa-inbox text-4xl mb-4 text-gray-400"></i>
                                        <p class="text-lg">No baptismal records found</p>
                                        <a href="{{ route('secretary.baptismal.create') }}" class="text-blue-600 hover:text-blue-800 mt-2 inline-block">
                                            Add your first record
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($baptismals->hasPages())
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                        {{ $baptismals->links() }}
                    </div>
                @endif
            </div>

            <!-- Statistics Cards -->
            <div class="grid md:grid-cols-3 gap-6 mt-8">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Total Records</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $baptismals->total() }}</h3>
                        </div>
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-book text-blue-600 text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">This Month</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\Baptismal::whereMonth('created_at', now()->month)->count() }}</h3>
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
                            <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\Baptismal::whereYear('created_at', now()->year)->count() }}</h3>
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
