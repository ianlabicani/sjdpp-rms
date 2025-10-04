@extends('secretary.shell')

@section('secretary-content')
<div class="pt-16 min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-6">
            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                <a href="{{ route('secretary.schedule.index') }}" class="hover:text-indigo-600">Schedules</a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span>New Schedule</span>
            </div>
            <h1 class="text-3xl font-bold text-gray-900">Create New Schedule</h1>
            <p class="text-gray-600 mt-1">Schedule a new sacrament appointment</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Side: Form -->
            <div class="lg:col-span-2 space-y-6">
                <form method="POST" action="{{ route('secretary.schedule.store') }}" class="space-y-6" id="scheduleForm">
                    @csrf

            <!-- Sacrament Selection -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-church text-indigo-600 mr-2"></i>
                    Sacrament Selection
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition {{ old('sacrament_type') == 'baptismal' ? 'border-blue-500 bg-blue-50 ring-2 ring-blue-200' : 'border-gray-300 hover:border-blue-500' }}">
                        <input type="radio"
                               name="sacrament_type"
                               value="baptismal"
                               {{ old('sacrament_type') == 'baptismal' ? 'checked' : '' }}
                               class="sr-only peer"
                               onchange="this.closest('div.grid').querySelectorAll('label').forEach(l => l.classList.remove('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-200', 'border-purple-500', 'bg-purple-50', 'ring-purple-200', 'border-indigo-500', 'bg-indigo-50', 'ring-indigo-200', 'border-pink-500', 'bg-pink-50', 'ring-pink-200')); this.parentElement.classList.add('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-200');">
                        <i class="fas fa-water text-3xl text-blue-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Baptismal</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition {{ old('sacrament_type') == 'burial' ? 'border-purple-500 bg-purple-50 ring-2 ring-purple-200' : 'border-gray-300 hover:border-purple-500' }}">
                        <input type="radio"
                               name="sacrament_type"
                               value="burial"
                               {{ old('sacrament_type') == 'burial' ? 'checked' : '' }}
                               class="sr-only peer"
                               onchange="this.closest('div.grid').querySelectorAll('label').forEach(l => l.classList.remove('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-200', 'border-purple-500', 'bg-purple-50', 'ring-purple-200', 'border-indigo-500', 'bg-indigo-50', 'ring-indigo-200', 'border-pink-500', 'bg-pink-50', 'ring-pink-200')); this.parentElement.classList.add('border-purple-500', 'bg-purple-50', 'ring-2', 'ring-purple-200');">
                        <i class="fas fa-cross text-3xl text-purple-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Burial</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition {{ old('sacrament_type') == 'confirmation' ? 'border-indigo-500 bg-indigo-50 ring-2 ring-indigo-200' : 'border-gray-300 hover:border-indigo-500' }}">
                        <input type="radio"
                               name="sacrament_type"
                               value="confirmation"
                               {{ old('sacrament_type') == 'confirmation' ? 'checked' : '' }}
                               class="sr-only peer"
                               onchange="this.closest('div.grid').querySelectorAll('label').forEach(l => l.classList.remove('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-200', 'border-purple-500', 'bg-purple-50', 'ring-purple-200', 'border-indigo-500', 'bg-indigo-50', 'ring-indigo-200', 'border-pink-500', 'bg-pink-50', 'ring-pink-200')); this.parentElement.classList.add('border-indigo-500', 'bg-indigo-50', 'ring-2', 'ring-indigo-200');">
                        <i class="fas fa-hands-praying text-3xl text-indigo-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Confirmation</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition {{ old('sacrament_type') == 'wedding' ? 'border-pink-500 bg-pink-50 ring-2 ring-pink-200' : 'border-gray-300 hover:border-pink-500' }}">
                        <input type="radio"
                               name="sacrament_type"
                               value="wedding"
                               {{ old('sacrament_type') == 'wedding' ? 'checked' : '' }}
                               class="sr-only peer"
                               onchange="this.closest('div.grid').querySelectorAll('label').forEach(l => l.classList.remove('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-200', 'border-purple-500', 'bg-purple-50', 'ring-purple-200', 'border-indigo-500', 'bg-indigo-50', 'ring-indigo-200', 'border-pink-500', 'bg-pink-50', 'ring-pink-200')); this.parentElement.classList.add('border-pink-500', 'bg-pink-50', 'ring-2', 'ring-pink-200');">
                        <i class="fas fa-heart text-3xl text-pink-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Wedding</span>
                    </label>
                </div>
            </div>

            <!-- Client Information -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-user text-indigo-600 mr-2"></i>
                    Client Information
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="client_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Client Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="client_name"
                               id="client_name"
                               value="{{ old('client_name') }}"
                               required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="contact_number" class="block text-sm font-medium text-gray-700 mb-1">
                            Contact Number <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="contact_number"
                               id="contact_number"
                               value="{{ old('contact_number') }}"
                               required
                               placeholder="09XX-XXX-XXXX"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div class="md:col-span-2">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Email Address
                        </label>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                               placeholder="optional"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                </div>
            </div>

            <!-- Schedule Details -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-calendar-alt text-indigo-600 mr-2"></i>
                    Schedule Details
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="schedule_date" class="block text-sm font-medium text-gray-700 mb-1">
                            Schedule Date <span class="text-red-500">*</span>
                        </label>
                        <input type="date"
                               name="schedule_date"
                               id="schedule_date"
                               value="{{ old('schedule_date') }}"
                               min="{{ date('Y-m-d') }}"
                               required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="schedule_time" class="block text-sm font-medium text-gray-700 mb-1">
                            Schedule Time <span class="text-red-500">*</span>
                        </label>
                        <input type="time"
                               name="schedule_time"
                               id="schedule_time"
                               value="{{ old('schedule_time') }}"
                               required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select name="status"
                                id="status"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Additional Notes -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-sticky-note text-indigo-600 mr-2"></i>
                    Additional Notes
                </h2>

                <div>
                    <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">
                        Notes
                    </label>
                    <textarea name="notes"
                              id="notes"
                              rows="4"
                              placeholder="Any additional information or special requests..."
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('notes') }}</textarea>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex gap-4">
                <button type="submit"
                        class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition duration-150">
                    <i class="fas fa-save mr-2"></i>
                    Create Schedule
                </button>
                <a href="{{ route('secretary.schedule.index') }}"
                   class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow transition duration-150">
                    <i class="fas fa-times mr-2"></i>
                    Cancel
                </a>
            </div>
        </form>
            </div>

            <!-- Right Side: Calendar Preview -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow p-6 sticky top-20">
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold text-gray-900 mb-2 flex items-center">
                            <i class="fas fa-calendar text-indigo-600 mr-2"></i>
                            Existing Schedules
                        </h2>
                        <p class="text-sm text-gray-600">View schedules for this month</p>
                    </div>

                    <!-- Calendar Navigation -->
                    <div class="flex justify-between items-center mb-4 pb-3 border-b">
                        <a href="{{ route('secretary.schedule.create', ['year' => $date->copy()->subMonth()->year, 'month' => $date->copy()->subMonth()->month]) }}"
                           class="p-2 hover:bg-gray-100 rounded transition">
                            <i class="fas fa-chevron-left text-gray-600"></i>
                        </a>
                        <h3 class="font-semibold text-gray-900">{{ $date->format('F Y') }}</h3>
                        <a href="{{ route('secretary.schedule.create', ['year' => $date->copy()->addMonth()->year, 'month' => $date->copy()->addMonth()->month]) }}"
                           class="p-2 hover:bg-gray-100 rounded transition">
                            <i class="fas fa-chevron-right text-gray-600"></i>
                        </a>
                    </div>

                    <!-- Mini Calendar -->
                    <div class="mb-4">
                        <div class="grid grid-cols-7 gap-1 mb-2">
                            <div class="text-center text-xs font-semibold text-gray-600">S</div>
                            <div class="text-center text-xs font-semibold text-gray-600">M</div>
                            <div class="text-center text-xs font-semibold text-gray-600">T</div>
                            <div class="text-center text-xs font-semibold text-gray-600">W</div>
                            <div class="text-center text-xs font-semibold text-gray-600">T</div>
                            <div class="text-center text-xs font-semibold text-gray-600">F</div>
                            <div class="text-center text-xs font-semibold text-gray-600">S</div>
                        </div>

                        <div class="grid grid-cols-7 gap-1">
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

                                <button type="button"
                                        data-date="{{ $dateKey }}"
                                        onclick="showSchedulesForDate('{{ $dateKey }}', '{{ $currentDate->format('F d, Y') }}')"
                                        class="calendar-day aspect-square text-xs rounded {{ $isCurrentMonth ? 'text-gray-900' : 'text-gray-400' }} {{ $isToday ? 'bg-indigo-600 text-white font-bold' : '' }} {{ $daySchedules->count() > 0 && !$isToday ? 'bg-blue-100 font-semibold' : 'hover:bg-gray-100' }} transition relative">
                                    {{ $currentDate->day }}
                                    @if($daySchedules->count() > 0)
                                        <span class="absolute bottom-0 right-0 w-1.5 h-1.5 bg-indigo-600 rounded-full {{ $isToday ? 'bg-white' : '' }}"></span>
                                    @endif
                                </button>

                                @php
                                    $currentDate->addDay();
                                @endphp
                            @endwhile
                        </div>
                    </div>

                    <!-- Selected Date Schedules -->
                    <div id="dateSchedules" class="mt-4 pt-4 border-t">
                        <p class="text-sm text-gray-500 text-center italic">Click a date to view schedules</p>
                    </div>

                    <!-- Legend -->
                    <div class="mt-6 pt-4 border-t">
                        <p class="text-xs font-semibold text-gray-700 mb-2">Legend</p>
                        <div class="grid grid-cols-2 gap-2 text-xs">
                            <div class="flex items-center gap-1">
                                <span class="w-3 h-3 bg-blue-500 rounded"></span>
                                <span class="text-gray-600">Baptismal</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="w-3 h-3 bg-purple-500 rounded"></span>
                                <span class="text-gray-600">Burial</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="w-3 h-3 bg-indigo-500 rounded"></span>
                                <span class="text-gray-600">Confirmation</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="w-3 h-3 bg-pink-500 rounded"></span>
                                <span class="text-gray-600">Wedding</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for date selection -->
