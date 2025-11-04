@extends('secretary.shell')

@section('title', 'Schedules')

@section('secretary-content')
<div class="pt-16 min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 py-6 sm:py-8">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Schedule Management</h1>
                <p class="text-xs sm:text-sm text-gray-600 mt-1">Manage appointments for sacraments</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                <a href="{{ route('secretary.schedule.calendar') }}"
                   class="flex-1 sm:flex-none inline-flex items-center justify-center sm:justify-start px-3 sm:px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg shadow transition duration-150 text-sm sm:text-base">
                    <i class="fas fa-calendar-alt mr-1 sm:mr-2"></i>
                    <span class="hidden sm:inline">Calendar View</span><span class="sm:hidden">Calendar</span>
                </a>
                <a href="{{ route('secretary.schedule.create') }}"
                   class="flex-1 sm:flex-none inline-flex items-center justify-center sm:justify-start px-3 sm:px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition duration-150 text-sm sm:text-base">
                    <i class="fas fa-plus mr-1 sm:mr-2"></i>
                    <span class="hidden sm:inline">New Schedule</span><span class="sm:hidden">Add</span>
                </a>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-2 sm:gap-4 md:gap-6 mb-6">
            <div class="bg-white rounded-lg shadow p-3 sm:p-6">
                <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
                    <div class="p-2 sm:p-3 bg-gray-100 rounded-lg w-fit">
                        <i class="fas fa-calendar text-lg sm:text-2xl text-gray-600"></i>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm text-gray-600">Total</p>
                        <p class="text-lg sm:text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-3 sm:p-6">
                <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
                    <div class="p-2 sm:p-3 bg-yellow-100 rounded-lg w-fit">
                        <i class="fas fa-clock text-lg sm:text-2xl text-yellow-600"></i>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm text-gray-600">Pending</p>
                        <p class="text-lg sm:text-2xl font-bold text-gray-900">{{ $stats['pending'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-3 sm:p-6">
                <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
                    <div class="p-2 sm:p-3 bg-green-100 rounded-lg w-fit">
                        <i class="fas fa-check-circle text-lg sm:text-2xl text-green-600"></i>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm text-gray-600">Approved</p>
                        <p class="text-lg sm:text-2xl font-bold text-gray-900">{{ $stats['approved'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-3 sm:p-6 hidden sm:block">
                <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
                    <div class="p-2 sm:p-3 bg-blue-100 rounded-lg w-fit">
                        <i class="fas fa-calendar-check text-lg sm:text-2xl text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm text-gray-600">Completed</p>
                        <p class="text-lg sm:text-2xl font-bold text-gray-900">{{ $stats['completed'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-3 sm:p-6 hidden lg:block">
                <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
                    <div class="p-2 sm:p-3 bg-indigo-100 rounded-lg w-fit">
                        <i class="fas fa-calendar-day text-lg sm:text-2xl text-indigo-600"></i>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm text-gray-600">Today</p>
                        <p class="text-lg sm:text-2xl font-bold text-gray-900">{{ $stats['today'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-3 sm:px-4 py-2 sm:py-3 rounded mb-6 text-xs sm:text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search and Filter Section -->
        <div class="bg-white rounded-lg shadow p-4 sm:p-6 mb-6">
            <form method="GET" action="{{ route('secretary.schedule.index') }}" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                    <!-- Search -->
                    <div>
                        <label for="search" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Search</label>
                        <input type="text"
                               name="search"
                               id="search"
                               value="{{ request('search') }}"
                               placeholder="Name, contact..."
                               class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm">
                    </div>

                    <!-- Sacrament Type -->
                    <div>
                        <label for="sacrament_type" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Schedule Type</label>
                        <select name="sacrament_type"
                                id="sacrament_type"
                                class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm">
                            <option value="">All Types</option>
                            <option value="Baptism" {{ request('sacrament_type') == 'Baptism' ? 'selected' : '' }}>Baptism</option>
                            <option value="burial" {{ request('sacrament_type') == 'burial' ? 'selected' : '' }}>Funeral</option>
                            <option value="confirmation" {{ request('sacrament_type') == 'confirmation' ? 'selected' : '' }}>Confirmation</option>
                            <option value="wedding" {{ request('sacrament_type') == 'wedding' ? 'selected' : '' }}>Wedding</option>
                            <option value="blessing" {{ request('sacrament_type') == 'blessing' ? 'selected' : '' }}>Blessing</option>
                            <option value="parish_mass" {{ request('sacrament_type') == 'parish_mass' ? 'selected' : '' }}>Parish Mass</option>
                            <option value="barrio_mass" {{ request('sacrament_type') == 'barrio_mass' ? 'selected' : '' }}>Barrio Mass</option>
                            <option value="school_mass" {{ request('sacrament_type') == 'school_mass' ? 'selected' : '' }}>School Mass</option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status"
                                id="status"
                                class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm">
                            <option value="">All Statuses</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="declined" {{ request('status') == 'declined' ? 'selected' : '' }}>Declined</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <!-- Date From -->
                    <div>
                        <label for="date_from" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Date From</label>
                        <input type="date"
                               name="date_from"
                               id="date_from"
                               value="{{ request('date_from') }}"
                               class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm">
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-start sm:items-end gap-3 sm:gap-4">
                    <!-- Date To -->
                    <div class="flex-1 w-full sm:w-auto">
                        <label for="date_to" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Date To</label>
                        <input type="date"
                               name="date_to"
                               id="date_to"
                               value="{{ request('date_to') }}"
                               class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm">
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-2 w-full sm:w-auto">
                        <button type="submit"
                                class="flex-1 sm:flex-none px-4 sm:px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition duration-150 text-sm">
                            <i class="fas fa-search mr-1 sm:mr-2"></i><span class="hidden sm:inline">Filter</span><span class="sm:hidden">Go</span>
                        </button>
                        <a href="{{ route('secretary.schedule.index') }}"
                           class="flex-1 sm:flex-none px-4 sm:px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow transition duration-150 text-sm text-center">
                            <i class="fas fa-undo mr-1 sm:mr-2"></i><span class="hidden sm:inline">Reset</span><span class="sm:hidden">Clear</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Schedules Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                            <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                            <th class="hidden sm:table-cell px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sacrament</th>
                            <th class="hidden md:table-cell px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                            <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($schedules as $schedule)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                    <div class="text-xs sm:text-sm font-medium text-gray-900">
                                        {{ $schedule->schedule_date->format('M d, Y') }}
                                    </div>
                                    <div class="text-xs sm:text-sm text-gray-500">
                                        {{ date('g:i A', strtotime($schedule->schedule_time)) }}
                                    </div>
                                </td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                    <div class="text-xs sm:text-sm font-medium text-gray-900">{{ $schedule->client_name }}</div>
                                    @if($schedule->email)
                                        <div class="text-xs sm:text-sm text-gray-500">{{ $schedule->email }}</div>
                                    @endif
                                </td>
                                <td class="hidden sm:table-cell px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $schedule->sacrament_type_color }}-100 text-{{ $schedule->sacrament_type_color }}-800">
                                        {{ ucfirst($schedule->sacrament_type) }}
                                    </span>
                                </td>
                                <td class="hidden md:table-cell px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-600">
                                    {{ $schedule->contact_number }}
                                </td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $schedule->status_color }}-100 text-{{ $schedule->status_color }}-800">
                                        {{ ucfirst($schedule->status) }}
                                    </span>
                                </td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex gap-2 sm:gap-3">
                                        <a href="{{ route('secretary.schedule.show', $schedule) }}"
                                           class="text-blue-600 hover:text-blue-900 text-xs sm:text-sm" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('secretary.schedule.edit', $schedule) }}"
                                           class="text-indigo-600 hover:text-indigo-900 text-xs sm:text-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST"
                                              action="{{ route('secretary.schedule.destroy', $schedule) }}"
                                              class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this schedule?');">
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
                                <td colspan="6" class="px-3 sm:px-6 py-8 sm:py-12 text-center text-gray-500">
                                    <i class="fas fa-calendar-times text-3xl sm:text-4xl mb-3 sm:mb-4 text-gray-300 block"></i>
                                    <p class="text-sm sm:text-lg font-medium">No schedules found.</p>
                                    <a href="{{ route('secretary.schedule.create') }}"
                                       class="text-indigo-600 hover:text-indigo-800 mt-2 inline-block text-xs sm:text-sm">
                                        Create your first schedule
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($schedules->hasPages())
                <div class="px-3 sm:px-6 py-3 sm:py-4 border-t border-gray-200">
                    {{ $schedules->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
