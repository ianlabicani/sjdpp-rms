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
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Schedule Calendar</h1>
                <p class="text-gray-600 mt-1">View appointments in calendar format</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('secretary.schedule.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg shadow transition duration-150">
                    <i class="fas fa-list mr-2"></i>
                    List View
                </a>
                <a href="{{ route('secretary.schedule.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition duration-150">
                    <i class="fas fa-plus mr-2"></i>
                    New Schedule
                </a>
            </div>
        </div>

        <!-- Statistics Cards -->
                <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-gray-100 rounded-lg">
                        <i class="fas fa-calendar text-2xl text-gray-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Total</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-yellow-100 rounded-lg">
                        <i class="fas fa-clock text-2xl text-yellow-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Pending</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['pending'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-lg">
                        <i class="fas fa-check-circle text-2xl text-green-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Approved</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['approved'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <i class="fas fa-calendar-check text-2xl text-blue-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Completed</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['completed'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-indigo-100 rounded-lg">
                        <i class="fas fa-calendar-day text-2xl text-indigo-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Today</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['today'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Calendar Navigation -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <div class="flex justify-between items-center">
                <a href="{{ route('secretary.schedule.calendar', ['year' => $date->copy()->subMonth()->year, 'month' => $date->copy()->subMonth()->month]) }}"
                   class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-lg transition duration-150">
                    <i class="fas fa-chevron-left mr-2"></i>Previous
                </a>
                <h2 class="text-2xl font-bold text-gray-900">{{ $date->format('F Y') }}</h2>
                <a href="{{ route('secretary.schedule.calendar', ['year' => $date->copy()->addMonth()->year, 'month' => $date->copy()->addMonth()->month]) }}"
                   class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-lg transition duration-150">
                    Next<i class="fas fa-chevron-right ml-2"></i>
                </a>
            </div>
        </div>

        <!-- Main Content: Calendar and Side Panel -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Calendar -->
            <div class="lg:col-span-3">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="grid grid-cols-7 bg-gray-100 border-b border-gray-200">
                <div class="p-3 text-center font-semibold text-gray-700">Sun</div>
                <div class="p-3 text-center font-semibold text-gray-700">Mon</div>
                <div class="p-3 text-center font-semibold text-gray-700">Tue</div>
                <div class="p-3 text-center font-semibold text-gray-700">Wed</div>
                <div class="p-3 text-center font-semibold text-gray-700">Thu</div>
                <div class="p-3 text-center font-semibold text-gray-700">Fri</div>
                <div class="p-3 text-center font-semibold text-gray-700">Sat</div>
            </div>

            <div class="grid grid-cols-7">
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
                         class="calendar-cell h-32 border-b border-r border-gray-200 p-2 {{ $isCurrentMonth ? 'bg-white' : 'bg-gray-50' }} {{ $isToday ? 'today' : '' }} flex flex-col">
                        <div class="flex justify-between items-start mb-1 flex-shrink-0 pointer-events-none">
                            <span class="text-sm font-semibold {{ $isCurrentMonth ? 'text-gray-900' : 'text-gray-400' }} {{ $isToday ? 'bg-indigo-600 text-white rounded-full w-7 h-7 flex items-center justify-center' : '' }}">
                                {{ $currentDate->day }}
                            </span>
                            @if($daySchedules->count() > 0)
                                <span class="text-xs bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full font-semibold">
                                    {{ $daySchedules->count() }}
                                </span>
                            @endif
                        </div>

                        <div class="space-y-1 overflow-y-auto flex-1 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-transparent hover:scrollbar-thumb-gray-400 pointer-events-none">
                            @foreach($daySchedules as $schedule)
                                <div class="block text-xs p-1 rounded bg-{{ $schedule->sacrament_type_color }}-100 border-l-2 border-{{ $schedule->sacrament_type_color }}-500">
                                    <div class="font-semibold text-{{ $schedule->sacrament_type_color }}-900 truncate">
                                        {{ date('g:i A', strtotime($schedule->schedule_time)) }}
                                    </div>
                                    <div class="text-{{ $schedule->sacrament_type_color }}-700 truncate">
                                        {{ $schedule->client_name }}
                                    </div>
                                    <div class="flex items-center gap-1 mt-1">
                                        <span class="px-1 py-0.5 text-xs rounded bg-{{ $schedule->sacrament_type_color }}-200 text-{{ $schedule->sacrament_type_color }}-800">
                                            @if($schedule->sacrament_type == 'Baptism')
                                                <i class="fas fa-water"></i>
                                            @elseif($schedule->sacrament_type == 'burial')
                                                <i class="fas fa-cross"></i>
                                            @elseif($schedule->sacrament_type == 'confirmation')
                                                <i class="fas fa-hands-praying"></i>
                                            @elseif($schedule->sacrament_type == 'wedding')
                                                <i class="fas fa-heart"></i>
                                            @elseif($schedule->sacrament_type == 'blessing')
                                                <i class="fas fa-hand-holding-heart"></i>
                                            @elseif($schedule->sacrament_type == 'parish_mass')
                                                <i class="fas fa-church"></i>
                                            @elseif($schedule->sacrament_type == 'barrio_mass')
                                                <i class="fas fa-people-roof"></i>
                                            @elseif($schedule->sacrament_type == 'school_mass')
                                                <i class="fas fa-school"></i>
                                            @else
                                                <i class="fas fa-calendar"></i>
                                            @endif
                                        </span>
                                        <span class="px-1 py-0.5 text-xs rounded bg-{{ $schedule->status_color }}-200 text-{{ $schedule->status_color }}-800">
                                            {{ substr($schedule->status, 0, 4) }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
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
        <div class="bg-white rounded-lg shadow-md p-6 sticky top-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">
                <i class="fas fa-calendar-day text-indigo-600 mr-2"></i>
                Schedule Details
            </h3>

            <!-- Selected Date Display -->
            <div id="selectedDateDisplay" class="mb-4 p-3 bg-indigo-50 rounded-lg border border-indigo-200">
                <p class="text-sm font-medium text-indigo-900" id="selectedDateName">Today's Events</p>
                <p class="text-xs text-indigo-600 mt-1" id="scheduleCount">Loading...</p>
            </div>

            <!-- Schedules List -->
            <div id="schedulesContainer" class="space-y-3 max-h-96 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-transparent hover:scrollbar-thumb-gray-400">
                <div class="text-center text-gray-500 py-8">
                    <i class="fas fa-spinner fa-spin text-2xl mb-2"></i>
                    <p class="text-sm">Loading schedules...</p>
                </div>
            </div>

            <!-- Color Legend -->
            <div class="mt-6 pt-4 border-t border-gray-200">
                <p class="text-xs font-semibold text-gray-700 mb-2">Sacrament Types:</p>
                <div class="grid grid-cols-2 gap-2 text-xs">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                        <span class="text-gray-600">Baptism</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-purple-500"></div>
                        <span class="text-gray-600">Funeral</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-indigo-500"></div>
                        <span class="text-gray-600">Confirmation</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-pink-500"></div>
                        <span class="text-gray-600">Wedding</span>
                    </div>
                </div>
                <p class="text-xs font-semibold text-gray-700 mb-2 mt-3">Status:</p>
                <div class="grid grid-cols-2 gap-2 text-xs">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <span class="text-gray-600">Pending</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        <span class="text-gray-600">Approved</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                        <span class="text-gray-600">Completed</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <span class="text-gray-600">Declined</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-gray-500"></div>
                        <span class="text-gray-600">Cancelled</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Original Legend (Hidden on Large Screens) -->
        <div class="mt-6 bg-white rounded-lg shadow p-6 lg:hidden">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Legend</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-blue-500 rounded"></div>
                    <span class="text-sm text-gray-700">Baptism</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-purple-500 rounded"></div>
                    <span class="text-sm text-gray-700">Funeral</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-indigo-500 rounded"></div>
                    <span class="text-sm text-gray-700">Confirmation</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-pink-500 rounded"></div>
                    <span class="text-sm text-gray-700">Wedding</span>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-yellow-500 rounded"></div>
                    <span class="text-sm text-gray-700">Pending</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-blue-500 rounded"></div>
                    <span class="text-sm text-gray-700">Confirmed</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-green-500 rounded"></div>
                    <span class="text-sm text-gray-700">Completed</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-red-500 rounded"></div>
                    <span class="text-sm text-gray-700">Cancelled</span>
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
            scheduleCard.className = `bg-${color}-50 border border-${color}-200 rounded-lg p-4 hover:shadow-md transition cursor-pointer`;
            scheduleCard.onclick = function() {
                window.location.href = `/secretary/schedule/${schedule.id}`;
            };
            scheduleCard.innerHTML = `
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 bg-${color}-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas ${icon} text-white"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1">
                            <h4 class="font-semibold text-${color}-900 text-sm truncate">${schedule.client_name}</h4>
                            <span class="px-2 py-0.5 text-xs rounded-full bg-${statusColor}-100 text-${statusColor}-800 border border-${statusColor}-200 flex-shrink-0">
                                ${schedule.status}
                            </span>
                        </div>
                        <p class="text-xs text-${color}-700 mb-2">
                            <i class="fas fa-clock mr-1"></i>
                            ${formatTime(schedule.schedule_time)}
                        </p>
                        <div class="space-y-1">
                            <p class="text-xs text-${color}-600">
                                <i class="fas fa-phone mr-1"></i>
                                ${schedule.contact_number}
                            </p>
                            ${schedule.email ? `
                                <p class="text-xs text-${color}-600 truncate">
                                    <i class="fas fa-envelope mr-1"></i>
                                    ${schedule.email}
                                </p>
                            ` : ''}
                            ${schedule.notes ? `
                                <p class="text-xs text-${color}-600 mt-2 pt-2 border-t border-${color}-200">
                                    <i class="fas fa-sticky-note mr-1"></i>
                                    ${schedule.notes}
                                </p>
                            ` : ''}
                        </div>
                        <div class="mt-3 pt-2 border-t border-${color}-200">
                            <span class="text-xs text-${color}-700 font-medium inline-flex items-center gap-1">
                                <i class="fas fa-eye"></i>
                                View Details
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
