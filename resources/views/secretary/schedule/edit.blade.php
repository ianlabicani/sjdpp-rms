@extends('secretary.shell')

@section('title', 'Edit Schedule')

@section('secretary-content')
<div class="pt-16 min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-6">
            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                <a href="{{ route('secretary.schedule.index') }}" class="hover:text-indigo-600">Schedules</a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span>Edit Schedule</span>
            </div>
            <h1 class="text-3xl font-bold text-gray-900">Edit Schedule</h1>
            <p class="text-gray-600 mt-1">Update schedule information</p>
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

        <div class="space-y-6" x-data="{ selectedType: '{{ old('sacrament_type', $schedule->sacrament_type) }}' }">
            <form method="POST" action="{{ route('secretary.schedule.update', $schedule) }}" class="space-y-6">
                @csrf
                @method('PUT')

            <!-- Sacrament Selection -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-church text-indigo-600 mr-2"></i>
                    Schedule Type Selection
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <!-- Existing Sacraments -->
                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition"
                           :class="selectedType === 'Baptism' ? 'border-blue-500 bg-blue-50 ring-2 ring-blue-200' : 'border-gray-300 hover:border-blue-500'">
                        <input type="radio" name="sacrament_type" value="Baptism"
                               {{ old('sacrament_type', $schedule->sacrament_type) == 'Baptism' ? 'checked' : '' }}
                               class="sr-only peer" x-model="selectedType">
                        <i class="fas fa-water text-3xl text-blue-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Baptism</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition"
                           :class="selectedType === 'burial' ? 'border-purple-500 bg-purple-50 ring-2 ring-purple-200' : 'border-gray-300 hover:border-purple-500'">
                        <input type="radio" name="sacrament_type" value="burial"
                               {{ old('sacrament_type', $schedule->sacrament_type) == 'burial' ? 'checked' : '' }}
                               class="sr-only peer" x-model="selectedType">
                        <i class="fas fa-cross text-3xl text-purple-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Burial</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition"
                           :class="selectedType === 'confirmation' ? 'border-indigo-500 bg-indigo-50 ring-2 ring-indigo-200' : 'border-gray-300 hover:border-indigo-500'">
                        <input type="radio" name="sacrament_type" value="confirmation"
                               {{ old('sacrament_type', $schedule->sacrament_type) == 'confirmation' ? 'checked' : '' }}
                               class="sr-only peer" x-model="selectedType">
                        <i class="fas fa-hands-praying text-3xl text-indigo-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Confirmation</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition"
                           :class="selectedType === 'wedding' ? 'border-pink-500 bg-pink-50 ring-2 ring-pink-200' : 'border-gray-300 hover:border-pink-500'">
                        <input type="radio" name="sacrament_type" value="wedding"
                               {{ old('sacrament_type', $schedule->sacrament_type) == 'wedding' ? 'checked' : '' }}
                               class="sr-only peer" x-model="selectedType">
                        <i class="fas fa-heart text-3xl text-pink-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Wedding</span>
                    </label>

                    <!-- New Schedule Types -->
                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition"
                           :class="selectedType === 'blessing' ? 'border-teal-500 bg-teal-50 ring-2 ring-teal-200' : 'border-gray-300 hover:border-teal-500'">
                        <input type="radio" name="sacrament_type" value="blessing"
                               {{ old('sacrament_type', $schedule->sacrament_type) == 'blessing' ? 'checked' : '' }}
                               class="sr-only peer" x-model="selectedType">
                        <i class="fas fa-hand-holding-heart text-3xl text-teal-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Blessing</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition"
                           :class="selectedType === 'parish_mass' ? 'border-cyan-500 bg-cyan-50 ring-2 ring-cyan-200' : 'border-gray-300 hover:border-cyan-500'">
                        <input type="radio" name="sacrament_type" value="parish_mass"
                               {{ old('sacrament_type', $schedule->sacrament_type) == 'parish_mass' ? 'checked' : '' }}
                               class="sr-only peer" x-model="selectedType">
                        <i class="fas fa-church text-3xl text-cyan-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Parish Mass</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition"
                           :class="selectedType === 'barrio_mass' ? 'border-emerald-500 bg-emerald-50 ring-2 ring-emerald-200' : 'border-gray-300 hover:border-emerald-500'">
                        <input type="radio" name="sacrament_type" value="barrio_mass"
                               {{ old('sacrament_type', $schedule->sacrament_type) == 'barrio_mass' ? 'checked' : '' }}
                               class="sr-only peer" x-model="selectedType">
                        <i class="fas fa-people-roof text-3xl text-emerald-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Barrio Mass</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition"
                           :class="selectedType === 'school_mass' ? 'border-amber-500 bg-amber-50 ring-2 ring-amber-200' : 'border-gray-300 hover:border-amber-500'">
                        <input type="radio" name="sacrament_type" value="school_mass"
                               {{ old('sacrament_type', $schedule->sacrament_type) == 'school_mass' ? 'checked' : '' }}
                               class="sr-only peer" x-model="selectedType">
                        <i class="fas fa-school text-3xl text-amber-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">School Mass</span>
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
                               value="{{ old('client_name', $schedule->client_name) }}"
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
                               value="{{ old('contact_number', $schedule->contact_number) }}"
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
                               value="{{ old('email', $schedule->email) }}"
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
                               value="{{ old('schedule_date', $schedule->schedule_date->format('Y-m-d')) }}"
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
                               value="{{ old('schedule_time', $schedule->schedule_time) }}"
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
                            <option value="pending" {{ old('status', $schedule->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ old('status', $schedule->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="declined" {{ old('status', $schedule->status) == 'declined' ? 'selected' : '' }}>Declined</option>
                            <option value="completed" {{ old('status', $schedule->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ old('status', $schedule->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
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
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('notes', $schedule->notes) }}</textarea>
                </div>
            </div>

            <!-- Blessing Specific Fields -->
            <div class="bg-white rounded-lg shadow p-6" x-show="selectedType === 'blessing'" x-cloak>
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-hand-holding-heart text-teal-600 mr-2"></i>
                    Blessing Details
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="blessing_type" class="block text-sm font-medium text-gray-700 mb-1">
                            Blessing Type <span class="text-red-500">*</span>
                        </label>
                        <select name="blessing_type" id="blessing_type"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="">Select type...</option>
                            <option value="house" {{ old('blessing_type', $schedule->blessing_type) == 'house' ? 'selected' : '' }}>House/Residence</option>
                            <option value="store" {{ old('blessing_type', $schedule->blessing_type) == 'store' ? 'selected' : '' }}>Store/Business</option>
                            <option value="office" {{ old('blessing_type', $schedule->blessing_type) == 'office' ? 'selected' : '' }}>Office</option>
                            <option value="vehicle" {{ old('blessing_type', $schedule->blessing_type) == 'vehicle' ? 'selected' : '' }}>Vehicle</option>
                            <option value="image" {{ old('blessing_type', $schedule->blessing_type) == 'image' ? 'selected' : '' }}>Religious Image</option>
                            <option value="other" {{ old('blessing_type', $schedule->blessing_type) == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div>
                        <label for="owner_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Owner Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="owner_name" id="owner_name" value="{{ old('owner_name', $schedule->owner_name) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div class="md:col-span-2">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
                            Complete Address <span class="text-red-500">*</span>
                        </label>
                        <textarea name="address" id="address" rows="2"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('address', $schedule->address) }}</textarea>
                    </div>

                    <div>
                        <label for="barangay_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Barangay
                        </label>
                        <input type="text" name="barangay_name" id="barangay_name" value="{{ old('barangay_name', $schedule->barangay_name) }}"
                               placeholder="Enter barangay name"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="occupants_count" class="block text-sm font-medium text-gray-700 mb-1">
                            Number of Occupants
                        </label>
                        <input type="number" name="occupants_count" id="occupants_count" value="{{ old('occupants_count', $schedule->occupants_count) }}" min="0"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div class="md:col-span-2">
                        <label for="items_prepared" class="block text-sm font-medium text-gray-700 mb-1">
                            Items to be Prepared
                        </label>
                        <textarea name="items_prepared" id="items_prepared" rows="2"
                                  placeholder="e.g., Holy water container, candles, etc."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('items_prepared', $schedule->items_prepared) }}</textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label for="access_notes" class="block text-sm font-medium text-gray-700 mb-1">
                            Access/Directions Notes
                        </label>
                        <textarea name="access_notes" id="access_notes" rows="2"
                                  placeholder="How to get there, parking info, etc."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('access_notes', $schedule->access_notes) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Parish Mass Specific Fields -->
            <div class="bg-white rounded-lg shadow p-6" x-show="selectedType === 'parish_mass'" x-cloak>
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-church text-cyan-600 mr-2"></i>
                    Parish Mass Details
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="mass_category" class="block text-sm font-medium text-gray-700 mb-1">
                            Mass Category <span class="text-red-500">*</span>
                        </label>
                        <select name="mass_category" id="mass_category"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="">Select category...</option>
                            <option value="sunday" {{ old('mass_category', $schedule->mass_category) == 'sunday' ? 'selected' : '' }}>Sunday Mass</option>
                            <option value="weekday" {{ old('mass_category', $schedule->mass_category) == 'weekday' ? 'selected' : '' }}>Weekday Mass</option>
                            <option value="holy_day" {{ old('mass_category', $schedule->mass_category) == 'holy_day' ? 'selected' : '' }}>Holy Day</option>
                            <option value="special_occasion" {{ old('mass_category', $schedule->mass_category) == 'special_occasion' ? 'selected' : '' }}>Special Occasion</option>
                            <option value="memorial" {{ old('mass_category', $schedule->mass_category) == 'memorial' ? 'selected' : '' }}>Memorial Mass</option>
                            <option value="other" {{ old('mass_category', $schedule->mass_category) == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div>
                        <label for="chapel_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Chapel/Venue
                        </label>
                        <input type="text" name="chapel_name" id="chapel_name" value="{{ old('chapel_name', $schedule->chapel_name) }}"
                               placeholder="Enter chapel or venue name"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div class="md:col-span-2">
                        <label for="intention_summary" class="block text-sm font-medium text-gray-700 mb-1">
                            Mass Intention
                        </label>
                        <textarea name="intention_summary" id="intention_summary" rows="2"
                                  placeholder="e.g., For the soul of..., Thanksgiving, etc."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('intention_summary', $schedule->intention_summary) }}</textarea>
                    </div>

                    <div>
                        <label for="choir_team" class="block text-sm font-medium text-gray-700 mb-1">
                            Choir Team
                        </label>
                        <input type="text" name="choir_team" id="choir_team" value="{{ old('choir_team', $schedule->choir_team) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="recurrence" class="block text-sm font-medium text-gray-700 mb-1">
                            Recurrence
                        </label>
                        <select name="recurrence" id="recurrence"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="none" {{ old('recurrence', $schedule->recurrence) == 'none' ? 'selected' : '' }}>One-time</option>
                            <option value="weekly" {{ old('recurrence', $schedule->recurrence) == 'weekly' ? 'selected' : '' }}>Weekly</option>
                            <option value="monthly" {{ old('recurrence', $schedule->recurrence) == 'monthly' ? 'selected' : '' }}>Monthly</option>
                        </select>
                    </div>

                    <div class="md:col-span-2 flex items-center">
                        <input type="checkbox" name="ministers_needed" id="ministers_needed" value="1"
                               {{ old('ministers_needed', $schedule->ministers_needed) ? 'checked' : '' }}
                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="ministers_needed" class="ml-2 block text-sm text-gray-700">
                            Additional ministers needed
                        </label>
                    </div>
                </div>
            </div>

            <!-- Barrio Mass Specific Fields -->
            <div class="bg-white rounded-lg shadow p-6" x-show="selectedType === 'barrio_mass'" x-cloak>
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-people-roof text-emerald-600 mr-2"></i>
                    Barrio Mass Details
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="barrio_mass_category" class="block text-sm font-medium text-gray-700 mb-1">
                            Mass Category <span class="text-red-500">*</span>
                        </label>
                        <select name="mass_category" id="barrio_mass_category"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="">Select category...</option>
                            <option value="sunday" {{ old('mass_category', $schedule->mass_category) == 'sunday' ? 'selected' : '' }}>Sunday Mass</option>
                            <option value="weekday" {{ old('mass_category', $schedule->mass_category) == 'weekday' ? 'selected' : '' }}>Weekday Mass</option>
                            <option value="holy_day" {{ old('mass_category', $schedule->mass_category) == 'holy_day' ? 'selected' : '' }}>Holy Day</option>
                            <option value="special_occasion" {{ old('mass_category', $schedule->mass_category) == 'special_occasion' ? 'selected' : '' }}>Special Occasion</option>
                            <option value="memorial" {{ old('mass_category', $schedule->mass_category) == 'memorial' ? 'selected' : '' }}>Memorial Mass</option>
                            <option value="other" {{ old('mass_category', $schedule->mass_category) == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div>
                        <label for="barrio_barangay_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Barangay <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="barangay_name" id="barrio_barangay_name" value="{{ old('barangay_name', $schedule->barangay_name) }}"
                               placeholder="Enter barangay name"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="sitio_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Sitio/Purok Name
                        </label>
                        <input type="text" name="sitio_name" id="sitio_name" value="{{ old('sitio_name', $schedule->sitio_name) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="barrio_chapel_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Chapel/Venue
                        </label>
                        <input type="text" name="chapel_name" id="barrio_chapel_name" value="{{ old('chapel_name', $schedule->chapel_name) }}"
                               placeholder="Enter chapel or venue name"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="barrio_coordinator" class="block text-sm font-medium text-gray-700 mb-1">
                            Barrio Coordinator
                        </label>
                        <input type="text" name="barrio_coordinator" id="barrio_coordinator" value="{{ old('barrio_coordinator', $schedule->barrio_coordinator) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="barrio_coordinator_phone" class="block text-sm font-medium text-gray-700 mb-1">
                            Coordinator Phone
                        </label>
                        <input type="text" name="barrio_coordinator_phone" id="barrio_coordinator_phone" value="{{ old('barrio_coordinator_phone', $schedule->barrio_coordinator_phone) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div class="md:col-span-2">
                        <label for="barrio_intention" class="block text-sm font-medium text-gray-700 mb-1">
                            Mass Intention
                        </label>
                        <textarea name="intention_summary" id="barrio_intention" rows="2"
                                  placeholder="e.g., For the soul of..., Thanksgiving, etc."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('intention_summary', $schedule->intention_summary) }}</textarea>
                    </div>

                    <div class="md:col-span-2 space-y-2">
                        <div class="flex items-center">
                            <input type="checkbox" name="generator_needed" id="generator_needed" value="1"
                                   {{ old('generator_needed', $schedule->generator_needed) ? 'checked' : '' }}
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="generator_needed" class="ml-2 block text-sm text-gray-700">
                                Generator needed
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="transport_needed" id="transport_needed" value="1"
                                   {{ old('transport_needed', $schedule->transport_needed) ? 'checked' : '' }}
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="transport_needed" class="ml-2 block text-sm text-gray-700">
                                Transportation needed
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="ministers_needed" id="barrio_ministers_needed" value="1"
                                   {{ old('ministers_needed', $schedule->ministers_needed) ? 'checked' : '' }}
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="barrio_ministers_needed" class="ml-2 block text-sm text-gray-700">
                                Additional ministers needed
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- School Mass Specific Fields -->
            <div class="bg-white rounded-lg shadow p-6" x-show="selectedType === 'school_mass'" x-cloak>
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-school text-amber-600 mr-2"></i>
                    School Mass Details
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="school_name" class="block text-sm font-medium text-gray-700 mb-1">
                            School <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="school_name" id="school_name" value="{{ old('school_name', $schedule->school_name) }}"
                               placeholder="Enter school name"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="campus_or_venue" class="block text-sm font-medium text-gray-700 mb-1">
                            Campus/Venue
                        </label>
                        <input type="text" name="campus_or_venue" id="campus_or_venue" value="{{ old('campus_or_venue', $schedule->campus_or_venue) }}"
                               placeholder="e.g., Main campus, Gymnasium, etc."
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="grade_levels" class="block text-sm font-medium text-gray-700 mb-1">
                            Grade Levels
                        </label>
                        <input type="text" name="grade_levels" id="grade_levels" value="{{ old('grade_levels', $schedule->grade_levels) }}"
                               placeholder="e.g., Grade 7-12, All levels, etc."
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="assembly_time" class="block text-sm font-medium text-gray-700 mb-1">
                            Assembly Time
                        </label>
                        <input type="time" name="assembly_time" id="assembly_time" value="{{ old('assembly_time', $schedule->assembly_time) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="expected_students" class="block text-sm font-medium text-gray-700 mb-1">
                            Expected Students
                        </label>
                        <input type="number" name="expected_students" id="expected_students" value="{{ old('expected_students', $schedule->expected_students) }}" min="0"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="expected_faculty" class="block text-sm font-medium text-gray-700 mb-1">
                            Expected Faculty/Staff
                        </label>
                        <input type="number" name="expected_faculty" id="expected_faculty" value="{{ old('expected_faculty', $schedule->expected_faculty) }}" min="0"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div class="md:col-span-2">
                        <label for="school_intention" class="block text-sm font-medium text-gray-700 mb-1">
                            Mass Intention
                        </label>
                        <textarea name="intention_summary" id="school_intention" rows="2"
                                  placeholder="e.g., Opening of classes, Foundation day, etc."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('intention_summary', $schedule->intention_summary) }}</textarea>
                    </div>

                    <div class="md:col-span-2 flex items-center">
                        <input type="checkbox" name="ministers_needed" id="school_ministers_needed" value="1"
                               {{ old('ministers_needed', $schedule->ministers_needed) ? 'checked' : '' }}
                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="school_ministers_needed" class="ml-2 block text-sm text-gray-700">
                            Additional ministers needed
                        </label>
                    </div>
                </div>
            </div>

            <!-- Common Fields for Mass/Blessing Types -->
            <div class="bg-white rounded-lg shadow p-6" x-show="['blessing', 'parish_mass', 'barrio_mass', 'school_mass'].includes(selectedType)" x-cloak>
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-circle-info text-indigo-600 mr-2"></i>
                    Additional Information
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="presider_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Presiding Priest
                        </label>
                        <input type="text" name="presider_name" id="presider_name" value="{{ old('presider_name', $schedule->presider_name) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="expected_attendees" class="block text-sm font-medium text-gray-700 mb-1">
                            Expected Attendees
                        </label>
                        <input type="number" name="expected_attendees" id="expected_attendees" value="{{ old('expected_attendees', $schedule->expected_attendees) }}" min="0"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="stipend_amount" class="block text-sm font-medium text-gray-700 mb-1">
                            Stipend Amount (₱)
                        </label>
                        <input type="number" name="stipend_amount" id="stipend_amount" value="{{ old('stipend_amount', $schedule->stipend_amount) }}" min="0" step="0.01"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div class="md:col-span-2">
                        <label for="location_text" class="block text-sm font-medium text-gray-700 mb-1">
                            Location/Venue Details
                        </label>
                        <textarea name="location_text" id="location_text" rows="2"
                                  placeholder="Specific location details, landmarks, etc."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('location_text', $schedule->location_text) }}</textarea>
                    </div>

                    <div class="md:col-span-2 flex items-center">
                        <input type="checkbox" name="sound_system_needed" id="sound_system_needed" value="1"
                               {{ old('sound_system_needed', $schedule->sound_system_needed) ? 'checked' : '' }}
                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="sound_system_needed" class="ml-2 block text-sm text-gray-700">
                            Sound system needed
                        </label>
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex gap-4">
                <button type="submit"
                        class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition duration-150">
                    <i class="fas fa-save mr-2"></i>
                    Update Schedule
                </button>
                <a href="{{ route('secretary.schedule.index') }}"
                   class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow transition duration-150">
                    <i class="fas fa-times mr-2"></i>
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    /* Alpine.js cloak */
    [x-cloak] { display: none !important; }
</style>

@endsection
