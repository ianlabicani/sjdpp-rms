@extends('priest.shell')

@section('title', 'Schedule Calendar')

@section('priest-content')
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
    <div class="max-w-7xl mx-auto px-3 sm:px-4 md:px-6 lg:px-8 py-4 md:py-8">
        <!-- Header with View Toggle -->
        <div class="mb-4 md:mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Schedule Calendar</h1>
                <p class="text-xs md:text-base text-gray-600 mt-1">Visual overview of all schedules</p>
            </div>
            <div class="flex gap-2 w-full sm:w-auto">
                <a href="{{ route('priest.schedule.calendar') }}" class="flex-1 sm:flex-none px-3 md:px-4 py-2 text-sm md:text-base bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-medium">
                    <i class="fas fa-calendar-alt mr-1 md:mr-2"></i><span class="hidden md:inline">Calendar</span>
                </a>
                <a href="{{ route('priest.schedule.index') }}" class="flex-1 sm:flex-none px-3 md:px-4 py-2 text-sm md:text-base bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-medium">
                    <i class="fas fa-list mr-1 md:mr-2"></i><span class="hidden md:inline">List</span>
                </a>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-2 md:gap-6 mb-4 md:mb-6">
            <div class="bg-white rounded-lg shadow p-3 md:p-6">
                <div class="flex items-center gap-2 md:gap-4">
                    <div class="p-2 md:p-3 bg-gray-100 rounded-lg flex-shrink-0">
                        <i class="fas fa-calendar text-lg md:text-2xl text-gray-600"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-xs md:text-sm text-gray-600">This Month</p>
                        <p class="text-lg md:text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-3 md:p-6">
                <div class="flex items-center gap-2 md:gap-4">
                    <div class="p-2 md:p-3 bg-yellow-100 rounded-lg flex-shrink-0">
                        <i class="fas fa-clock text-lg md:text-2xl text-yellow-600"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-xs md:text-sm text-gray-600">Pending</p>
                        <p class="text-lg md:text-2xl font-bold text-gray-900">{{ $stats['pending'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-3 md:p-6">
                <div class="flex items-center gap-2 md:gap-4">
                    <div class="p-2 md:p-3 bg-green-100 rounded-lg flex-shrink-0">
                        <i class="fas fa-check-circle text-lg md:text-2xl text-green-600"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-xs md:text-sm text-gray-600">Approved</p>
                        <p class="text-lg md:text-2xl font-bold text-gray-900">{{ $stats['approved'] }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-3 md:p-6">
                <div class="flex items-center gap-2 md:gap-4">
                    <div class="p-2 md:p-3 bg-red-100 rounded-lg flex-shrink-0">
                        <i class="fas fa-times-circle text-lg md:text-2xl text-red-600"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-xs md:text-sm text-gray-600">Declined</p>
                        <p class="text-lg md:text-2xl font-bold text-gray-900">{{ $stats['declined'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-3 md:px-4 py-2 md:py-3 rounded mb-4 md:mb-6 text-sm md:text-base">
                {{ session('success') }}
            </div>
        @endif

        <!-- Calendar Navigation -->
        <div class="bg-white rounded-lg shadow p-3 md:p-4 mb-4 md:mb-6">
            <div class="flex items-center justify-between gap-2 md:gap-4">
                <a href="{{ route('priest.schedule.calendar', ['month' => $currentDate->copy()->subMonth()->month, 'year' => $currentDate->copy()->subMonth()->year]) }}"
                   class="px-2 md:px-4 py-2 text-sm md:text-base bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    <i class="fas fa-chevron-left"></i><span class="hidden md:inline ml-2">Previous</span>
                </a>
                <h2 class="text-lg md:text-2xl font-bold text-gray-900 text-center flex-1">
                    {{ $currentDate->format('F Y') }}
                </h2>
                <a href="{{ route('priest.schedule.calendar', ['month' => $currentDate->copy()->addMonth()->month, 'year' => $currentDate->copy()->addMonth()->year]) }}"
                   class="px-2 md:px-4 py-2 text-sm md:text-base bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    <span class="hidden md:inline mr-2">Next</span><i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>

        <!-- Main Content: Calendar and Side Panel -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-3 md:gap-6">
            <!-- Calendar -->
            <div class="lg:col-span-3">
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <!-- Calendar Header (Days of Week) -->
                    <div class="grid grid-cols-7 gap-px bg-gray-200">
                        @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                            <div class="bg-indigo-600 py-2 md:py-3 text-center">
                                <span class="text-xs md:text-sm font-bold text-white">{{ $day }}</span>
                            </div>
                        @endforeach
                    </div>

                    <!-- Calendar Days -->
                    <div class="grid grid-cols-7 gap-px bg-gray-200">
                        @php
                            $startOfMonth = $currentDate->copy()->startOfMonth();
                            $endOfMonth = $currentDate->copy()->endOfMonth();
                            $startDay = $startOfMonth->dayOfWeek; // 0 = Sunday
                            $daysInMonth = $startOfMonth->daysInMonth;

                            // Fill empty cells before month starts
                            $emptyCells = $startDay;
                        @endphp

                        <!-- Empty cells before month starts -->
                        @for($i = 0; $i < $emptyCells; $i++)
                            <div class="bg-gray-100 min-h-[80px] md:min-h-[120px] p-1 md:p-2"></div>
                        @endfor

                        <!-- Days of the month -->
                        @for($day = 1; $day <= $daysInMonth; $day++)
                            @php
                                $date = $currentDate->copy()->day($day);
                                $dateKey = $date->format('Y-m-d');
                                $daySchedules = $schedules->get($dateKey, collect());
                                $isToday = $date->isToday();
                            @endphp

                            <div data-date="{{ $dateKey }}"
                                 data-date-name="{{ $date->format('F d, Y') }}"
                                 onclick="selectDate(this)"
                                 class="calendar-cell bg-white min-h-[80px] md:min-h-[120px] p-1 md:p-2 {{ $isToday ? 'today' : '' }} hover:bg-gray-50 transition flex flex-col cursor-pointer border border-gray-100">
                                <!-- Date Number -->
                                <div class="text-right mb-1 flex-shrink-0 pointer-events-none">
                                    <span class="inline-flex items-center justify-center w-6 md:w-8 h-6 md:h-8 rounded-full text-xs md:text-sm font-bold {{ $isToday ? 'bg-indigo-600 text-white' : 'text-gray-700' }}">
                                        {{ $day }}
                                    </span>
                                    @if($daySchedules->count() > 0)
                                        <span class="inline-block ml-0.5 md:ml-1 text-xs bg-indigo-100 text-indigo-800 px-1.5 md:px-2 py-0.5 md:py-1 rounded-full font-bold">
                                            {{ $daySchedules->count() }}
                                        </span>
                                    @endif
                                </div>

                                <!-- Schedules for this day -->
                                <div class="space-y-0.5 md:space-y-1 overflow-y-auto flex-1 max-h-[50px] md:max-h-[80px] scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-transparent hover:scrollbar-thumb-gray-400">
                                    @foreach($daySchedules->take(2) as $schedule)
                                        <div class="block px-1 md:px-2 py-0.5 md:py-1 rounded text-xs pointer-events-none truncate font-semibold
                                                  @if($schedule->status == 'pending') bg-yellow-100 text-yellow-800 border-l-2 border-yellow-500
                                                  @elseif($schedule->status == 'approved') bg-green-100 text-green-800 border-l-2 border-green-500
                                                  @else bg-red-100 text-red-800 border-l-2 border-red-500
                                                  @endif">
                                            {{ date('g:i A', strtotime($schedule->schedule_time)) }}
                                        </div>
                                    @endforeach
                                    @if($daySchedules->count() > 2)
                                        <div class="text-center text-xs text-gray-500 font-semibold py-0.5">
                                            +{{ $daySchedules->count() - 2 }} more
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endfor

                        <!-- Empty cells after month ends -->
                        @php
                            $remainingCells = (7 - (($emptyCells + $daysInMonth) % 7)) % 7;
                        @endphp
                        @for($i = 0; $i < $remainingCells; $i++)
                            <div class="bg-gray-100 min-h-[80px] md:min-h-[120px] p-1 md:p-2"></div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Side Panel for Selected Date Events -->
            <div class="lg:col-span-1 order-first lg:order-last">
                <div class="bg-white rounded-lg shadow-md p-3 md:p-6 sticky top-20 max-h-[calc(100vh-100px)] overflow-y-auto">
                    <h3 class="text-base md:text-lg font-bold text-gray-900 mb-3 md:mb-4">
                        <i class="fas fa-calendar-day text-indigo-600 mr-2"></i>
                        <span class="hidden md:inline">Schedule</span><span class="md:hidden">Events</span>
                    </h3>

                    <!-- Selected Date Display -->
                    <div id="selectedDateDisplay" class="mb-3 md:mb-4 p-2 md:p-3 bg-indigo-50 rounded-lg border border-indigo-200">
                        <p class="text-xs md:text-sm font-bold text-indigo-900" id="selectedDateName">Today's Events</p>
                        <p class="text-xs text-indigo-600 mt-1" id="scheduleCount">Loading...</p>
                    </div>

                    <!-- Schedules List -->
                    <div id="schedulesContainer" class="space-y-2 md:space-y-3 max-h-64 md:max-h-96 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-transparent hover:scrollbar-thumb-gray-400">
                        <div class="text-center text-gray-500 py-6 md:py-8">
                            <i class="fas fa-spinner fa-spin text-xl md:text-2xl mb-2"></i>
                            <p class="text-xs md:text-sm">Loading schedules...</p>
                        </div>
                    </div>

                    <!-- Color Legend -->
                    <div class="mt-4 md:mt-6 pt-3 md:pt-4 border-t border-gray-200">
                        <p class="text-xs font-bold text-gray-700 mb-2">Priest Status:</p>
                        <div class="space-y-1.5 text-xs mb-3 md:mb-4">
                            <div class="flex items-center gap-2">
                                <div class="w-2 md:w-3 h-2 md:h-3 rounded-full bg-yellow-500"></div>
                                <span class="text-gray-600 text-xs">Pending</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-2 md:w-3 h-2 md:h-3 rounded-full bg-green-500"></div>
                                <span class="text-gray-600 text-xs">Approved</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-2 md:w-3 h-2 md:h-3 rounded-full bg-red-500"></div>
                                <span class="text-gray-600 text-xs">Declined</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Legend (Mobile View) -->
        <div class="mt-4 md:mt-6 bg-white rounded-lg shadow p-3 md:p-4 lg:hidden">
            <h3 class="text-xs md:text-sm font-bold text-gray-700 mb-2">Quick Legend:</h3>
            <div class="flex flex-wrap gap-2 md:gap-4">
                <div class="flex items-center text-xs">
                    <div class="w-3 h-3 bg-yellow-100 border-l-2 border-yellow-500 rounded mr-1.5"></div>
                    <span class="text-gray-600">Pending</span>
                </div>
                <div class="flex items-center text-xs">
                    <div class="w-3 h-3 bg-green-100 border-l-2 border-green-500 rounded mr-1.5"></div>
                    <span class="text-gray-600">Approved</span>
                </div>
                <div class="flex items-center text-xs">
                    <div class="w-3 h-3 bg-red-100 border-l-2 border-red-500 rounded mr-1.5"></div>
                    <span class="text-gray-600">Declined</span>
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

    // Function to get priest status color
    function getPriestStatusColor(status) {
        const colors = {
            'pending': 'yellow',
            'approved': 'green',
            'declined': 'red'
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
                    <p class="text-xs mt-1">No reviews needed</p>
                </div>
            `;
            return;
        }

        // Display each schedule
        dateSchedules.forEach(schedule => {
            const color = getSacramentColor(schedule.sacrament_type);
            const priestStatusColor = getPriestStatusColor(schedule.status);
            const icon = getSacramentIcon(schedule.sacrament_type);

            const scheduleCard = document.createElement('div');
            scheduleCard.className = `bg-${color}-50 border border-${color}-200 rounded-lg p-2 md:p-4 hover:shadow-md transition cursor-pointer`;
            scheduleCard.onclick = function() {
                window.location.href = `/priest/schedule/${schedule.id}`;
            };
            scheduleCard.innerHTML = `
                <div class="flex items-start gap-2 md:gap-3">
                    <div class="w-8 md:w-10 h-8 md:h-10 bg-${color}-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas ${icon} text-white text-xs md:text-base"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1 flex-wrap">
                            <h4 class="font-bold text-${color}-900 text-xs md:text-sm truncate">${schedule.client_name}</h4>
                        </div>
                        <p class="text-xs text-${color}-700 mb-1 md:mb-2">
                            <i class="fas fa-clock mr-1"></i>
                            ${formatTime(schedule.schedule_time)}
                        </p>
                        <div class="flex items-center gap-1 md:gap-2 flex-wrap">
                            <span class="px-1.5 md:px-2 py-0.5 text-xs rounded-full bg-${priestStatusColor}-100 text-${priestStatusColor}-800 border border-${priestStatusColor}-200 font-semibold">
                                <i class="fas ${schedule.status === 'pending' ? 'fa-clock' : schedule.status === 'approved' ? 'fa-check' : 'fa-times'} mr-0.5"></i>
                                ${schedule.status.charAt(0).toUpperCase() + schedule.status.slice(1)}
                            </span>
                            <span class="px-1.5 md:px-2 py-0.5 text-xs rounded-full bg-${color}-200 text-${color}-800 font-semibold">
                                ${schedule.sacrament_type.charAt(0).toUpperCase() + schedule.sacrament_type.slice(1)}
                            </span>
                        </div>
                        <div class="space-y-0.5 md:space-y-1 mt-1 md:mt-2 text-xs">
                            <p class="text-${color}-600">
                                <i class="fas fa-phone mr-1"></i>
                                ${schedule.contact_number}
                            </p>
                            ${schedule.email ? `
                                <p class="text-${color}-600 truncate">
                                    <i class="fas fa-envelope mr-1"></i>
                                    ${schedule.email}
                                </p>
                            ` : ''}
                        </div>
                        <div class="mt-1.5 md:mt-2 pt-1.5 md:pt-2 border-t border-${color}-200">
                            <span class="text-xs text-${color}-700 font-bold inline-flex items-center gap-1">
                                <i class="fas fa-arrow-right"></i>
                                Details
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
