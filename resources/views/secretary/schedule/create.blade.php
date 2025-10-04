@extends('secretary.shell')

@section('secretary-content')
<div class="pt-16 min-h-screen bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
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

        <form method="POST" action="{{ route('secretary.schedule.store') }}" class="space-y-6">
            @csrf

            <!-- Sacrament Selection -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-church text-indigo-600 mr-2"></i>
                    Sacrament Selection
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer hover:border-blue-500 transition {{ old('sacrament_type') == 'baptismal' ? 'border-blue-500 bg-blue-50' : 'border-gray-300' }}">
                        <input type="radio"
                               name="sacrament_type"
                               value="baptismal"
                               {{ old('sacrament_type') == 'baptismal' ? 'checked' : '' }}
                               class="sr-only peer">
                        <i class="fas fa-water text-3xl text-blue-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Baptismal</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer hover:border-purple-500 transition {{ old('sacrament_type') == 'burial' ? 'border-purple-500 bg-purple-50' : 'border-gray-300' }}">
                        <input type="radio"
                               name="sacrament_type"
                               value="burial"
                               {{ old('sacrament_type') == 'burial' ? 'checked' : '' }}
                               class="sr-only peer">
                        <i class="fas fa-cross text-3xl text-purple-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Burial</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer hover:border-indigo-500 transition {{ old('sacrament_type') == 'confirmation' ? 'border-indigo-500 bg-indigo-50' : 'border-gray-300' }}">
                        <input type="radio"
                               name="sacrament_type"
                               value="confirmation"
                               {{ old('sacrament_type') == 'confirmation' ? 'checked' : '' }}
                               class="sr-only peer">
                        <i class="fas fa-hands-praying text-3xl text-indigo-600 mb-2"></i>
                        <span class="text-sm font-medium text-gray-900">Confirmation</span>
                    </label>

                    <label class="relative flex flex-col items-center p-4 border-2 rounded-lg cursor-pointer hover:border-pink-500 transition {{ old('sacrament_type') == 'wedding' ? 'border-pink-500 bg-pink-50' : 'border-gray-300' }}">
                        <input type="radio"
                               name="sacrament_type"
                               value="wedding"
                               {{ old('sacrament_type') == 'wedding' ? 'checked' : '' }}
                               class="sr-only peer">
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
</div>
@endsection
