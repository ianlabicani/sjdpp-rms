@extends('secretary.shell')

@section('title', 'Schedule Calendar')

@section('secretary-content')
<style>
    /* Custom scrollbar for calendar cells */
    .scrollbar-thin::-webkit-scrollbar {
        width: 4px;
    }
    .scrollbar-thin::-webkit-scrollbar-track {
        background: transparent;
    }
    .scrollbar-thin::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 2px;
    }
    .scrollbar-thin:hover::-webkit-scrollbar-thumb {
        background: #9ca3af;
    }
    /* Firefox scrollbar */
    .scrollbar-thin {
        scrollbar-width: thin;
        scrollbar-color: #d1d5db transparent;
    }

    /* Calendar cell hover and active states */
    .calendar-cell {
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .calendar-cell:hover {
        background-color: #EEF2FF !important;
        transform: scale(1.02);
    }

    .calendar-cell.selected {
        background-color: #E0E7FF !important;
        box-shadow: inset 0 0 0 2px #6366F1;
    }

    .calendar-cell.today {
        box-shadow: inset 0 0 0 2px #4F46E5;
    }

    .calendar-cell.today.selected {
        box-shadow: inset 0 0 0 3px #4F46E5;
    }
</style>

<div class="pt-16 min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 py-6 sm:py-8">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Schedule Calendar</h1>
                <p class="text-xs sm:text-sm text-gray-600 mt-1">View appointments in calendar format</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                <a href="{{ route('secretary.schedule.index') }}"
                   class="flex-1 sm:flex-none inline-flex items-center justify-center sm:justify-start px-3 sm:px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg shadow transition duration-150 text-sm sm:text-base">
                    <i class="fas fa-list mr-1 sm:mr-2"></i>
                    <span class="hidden sm:inline">List View</span><span class="sm:hidden">List</span>
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

        <!-- Calendar Navigation -->
        <div class="bg-white rounded-lg shadow p-4 sm:p-6 mb-6">
            <div class="flex justify-between items-center gap-2 sm:gap-4 flex-wrap">
                <a href="{{ route('secretary.schedule.calendar', ['year' => $date->copy()->subMonth()->year, 'month' => $date->copy()->subMonth()->month]) }}"
                   class="px-3 sm:px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-lg transition duration-150 text-xs sm:text-sm">
                    <i class="fas fa-chevron-left mr-1 sm:mr-2"></i><span class="hidden sm:inline">Previous</span><span class="sm:hidden">Prev</span>
                </a>
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900">{{ $date->format('F Y') }}</h2>
                <a href="{{ route('secretary.schedule.calendar', ['year' => $date->copy()->addMonth()->year, 'month' => $date->copy()->addMonth()->month]) }}"
                   class="px-3 sm:px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-lg transition duration-150 text-xs sm:text-sm">
                    <span class="hidden sm:inline">Next</span><span class="sm:hidden">Nxt</span><i class="fas fa-chevron-right ml-1 sm:ml-2"></i>
                </a>
            </div>
        </div>

        <!-- Main Content: Calendar and Side Panel -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 sm:gap-6">
            <!-- Calendar -->
            <div class="lg:col-span-3">
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <div class="grid grid-cols-7 bg-gray-100 border-b border-gray-200 min-w-min">
                <div class="p-2 sm:p-3 text-center font-semibold text-gray-700 text-xs sm:text-sm">Sun</div>
                <div class="p-2 sm:p-3 text-center font-semibold text-gray-700 text-xs sm:text-sm">Mon</div>
                <div class="p-2 sm:p-3 text-center font-semibold text-gray-700 text-xs sm:text-sm">Tue</div>
                <div class="p-2 sm:p-3 text-center font-semibold text-gray-700 text-xs sm:text-sm">Wed</div>
                <div class="p-2 sm:p-3 text-center font-semibold text-gray-700 text-xs sm:text-sm">Thu</div>
                <div class="p-2 sm:p-3 text-center font-semibold text-gray-700 text-xs sm:text-sm">Fri</div>
                <div class="p-2 sm:p-3 text-center font-semibold text-gray-700 text-xs sm:text-sm">Sat</div>
            </div>

            <div class="grid grid-cols-7 min-w-min">
                @php
                    $firstDayOfMonth = $date->copy()->startOfMonth();
                    $lastDayOfMonth = $date->copy()->endOfMonth();
                    $startDate = $firstDayOfMonth->copy()->startOfWeek(\Carbon\Carbon::SUNDAY);
                    $endDate = $lastDayOfMonth->copy()->endOfWeek(\Carbon\Carbon::SATURDAY);
                    $currentDate = $startDate->copy();
                    $today = now()->format('Y-m-d');
                @endphp

                @while($currentDate <= $endDate)
                    @php
                        $dateKey = $currentDate->format('Y-m-d');
                        $isCurrentMonth = $currentDate->month === $date->month;
                        $isToday = $dateKey === $today;
                        $daySchedules = $schedules->get($dateKey, collect());
                    @endphp

                    <div data-date="{{ $dateKey }}"
                         data-date-name="{{ $currentDate->format('F d, Y') }}"
                         onclick="selectDate(this)"
                         class="calendar-cell min-h-20 sm:min-h-28 md:min-h-32 border-b border-r border-gray-200 p-1 sm:p-2 {{ $isCurrentMonth ? 'bg-white' : 'bg-gray-50' }} {{ $isToday ? 'today' : '' }} flex flex-col">
                        <div class="flex justify-between items-start mb-1 flex-shrink-0 pointer-events-none">
                            <span class="text-xs sm:text-sm font-semibold {{ $isCurrentMonth ? 'text-gray-900' : 'text-gray-400' }} {{ $isToday ? 'bg-indigo-600 text-white rounded-full w-6 h-6 sm:w-7 sm:h-7 flex items-center justify-center' : '' }}">
                                {{ $currentDate->day }}
                            </span>
                            @if($daySchedules->count() > 0)
                                <span class="text-xs bg-indigo-100 text-indigo-800 px-1 sm:px-2 py-0.5 rounded-full font-semibold">
                                    {{ $daySchedules->count() }}
                                </span>
                            @endif
                        </div>

                        <div class="space-y-0.5 overflow-y-auto flex-1 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-transparent hover:scrollbar-thumb-gray-400 pointer-events-none">
                            @foreach($daySchedules->take(2) as $schedule)
                                <div class="text-xs p-0.5 sm:p-1 rounded bg-{{ $schedule->sacrament_type_color }}-100 border-l-2 border-{{ $schedule->sacrament_type_color }}-500 line-clamp-2">
                                    <div class="font-semibold text-{{ $schedule->sacrament_type_color }}-900 truncate text-xs">
                                        {{ date('g:i A', strtotime($schedule->schedule_time)) }}
                                    </div>
                                    <div class="text-{{ $schedule->sacrament_type_color }}-700 truncate text-xs">
                                        {{ $schedule->client_name }}
                                    </div>
                                </div>
                            @endforeach
                            @if($daySchedules->count() > 2)
                                <div class="text-xs text-gray-600 font-semibold px-0.5 sm:px-1">
                                    +{{ $daySchedules->count() - 2 }} more
                                </div>
                            @endif
                        </div>
                    </div>

                    @php
                        $currentDate->addDay();
                    @endphp
                @endwhile
            </div>
        </div>
    </div>

    <!-- Side Panel for Selected Date Events -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-lg shadow-md p-4 sm:p-6 sticky top-20 sm:top-24">
            <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-4">
                <i class="fas fa-calendar-day text-indigo-600 mr-2"></i>
                Details
            </h3>

            <!-- Selected Date Display -->
            <div id="selectedDateDisplay" class="mb-4 p-3 bg-indigo-50 rounded-lg border border-indigo-200">
                <p class="text-xs sm:text-sm font-medium text-indigo-900" id="selectedDateName">Today's Events</p>
                <p class="text-xs text-indigo-600 mt-1" id="scheduleCount">Loading...</p>
            </div>

            <!-- Schedules List -->
            <div id="schedulesContainer" class="space-y-2 sm:space-y-3 max-h-60 sm:max-h-96 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-transparent hover:scrollbar-thumb-gray-400">
                <div class="text-center text-gray-500 py-6 sm:py-8">
                    <i class="fas fa-spinner fa-spin text-xl sm:text-2xl mb-2"></i>
                    <p class="text-xs sm:text-sm">Loading...</p>
                </div>
            </div>

            <!-- Color Legend -->
            <div class="mt-4 sm:mt-6 pt-4 border-t border-gray-200">
                <p class="text-xs font-semibold text-gray-700 mb-2">Sacraments:</p>
                <div class="grid grid-cols-2 gap-1 sm:gap-2 text-xs">
                    <div class="flex items-center gap-1 sm:gap-2">
                        <div class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-blue-500"></div>
                        <span class="text-gray-600 text-xs">Baptism</span>
                    </div>
                    <div class="flex items-center gap-1 sm:gap-2">
                        <div class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-purple-500"></div>
                        <span class="text-gray-600 text-xs">Funeral</span>
                    </div>
                    <div class="flex items-center gap-1 sm:gap-2">
                        <div class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-indigo-500"></div>
                        <span class="text-gray-600 text-xs">Confirm.</span>
                    </div>
                    <div class="flex items-center gap-1 sm:gap-2">
                        <div class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-pink-500"></div>
                        <span class="text-gray-600 text-xs">Wedding</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Mobile Legend (Hidden on Large Screens) -->
        <div class="mt-4 sm:mt-6 bg-white rounded-lg shadow p-4 sm:p-6 lg:hidden">
            <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-3 sm:mb-4">Legend</h3>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 sm:gap-4">
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 bg-blue-500 rounded"></div>
                    <span class="text-xs sm:text-sm text-gray-700">Baptism</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 bg-purple-500 rounded"></div>
                    <span class="text-xs sm:text-sm text-gray-700">Funeral</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 bg-indigo-500 rounded"></div>
                    <span class="text-xs sm:text-sm text-gray-700">Confirm.</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 bg-pink-500 rounded"></div>
                    <span class="text-xs sm:text-sm text-gray-700">Wedding</span>
                </div>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 sm:gap-4 mt-3 sm:mt-4">
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 bg-yellow-500 rounded"></div>
                    <span class="text-xs sm:text-sm text-gray-700">Pending</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 bg-green-500 rounded"></div>
                    <span class="text-xs sm:text-sm text-gray-700">Approved</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 bg-blue-500 rounded"></div>
                    <span class="text-xs sm:text-sm text-gray-700">Completed</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 bg-red-500 rounded"></div>
                    <span class="text-xs sm:text-sm text-gray-700">Declined</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // All schedules data from backend
    const allSchedules = @json($schedules);

    // Function to get sacrament icon
    function getSacramentIcon(type) {
        const icons = {
            'Baptism': 'fa-water',
            'burial': 'fa-cross',
            'confirmation': 'fa-hands-praying',
            'wedding': 'fa-heart',
            'blessing': 'fa-hand-holding-heart',
            'parish_mass': 'fa-church',
            'barrio_mass': 'fa-people-roof',
            'school_mass': 'fa-school'
        };
        return icons[type] || 'fa-calendar';
    }

    // Function to get sacrament color
    function getSacramentColor(type) {
        const colors = {
            'Baptism': 'blue',
            'burial': 'purple',
            'confirmation': 'indigo',
            'wedding': 'pink',
            'blessing': 'teal',
            'parish_mass': 'cyan',
            'barrio_mass': 'emerald',
            'school_mass': 'amber'
        };
        return colors[type] || 'gray';
    }

    // Function to get status color
    function getStatusColor(status) {
        const colors = {
            'pending': 'yellow',
            'cancelled': 'gray',
            'approved': 'green',
            'declined': 'red',
            'completed': 'blue'
        };
        return colors[status] || 'gray';
    }

    // Function to format time
    function formatTime(timeString) {
        const [hours, minutes] = timeString.split(':');
        const hour = parseInt(hours);
        const ampm = hour >= 12 ? 'PM' : 'AM';
        const displayHour = hour === 0 ? 12 : hour > 12 ? hour - 12 : hour;
        return `${displayHour}:${minutes} ${ampm}`;
    }

    // Function to show schedules for a specific date
    function showSchedulesForDate(dateKey, dateName) {
        const selectedDateName = document.getElementById('selectedDateName');
        const scheduleCount = document.getElementById('scheduleCount');
        const schedulesContainer = document.getElementById('schedulesContainer');

        // Update selected date display
        selectedDateName.textContent = dateName;

        // Get schedules for this date
        const dateSchedules = allSchedules[dateKey] || [];

        // Update count
        scheduleCount.textContent = dateSchedules.length === 0
            ? 'No schedules'
            : `${dateSchedules.length} schedule${dateSchedules.length > 1 ? 's' : ''}`;

        // Clear container
        schedulesContainer.innerHTML = '';

        if (dateSchedules.length === 0) {
            schedulesContainer.innerHTML = `
                <div class="text-center text-gray-500 py-8">
                    <i class="fas fa-calendar-check text-4xl mb-3 text-gray-300"></i>
                    <p class="text-sm font-medium">No schedules for this date</p>
                    <p class="text-xs mt-1">This date is available for booking</p>
                </div>
            `;
            return;
        }

        // Display each schedule
        dateSchedules.forEach(schedule => {
            const color = getSacramentColor(schedule.sacrament_type);
            const statusColor = getStatusColor(schedule.status);
            const icon = getSacramentIcon(schedule.sacrament_type);

            const scheduleCard = document.createElement('div');
            scheduleCard.className = `bg-${color}-50 border border-${color}-200 rounded-lg p-3 sm:p-4 hover:shadow-md transition cursor-pointer`;
            scheduleCard.onclick = function() {
                window.location.href = `/secretary/schedule/${schedule.id}`;
            };
            scheduleCard.innerHTML = `
                <div class="flex items-start gap-2 sm:gap-3">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-${color}-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas ${icon} text-white text-xs sm:text-sm"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1 flex-wrap">
                            <h4 class="font-semibold text-${color}-900 text-xs sm:text-sm truncate">${schedule.client_name}</h4>
                            <span class="px-2 py-0.5 text-xs rounded-full bg-${statusColor}-100 text-${statusColor}-800 border border-${statusColor}-200 flex-shrink-0">
                                ${schedule.status}
                            </span>
                        </div>
                        <p class="text-xs text-${color}-700 mb-2">
                            <i class="fas fa-clock mr-1"></i>
                            ${formatTime(schedule.schedule_time)}
                        </p>
                        <div class="space-y-1 text-xs">
                            <p class="text-${color}-600">
                                <i class="fas fa-phone mr-1"></i>
                                <span class="hidden sm:inline">${schedule.contact_number}</span>
                                <span class="sm:hidden truncate">${schedule.contact_number.substring(0, 15)}</span>
                            </p>
                            ${schedule.email ? `
                                <p class="text-${color}-600 truncate">
                                    <i class="fas fa-envelope mr-1"></i>
                                    <span class="hidden sm:inline">${schedule.email}</span>
                                    <span class="sm:hidden">${schedule.email.substring(0, 20)}</span>
                                </p>
                            ` : ''}
                            ${schedule.notes ? `
                                <p class="text-${color}-600 mt-2 pt-2 border-t border-${color}-200 line-clamp-2">
                                    <i class="fas fa-sticky-note mr-1"></i>
                                    ${schedule.notes}
                                </p>
                            ` : ''}
                        </div>
                        <div class="mt-2 sm:mt-3 pt-2 border-t border-${color}-200">
                            <span class="text-xs text-${color}-700 font-medium inline-flex items-center gap-1">
                                <i class="fas fa-eye"></i>
                                <span class="hidden sm:inline">View Details</span><span class="sm:hidden">View</span>
                            </span>
                        </div>
                    </div>
                </div>
            `;
            schedulesContainer.appendChild(scheduleCard);
        });
    }

    // Function to select a date cell
    function selectDate(cellElement) {
        // Remove selected class from all cells
        document.querySelectorAll('.calendar-cell').forEach(cell => {
            cell.classList.remove('selected');
        });

        // Add selected class to clicked cell
        cellElement.classList.add('selected');

        // Get date info from data attributes
        const dateKey = cellElement.getAttribute('data-date');
        const dateName = cellElement.getAttribute('data-date-name');

        // Show schedules for this date
        showSchedulesForDate(dateKey, dateName);
    }

    // Auto-load today's events on page load
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        const todayKey = `${year}-${month}-${day}`;

        const todayFormatted = today.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        // Find and select today's cell
        const todayCell = document.querySelector(`.calendar-cell[data-date="${todayKey}"]`);
        if (todayCell) {
            todayCell.classList.add('selected');
        }

        showSchedulesForDate(todayKey, todayFormatted);
    });
</script>

@endsection
