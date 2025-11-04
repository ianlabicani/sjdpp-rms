@extends('priest.shell')

@section('title', 'Schedules')

@section('priest-content')
<div class="pt-16 min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-3 sm:px-4 md:px-6 lg:px-8 py-6 md:py-8">
        <!-- Header -->
        <div class="mb-4 md:mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Schedule Review</h1>
                <p class="text-xs md:text-base text-gray-600 mt-1">Review and approve/decline schedule requests</p>
            </div>
            <div class="flex gap-2 w-full sm:w-auto">
                <a href="{{ route('priest.schedule.calendar') }}" class="flex-1 sm:flex-none px-3 md:px-4 py-2 text-sm bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-medium">
                    <i class="fas fa-calendar-alt mr-1 md:mr-2"></i><span class="hidden md:inline">Calendar</span>
                </a>
                <a href="{{ route('priest.schedule.index') }}" class="flex-1 sm:flex-none px-3 md:px-4 py-2 text-sm bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-medium">
                    <i class="fas fa-list mr-1 md:mr-2"></i><span class="hidden md:inline">List</span>
                </a>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-6 mb-6">
            <div class="bg-white rounded-lg shadow p-4 md:p-6">
                <div class="flex items-center">
                    <div class="p-2 md:p-3 bg-gray-100 rounded-lg flex-shrink-0">
                        <i class="fas fa-calendar text-xl md:text-2xl text-gray-600"></i>
                    </div>
                    <div class="ml-3 md:ml-4 min-w-0">
                        <p class="text-xs md:text-sm text-gray-600">Total Schedules</p>
                        <p class="text-xl md:text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-4 md:p-6">
                <div class="flex items-center">
                    <div class="p-2 md:p-3 bg-yellow-100 rounded-lg flex-shrink-0">
                        <i class="fas fa-clock text-xl md:text-2xl text-yellow-600"></i>
                    </div>
                    <div class="ml-3 md:ml-4 min-w-0">
                        <p class="text-xs md:text-sm text-gray-600">Pending Review</p>
                        <p class="text-xl md:text-2xl font-bold text-gray-900">{{ $stats['pending'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-4 md:p-6">
                <div class="flex items-center">
                    <div class="p-2 md:p-3 bg-green-100 rounded-lg flex-shrink-0">
                        <i class="fas fa-check-circle text-xl md:text-2xl text-green-600"></i>
                    </div>
                    <div class="ml-3 md:ml-4 min-w-0">
                        <p class="text-xs md:text-sm text-gray-600">Approved</p>
                        <p class="text-xl md:text-2xl font-bold text-gray-900">{{ $stats['approved'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-4 md:p-6">
                <div class="flex items-center">
                    <div class="p-2 md:p-3 bg-red-100 rounded-lg flex-shrink-0">
                        <i class="fas fa-times-circle text-xl md:text-2xl text-red-600"></i>
                    </div>
                    <div class="ml-3 md:ml-4 min-w-0">
                        <p class="text-xs md:text-sm text-gray-600">Declined</p>
                        <p class="text-xl md:text-2xl font-bold text-gray-900">{{ $stats['declined'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-3 md:px-4 py-2 md:py-3 rounded mb-6 text-sm md:text-base">
                {{ session('success') }}
            </div>
        @endif

        <!-- Filters -->
        <div class="bg-white rounded-lg shadow p-4 md:p-6 mb-4 md:mb-6">
            <form method="GET" action="{{ route('priest.schedule.index') }}" class="space-y-3 md:space-y-0 md:grid md:grid-cols-1 lg:grid-cols-5 lg:gap-4">
                <div>
                    <label class="block text-xs md:text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search client..."
                           class="w-full px-3 md:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-xs md:text-sm font-medium text-gray-700 mb-1">Sacrament Type</label>
                    <select name="sacrament_type" class="w-full px-3 md:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option value="">All Types</option>
                        <option value="Baptism" {{ request('sacrament_type') == 'Baptism' ? 'selected' : '' }}>Baptism</option>
                        <option value="burial" {{ request('sacrament_type') == 'burial' ? 'selected' : '' }}>Burial</option>
                        <option value="confirmation" {{ request('sacrament_type') == 'confirmation' ? 'selected' : '' }}>Confirmation</option>
                        <option value="wedding" {{ request('sacrament_type') == 'wedding' ? 'selected' : '' }}>Wedding</option>
                        <option value="blessing" {{ request('sacrament_type') == 'blessing' ? 'selected' : '' }}>Blessing</option>
                        <option value="parish_mass" {{ request('sacrament_type') == 'parish_mass' ? 'selected' : '' }}>Parish Mass</option>
                        <option value="barrio_mass" {{ request('sacrament_type') == 'barrio_mass' ? 'selected' : '' }}>Barrio Mass</option>
                        <option value="school_mass" {{ request('sacrament_type') == 'school_mass' ? 'selected' : '' }}>School Mass</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs md:text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" class="w-full px-3 md:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="declined" {{ request('status') == 'declined' ? 'selected' : '' }}>Declined</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs md:text-sm font-medium text-gray-700 mb-1">Date From</label>
                    <input type="date"
                           name="date_from"
                           value="{{ request('date_from') }}"
                           class="w-full px-3 md:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
                <div class="flex gap-2 lg:items-end">
                    <button type="submit" class="flex-1 lg:flex-none bg-indigo-600 text-white px-3 md:px-4 py-2 text-sm rounded-lg hover:bg-indigo-700 transition font-medium">
                        <i class="fas fa-search mr-1 md:mr-2"></i><span class="hidden md:inline">Filter</span>
                    </button>
                    <a href="{{ route('priest.schedule.index') }}" class="bg-gray-200 text-gray-700 px-3 md:px-4 py-2 text-sm rounded-lg hover:bg-gray-300 transition font-medium">
                        <i class="fas fa-redo"></i>
                    </a>
                </div>
            </form>
        </div>

        <!-- Schedules List -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm md:text-base">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Sacrament</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">Schedule</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Contact</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($schedules as $schedule)
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 md:px-6 py-3 md:py-4">
                                    <div class="text-xs md:text-sm font-medium text-gray-900">{{ $schedule->client_name }}</div>
                                    @if($schedule->email)
                                        <div class="text-xs text-gray-500 hidden sm:block">{{ $schedule->email }}</div>
                                    @endif
                                </td>
                                <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap hidden sm:table-cell">
                                    <span class="px-2 md:px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $schedule->sacrament_type_color }}-100 text-{{ $schedule->sacrament_type_color }}-800">
                                        {{ ucfirst(str_replace('_', ' ', $schedule->sacrament_type)) }}
                                    </span>
                                </td>
                                <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap hidden lg:table-cell">
                                    <div class="text-xs md:text-sm text-gray-900">{{ $schedule->schedule_date->format('M d, Y') }}</div>
                                    <div class="text-xs text-gray-500">{{ date('g:i A', strtotime($schedule->schedule_time)) }}</div>
                                </td>
                                <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-xs md:text-sm text-gray-500 hidden md:table-cell">
                                    {{ $schedule->contact_number }}
                                </td>
                                <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                    <span class="px-2 md:px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $schedule->status_color }}-100 text-{{ $schedule->status_color }}-800">
                                        {{ ucfirst($schedule->status) }}
                                    </span>
                                </td>
                                <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-xs md:text-sm font-medium">
                                    <a href="{{ route('priest.schedule.show', $schedule) }}" class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-eye"></i> <span class="hidden md:inline">View</span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-3 md:px-6 py-8 md:py-12 text-center text-gray-500">
                                    <i class="fas fa-calendar text-3 md:text-4xl mb-2 md:mb-3 text-gray-300"></i>
                                    <p class="text-base md:text-lg font-medium">No schedules found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($schedules->hasPages())
                <div class="bg-white px-3 md:px-4 py-3 border-t border-gray-200 sm:px-6 overflow-x-auto">
                    {{ $schedules->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