<script>
    const schedulesData = @json($schedules);
    const todayDate = '{{ now()->format('Y-m-d') }}';
    const todayLabel = '{{ now()->format('F d, Y') }}';

    function showSchedulesForDate(dateKey, dateLabel) {
        const container = document.getElementById('dateSchedules');
        const schedules = schedulesData[dateKey] || [];

        // Highlight selected date on calendar
        document.querySelectorAll('.calendar-day').forEach(btn => {
            btn.classList.remove('ring-2', 'ring-offset-2', 'ring-indigo-400');
        });
        const selectedBtn = document.querySelector(`[data-date="${dateKey}"]`);
        if (selectedBtn && !selectedBtn.classList.contains('bg-indigo-600')) {
            selectedBtn.classList.add('ring-2', 'ring-offset-2', 'ring-indigo-400');
        }

        if (schedules.length === 0) {
            container.innerHTML = `
                <div class="text-center py-4">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-green-100 rounded-full mb-3">
                        <i class="fas fa-check-circle text-green-600 text-xl"></i>
                    </div>
                    <p class="text-sm font-semibold text-gray-900 mb-1">${dateLabel}</p>
                    <p class="text-xs text-gray-500">No schedules for this date</p>
                    <div class="mt-3 px-3 py-2 bg-green-50 border border-green-200 rounded-lg">
                        <p class="text-xs text-green-700 font-semibold">
                            <i class="fas fa-calendar-check mr-1"></i>Available for booking
                        </p>
                    </div>
                </div>
            `;
            // Auto-fill the date input
            document.getElementById('schedule_date').value = dateKey;
            return;
        }

        // Sort schedules by time
        schedules.sort((a, b) => a.schedule_time.localeCompare(b.schedule_time));

        let html = `
            <div>
                <div class="flex items-center justify-between mb-3 pb-3 border-b">
                    <div>
                        <p class="text-sm font-bold text-gray-900">${dateLabel}</p>
                        <p class="text-xs text-gray-500">${schedules.length} schedule${schedules.length > 1 ? 's' : ''} booked</p>
                    </div>
                    <div class="px-2.5 py-1 bg-indigo-100 text-indigo-800 text-xs font-bold rounded-full">
                        ${schedules.length}
                    </div>
                </div>
                <div class="space-y-2.5 max-h-96 overflow-y-auto pr-2 scrollbar-thin">
        `;

        schedules.forEach((schedule, index) => {
            const time = new Date('2000-01-01 ' + schedule.schedule_time).toLocaleTimeString('en-US', {
                hour: 'numeric',
                minute: '2-digit',
                hour12: true
            });

            const colors = {
                baptismal: 'blue',
                burial: 'purple',
                confirmation: 'indigo',
                wedding: 'pink'
            };

            const statusColors = {
                pending: 'yellow',
                confirmed: 'blue',
                completed: 'green',
                cancelled: 'red'
            };

            const icons = {
                baptismal: 'fa-water',
                burial: 'fa-cross',
                confirmation: 'fa-hands-praying',
                wedding: 'fa-heart'
            };

            const color = colors[schedule.sacrament_type] || 'gray';
            const statusColor = statusColors[schedule.status] || 'gray';
            const icon = icons[schedule.sacrament_type] || 'fa-calendar';

            html += `
                <div class="p-3 rounded-lg bg-${color}-50 border border-${color}-200 hover:shadow-md transition-shadow cursor-pointer">
                    <div class="flex items-start justify-between mb-2">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-${color}-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas ${icon} text-white text-xs"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-${color}-900">${time}</p>
                                <p class="text-xs text-${color}-600 capitalize">${schedule.sacrament_type}</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 text-xs font-semibold rounded bg-${statusColor}-200 text-${statusColor}-800">
                            ${schedule.status}
                        </span>
                    </div>
                    <div class="pl-10">
                        <p class="text-sm font-semibold text-${color}-900 mb-1">${schedule.client_name}</p>
                        ${schedule.contact_number ? `
                            <div class="flex items-center gap-1 text-xs text-${color}-700">
                                <i class="fas fa-phone text-xs"></i>
                                <span>${schedule.contact_number}</span>
                            </div>
                        ` : ''}
                        ${schedule.email ? `
                            <div class="flex items-center gap-1 text-xs text-${color}-700 mt-1">
                                <i class="fas fa-envelope text-xs"></i>
                                <span class="truncate">${schedule.email}</span>
                            </div>
                        ` : ''}
                        ${schedule.notes ? `
                            <p class="text-xs text-${color}-600 mt-2 italic line-clamp-2">
                                <i class="fas fa-sticky-note text-xs mr-1"></i>${schedule.notes}
                            </p>
                        ` : ''}
                    </div>
                </div>
            `;
        });

        html += `
                </div>
                <div class="mt-3 pt-3 border-t">
                    <p class="text-xs text-gray-500 text-center">
                        <i class="fas fa-info-circle mr-1"></i>
                        You can still book on this date
                    </p>
                </div>
            </div>
        `;

        container.innerHTML = html;

        // Auto-fill the date input
        document.getElementById('schedule_date').value = dateKey;
    }

    // Auto-fill date when date input changes
    document.getElementById('schedule_date').addEventListener('change', function() {
        const selectedDate = this.value;
        if (selectedDate) {
            const dateObj = new Date(selectedDate + 'T00:00:00');
            const dateLabel = dateObj.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            showSchedulesForDate(selectedDate, dateLabel);
        }
    });

    // Automatically show today's schedules on page load
    window.addEventListener('DOMContentLoaded', function() {
        showSchedulesForDate(todayDate, todayLabel);
    });
</script>

<style>
    /* Custom scrollbar for schedule list */
    .scrollbar-thin::-webkit-scrollbar {
        width: 6px;
    }
    .scrollbar-thin::-webkit-scrollbar-track {
        background: #f3f4f6;
        border-radius: 3px;
    }
    .scrollbar-thin::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 3px;
    }
    .scrollbar-thin:hover::-webkit-scrollbar-thumb {
        background: #9ca3af;
    }
    /* Firefox scrollbar */
    .scrollbar-thin {
        scrollbar-width: thin;
        scrollbar-color: #d1d5db #f3f4f6;
    }
</style>

@endsection
