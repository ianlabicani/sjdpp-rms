@extends('secretary.shell')

@section('title', 'Create Schedule')

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
            <div class="lg:col-span-2 space-y-6" x-data="{
                selectedType: '{{ old('sacrament_type', '') }}',
                init() {
                    this.$watch('selectedType', (newType, oldType) => {
                        // Clear mass_category when switching between mass types or to other types
                        if (oldType !== newType) {
                            const massCategories = ['mass_category', 'barrio_mass_category', 'school_mass_category'];
                            massCategories.forEach(id => {
                                const field = document.getElementById(id);
                                if (field) field.value = '';
                            });
                        }
                    });
                }
            }">
                <form method="POST" action="{{ route('secretary.schedule.store') }}" class="space-y-6" id="scheduleForm">
                    @csrf

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
                               {{ old('sacrament_type') == 'Baptism' ? 'checked' : '' }}
                               class="sr-only peer" x-model="selectedType">
                        <i class="fas fa-water text-3xl text-blue-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Baptism</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition"
                           :class="selectedType === 'burial' ? 'border-purple-500 bg-purple-50 ring-2 ring-purple-200' : 'border-gray-300 hover:border-purple-500'">
                        <input type="radio" name="sacrament_type" value="burial"
                               {{ old('sacrament_type') == 'burial' ? 'checked' : '' }}
                               class="sr-only peer" x-model="selectedType">
                        <i class="fas fa-cross text-3xl text-purple-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Burial</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition"
                           :class="selectedType === 'confirmation' ? 'border-indigo-500 bg-indigo-50 ring-2 ring-indigo-200' : 'border-gray-300 hover:border-indigo-500'">
                        <input type="radio" name="sacrament_type" value="confirmation"
                               {{ old('sacrament_type') == 'confirmation' ? 'checked' : '' }}
                               class="sr-only peer" x-model="selectedType">
                        <i class="fas fa-hands-praying text-3xl text-indigo-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Confirmation</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition"
                           :class="selectedType === 'wedding' ? 'border-pink-500 bg-pink-50 ring-2 ring-pink-200' : 'border-gray-300 hover:border-pink-500'">
                        <input type="radio" name="sacrament_type" value="wedding"
                               {{ old('sacrament_type') == 'wedding' ? 'checked' : '' }}
                               class="sr-only peer" x-model="selectedType">
                        <i class="fas fa-heart text-3xl text-pink-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Wedding</span>
                    </label>

                    <!-- New Schedule Types -->
                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition"
                           :class="selectedType === 'blessing' ? 'border-teal-500 bg-teal-50 ring-2 ring-teal-200' : 'border-gray-300 hover:border-teal-500'">
                        <input type="radio" name="sacrament_type" value="blessing"
                               {{ old('sacrament_type') == 'blessing' ? 'checked' : '' }}
                               class="sr-only peer" x-model="selectedType">
                        <i class="fas fa-hand-holding-heart text-3xl text-teal-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Blessing</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition"
                           :class="selectedType === 'parish_mass' ? 'border-cyan-500 bg-cyan-50 ring-2 ring-cyan-200' : 'border-gray-300 hover:border-cyan-500'">
                        <input type="radio" name="sacrament_type" value="parish_mass"
                               {{ old('sacrament_type') == 'parish_mass' ? 'checked' : '' }}
                               class="sr-only peer" x-model="selectedType">
                        <i class="fas fa-church text-3xl text-cyan-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Parish Mass</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition"
                           :class="selectedType === 'barrio_mass' ? 'border-emerald-500 bg-emerald-50 ring-2 ring-emerald-200' : 'border-gray-300 hover:border-emerald-500'">
                        <input type="radio" name="sacrament_type" value="barrio_mass"
                               {{ old('sacrament_type') == 'barrio_mass' ? 'checked' : '' }}
                               class="sr-only peer" x-model="selectedType">
                        <i class="fas fa-people-roof text-3xl text-emerald-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Barrio Mass</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer transition"
                           :class="selectedType === 'school_mass' ? 'border-amber-500 bg-amber-50 ring-2 ring-amber-200' : 'border-gray-300 hover:border-amber-500'">
                        <input type="radio" name="sacrament_type" value="school_mass"
                               {{ old('sacrament_type') == 'school_mass' ? 'checked' : '' }}
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
                               value="{{ old('client_name') }}"
                               required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="contact_number" class="block text-sm font-medium text-gray-700 mb-1">
                            Contact Number <span class="text-red-500">*</span>
                        </label>
                        <input type="tel"
                               name="contact_number"
                               id="contact_number"
                               value="{{ old('contact_number') }}"
                               required
                               placeholder="09XX-XXX-XXXX"
                               minlength="11"
                               maxlength="12"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                               title="Please enter a valid Philippine phone number (e.g., 09XX-XXX-XXXX or 09XXXXXXXXX)">
                    </div>

                    <div class="md:col-span-2">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Email Address (optional)
                        </label>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                               placeholder="juan@example.com"
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
                            <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
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
                            <option value="house" {{ old('blessing_type') == 'house' ? 'selected' : '' }}>House/Residence</option>
                            <option value="store" {{ old('blessing_type') == 'store' ? 'selected' : '' }}>Store/Business</option>
                            <option value="office" {{ old('blessing_type') == 'office' ? 'selected' : '' }}>Office</option>
                            <option value="vehicle" {{ old('blessing_type') == 'vehicle' ? 'selected' : '' }}>Vehicle</option>
                            <option value="image" {{ old('blessing_type') == 'image' ? 'selected' : '' }}>Religious Image</option>
                            <option value="other" {{ old('blessing_type') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div>
                        <label for="owner_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Owner Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="owner_name" id="owner_name" value="{{ old('owner_name') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div class="md:col-span-2">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
                            Complete Address <span class="text-red-500">*</span>
                        </label>
                        <textarea name="address" id="address" rows="2"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('address') }}</textarea>
                    </div>

                    <div>
                        <label for="barangay_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Barangay
                        </label>
                        <input type="text" name="barangay_name" id="barangay_name" value="{{ old('barangay_name') }}"
                               placeholder="Enter barangay name"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="occupants_count" class="block text-sm font-medium text-gray-700 mb-1">
                            Number of Occupants
                        </label>
                        <input type="number" name="occupants_count" id="occupants_count" value="{{ old('occupants_count') }}" min="0"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div class="md:col-span-2">
                        <label for="items_prepared" class="block text-sm font-medium text-gray-700 mb-1">
                            Items to be Prepared
                        </label>
                        <textarea name="items_prepared" id="items_prepared" rows="2"
                                  placeholder="e.g., Holy water container, candles, etc."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('items_prepared') }}</textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label for="access_notes" class="block text-sm font-medium text-gray-700 mb-1">
                            Access/Directions Notes
                        </label>
                        <textarea name="access_notes" id="access_notes" rows="2"
                                  placeholder="How to get there, parking info, etc."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('access_notes') }}</textarea>
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
                        <select :name="selectedType === 'parish_mass' ? 'mass_category' : ''" id="mass_category" :required="selectedType === 'parish_mass'"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="">Select category...</option>
                            <option value="sunday" {{ old('mass_category') == 'sunday' ? 'selected' : '' }}>Sunday Mass</option>
                            <option value="weekday" {{ old('mass_category') == 'weekday' ? 'selected' : '' }}>Weekday Mass</option>
                            <option value="holy_day" {{ old('mass_category') == 'holy_day' ? 'selected' : '' }}>Holy Day</option>
                            <option value="special_occasion" {{ old('mass_category') == 'special_occasion' ? 'selected' : '' }}>Special Occasion</option>
                            <option value="memorial" {{ old('mass_category') == 'memorial' ? 'selected' : '' }}>Memorial Mass</option>
                            <option value="other" {{ old('mass_category') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div>
                        <label for="chapel_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Chapel/Venue
                        </label>
                        <input type="text" name="chapel_name" id="chapel_name" value="{{ old('chapel_name') }}"
                               placeholder="Enter chapel or venue name"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div class="md:col-span-2">
                        <label for="intention_summary" class="block text-sm font-medium text-gray-700 mb-1">
                            Mass Intention
                        </label>
                        <textarea name="intention_summary" id="intention_summary" rows="2"
                                  placeholder="e.g., For the soul of..., Thanksgiving, etc."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('intention_summary') }}</textarea>
                    </div>

                    <div>
                        <label for="choir_team" class="block text-sm font-medium text-gray-700 mb-1">
                            Choir Team
                        </label>
                        <input type="text" name="choir_team" id="choir_team" value="{{ old('choir_team') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="recurrence" class="block text-sm font-medium text-gray-700 mb-1">
                            Recurrence
                        </label>
                        <select name="recurrence" id="recurrence"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="none" {{ old('recurrence') == 'none' ? 'selected' : '' }}>One-time</option>
                            <option value="weekly" {{ old('recurrence') == 'weekly' ? 'selected' : '' }}>Weekly</option>
                            <option value="monthly" {{ old('recurrence') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                        </select>
                    </div>

                    <div class="md:col-span-2 flex items-center">
                        <input type="checkbox" name="ministers_needed" id="ministers_needed" value="1"
                               {{ old('ministers_needed') ? 'checked' : '' }}
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
                        <select :name="selectedType === 'barrio_mass' ? 'mass_category' : ''" id="barrio_mass_category" :required="selectedType === 'barrio_mass'"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="">Select category...</option>
                            <option value="sunday" {{ old('mass_category') == 'sunday' ? 'selected' : '' }}>Sunday Mass</option>
                            <option value="weekday" {{ old('mass_category') == 'weekday' ? 'selected' : '' }}>Weekday Mass</option>
                            <option value="holy_day" {{ old('mass_category') == 'holy_day' ? 'selected' : '' }}>Holy Day</option>
                            <option value="special_occasion" {{ old('mass_category') == 'special_occasion' ? 'selected' : '' }}>Special Occasion</option>
                            <option value="memorial" {{ old('mass_category') == 'memorial' ? 'selected' : '' }}>Memorial Mass</option>
                            <option value="other" {{ old('mass_category') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div>
                        <label for="barrio_barangay_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Barangay <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="barangay_name" id="barrio_barangay_name" value="{{ old('barangay_name') }}"
                               placeholder="Enter barangay name"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="sitio_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Sitio/Purok Name
                        </label>
                        <input type="text" name="sitio_name" id="sitio_name" value="{{ old('sitio_name') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="barrio_chapel_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Chapel/Venue
                        </label>
                        <input type="text" name="chapel_name" id="barrio_chapel_name" value="{{ old('chapel_name') }}"
                               placeholder="Enter chapel or venue name"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="barrio_coordinator" class="block text-sm font-medium text-gray-700 mb-1">
                            Barrio Coordinator
                        </label>
                        <input type="text" name="barrio_coordinator" id="barrio_coordinator" value="{{ old('barrio_coordinator') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="barrio_coordinator_phone" class="block text-sm font-medium text-gray-700 mb-1">
                            Coordinator Phone
                        </label>
                        <input type="text" name="barrio_coordinator_phone" id="barrio_coordinator_phone" value="{{ old('barrio_coordinator_phone') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div class="md:col-span-2">
                        <label for="barrio_intention" class="block text-sm font-medium text-gray-700 mb-1">
                            Mass Intention
                        </label>
                        <textarea name="intention_summary" id="barrio_intention" rows="2"
                                  placeholder="e.g., For the soul of..., Thanksgiving, etc."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('intention_summary') }}</textarea>
                    </div>

                    <div class="md:col-span-2 space-y-2">
                        <div class="flex items-center">
                            <input type="checkbox" name="generator_needed" id="generator_needed" value="1"
                                   {{ old('generator_needed') ? 'checked' : '' }}
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="generator_needed" class="ml-2 block text-sm text-gray-700">
                                Generator needed
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="transport_needed" id="transport_needed" value="1"
                                   {{ old('transport_needed') ? 'checked' : '' }}
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="transport_needed" class="ml-2 block text-sm text-gray-700">
                                Transportation needed
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="ministers_needed" id="barrio_ministers_needed" value="1"
                                   {{ old('ministers_needed') ? 'checked' : '' }}
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
                        <label for="school_mass_category" class="block text-sm font-medium text-gray-700 mb-1">
                            Mass Category <span class="text-red-500">*</span>
                        </label>
                        <select :name="selectedType === 'school_mass' ? 'mass_category' : ''" id="school_mass_category" :required="selectedType === 'school_mass'"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="">Select category...</option>
                            <option value="sunday" {{ old('mass_category') == 'sunday' ? 'selected' : '' }}>Sunday Mass</option>
                            <option value="weekday" {{ old('mass_category') == 'weekday' ? 'selected' : '' }}>Weekday Mass</option>
                            <option value="holy_day" {{ old('mass_category') == 'holy_day' ? 'selected' : '' }}>Holy Day</option>
                            <option value="special_occasion" {{ old('mass_category') == 'special_occasion' ? 'selected' : '' }}>Special Occasion</option>
                            <option value="memorial" {{ old('mass_category') == 'memorial' ? 'selected' : '' }}>Memorial Mass</option>
                            <option value="other" {{ old('mass_category') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div>
                        <label for="school_name" class="block text-sm font-medium text-gray-700 mb-1">
                            School <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="school_name" id="school_name" value="{{ old('school_name') }}"
                               placeholder="Enter school name"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="campus_or_venue" class="block text-sm font-medium text-gray-700 mb-1">
                            Campus/Venue
                        </label>
                        <input type="text" name="campus_or_venue" id="campus_or_venue" value="{{ old('campus_or_venue') }}"
                               placeholder="e.g., Main campus, Gymnasium, etc."
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="grade_levels" class="block text-sm font-medium text-gray-700 mb-1">
                            Grade Levels
                        </label>
                        <input type="text" name="grade_levels" id="grade_levels" value="{{ old('grade_levels') }}"
                               placeholder="e.g., Grade 7-12, All levels, etc."
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="assembly_time" class="block text-sm font-medium text-gray-700 mb-1">
                            Assembly Time
                        </label>
                        <input type="time" name="assembly_time" id="assembly_time" value="{{ old('assembly_time') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="expected_students" class="block text-sm font-medium text-gray-700 mb-1">
                            Expected Students
                        </label>
                        <input type="number" name="expected_students" id="expected_students" value="{{ old('expected_students') }}" min="0"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="expected_faculty" class="block text-sm font-medium text-gray-700 mb-1">
                            Expected Faculty/Staff
                        </label>
                        <input type="number" name="expected_faculty" id="expected_faculty" value="{{ old('expected_faculty') }}" min="0"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div class="md:col-span-2">
                        <label for="school_intention" class="block text-sm font-medium text-gray-700 mb-1">
                            Mass Intention
                        </label>
                        <textarea name="intention_summary" id="school_intention" rows="2"
                                  placeholder="e.g., Opening of classes, Foundation day, etc."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('intention_summary') }}</textarea>
                    </div>

                    <div class="md:col-span-2 flex items-center">
                        <input type="checkbox" name="ministers_needed" id="school_ministers_needed" value="1"
                               {{ old('ministers_needed') ? 'checked' : '' }}
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
                        <input type="text" name="presider_name" id="presider_name" value="{{ old('presider_name') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="expected_attendees" class="block text-sm font-medium text-gray-700 mb-1">
                            Expected Attendees
                        </label>
                        <input type="number" name="expected_attendees" id="expected_attendees" value="{{ old('expected_attendees') }}" min="0"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="stipend_amount" class="block text-sm font-medium text-gray-700 mb-1">
                            Stipend Amount (₱)
                        </label>
                        <input type="number" name="stipend_amount" id="stipend_amount" value="{{ old('stipend_amount') }}" min="0" step="0.01"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div class="md:col-span-2">
                        <label for="location_text" class="block text-sm font-medium text-gray-700 mb-1">
                            Location/Venue Details
                        </label>
                        <textarea name="location_text" id="location_text" rows="2"
                                  placeholder="Specific location details, landmarks, etc."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('location_text') }}</textarea>
                    </div>

                    <div class="md:col-span-2 flex items-center">
                        <input type="checkbox" name="sound_system_needed" id="sound_system_needed" value="1"
                               {{ old('sound_system_needed') ? 'checked' : '' }}
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
                                <span class="text-gray-600">Baptism</span>
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
                            <div class="flex items-center gap-1">
                                <span class="w-3 h-3 bg-teal-500 rounded"></span>
                                <span class="text-gray-600">Blessing</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="w-3 h-3 bg-cyan-500 rounded"></span>
                                <span class="text-gray-600">Parish Mass</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="w-3 h-3 bg-emerald-500 rounded"></span>
                                <span class="text-gray-600">Barrio Mass</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="w-3 h-3 bg-amber-500 rounded"></span>
                                <span class="text-gray-600">School Mass</span>
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
                Baptism: 'blue',
                burial: 'purple',
                confirmation: 'indigo',
                wedding: 'pink',
                blessing: 'teal',
                parish_mass: 'cyan',
                barrio_mass: 'emerald',
                school_mass: 'amber'
            };

            const statusColors = {
                pending: 'yellow',
                cancelled: 'gray',
                approved: 'green',
                declined: 'red',
                completed: 'blue'
            };

            const icons = {
                Baptism: 'fa-water',
                burial: 'fa-cross',
                confirmation: 'fa-hands-praying',
                wedding: 'fa-heart',
                blessing: 'fa-hand-holding-heart',
                parish_mass: 'fa-church',
                barrio_mass: 'fa-people-roof',
                school_mass: 'fa-school'
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
    /* Alpine.js cloak */
    [x-cloak] { display: none !important; }
</style>

@endsection
