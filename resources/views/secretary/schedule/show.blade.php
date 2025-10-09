@extends('secretary.shell')

@section('title', 'Schedule Details')

@section('secretary-content')
<div class="pt-16 min-h-screen bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-6">
            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                <a href="{{ route('secretary.schedule.index') }}" class="hover:text-indigo-600">Schedules</a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span>Schedule Details</span>
            </div>
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Schedule Details</h1>
                    <p class="text-gray-600 mt-1">View schedule information</p>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('secretary.schedule.edit', $schedule) }}"
                       class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition duration-150">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </a>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-6">
            <!-- Schedule Information -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-calendar-alt text-indigo-600 mr-2"></i>
                    Schedule Information
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Sacrament Type</label>
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-{{ $schedule->sacrament_type_color }}-100 text-{{ $schedule->sacrament_type_color }}-800">
                                @if($schedule->sacrament_type == 'baptismal')
                                    <i class="fas fa-water mr-2"></i>
                                @elseif($schedule->sacrament_type == 'burial')
                                    <i class="fas fa-cross mr-2"></i>
                                @elseif($schedule->sacrament_type == 'confirmation')
                                    <i class="fas fa-hands-praying mr-2"></i>
                                @elseif($schedule->sacrament_type == 'wedding')
                                    <i class="fas fa-heart mr-2"></i>
                                @elseif($schedule->sacrament_type == 'blessing')
                                    <i class="fas fa-hand-holding-heart mr-2"></i>
                                @elseif($schedule->sacrament_type == 'parish_mass')
                                    <i class="fas fa-church mr-2"></i>
                                @elseif($schedule->sacrament_type == 'barrio_mass')
                                    <i class="fas fa-people-roof mr-2"></i>
                                @elseif($schedule->sacrament_type == 'school_mass')
                                    <i class="fas fa-school mr-2"></i>
                                @endif
                                {{ ucfirst(str_replace('_', ' ', $schedule->sacrament_type)) }}
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Status</label>
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-{{ $schedule->status_color }}-100 text-{{ $schedule->status_color }}-800">
                                {{ ucfirst($schedule->status) }}
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Schedule Date</label>
                        <p class="text-lg font-semibold text-gray-900">
                            {{ $schedule->schedule_date->format('F d, Y') }}
                        </p>
                        <p class="text-sm text-gray-600">
                            {{ $schedule->schedule_date->diffForHumans() }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Schedule Time</label>
                        <p class="text-lg font-semibold text-gray-900">
                            {{ date('g:i A', strtotime($schedule->schedule_time)) }}
                        </p>
                    </div>
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
                        <label class="block text-sm font-medium text-gray-500 mb-1">Client Name</label>
                        <p class="text-lg font-semibold text-gray-900">{{ $schedule->client_name }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Contact Number</label>
                        <p class="text-lg font-semibold text-gray-900">{{ $schedule->contact_number }}</p>
                    </div>

                    @if($schedule->email)
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-500 mb-1">Email Address</label>
                            <p class="text-lg font-semibold text-gray-900">{{ $schedule->email }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Blessing Specific Information -->
            @if($schedule->sacrament_type == 'blessing')
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-hand-holding-heart text-teal-600 mr-2"></i>
                        Blessing Details
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if($schedule->blessing_type)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Blessing Type</label>
                                <p class="text-lg font-semibold text-gray-900">{{ ucfirst(str_replace('_', ' ', $schedule->blessing_type)) }}</p>
                            </div>
                        @endif

                        @if($schedule->owner_name)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Owner Name</label>
                                <p class="text-lg font-semibold text-gray-900">{{ $schedule->owner_name }}</p>
                            </div>
                        @endif

                        @if($schedule->address)
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-500 mb-1">Address</label>
                                <p class="text-gray-900">{{ $schedule->address }}</p>
                            </div>
                        @endif

                        @if($schedule->barangay_name)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Barangay</label>
                                <p class="text-gray-900">{{ $schedule->barangay_name }}</p>
                            </div>
                        @endif

                        @if($schedule->occupants_count)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Number of Occupants</label>
                                <p class="text-gray-900">{{ $schedule->occupants_count }}</p>
                            </div>
                        @endif

                        @if($schedule->items_prepared)
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-500 mb-1">Items to be Prepared</label>
                                <p class="text-gray-900">{{ $schedule->items_prepared }}</p>
                            </div>
                        @endif

                        @if($schedule->access_notes)
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-500 mb-1">Access/Directions Notes</label>
                                <p class="text-gray-900">{{ $schedule->access_notes }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Mass Specific Information (Parish, Barrio, School) -->
            @if(in_array($schedule->sacrament_type, ['parish_mass', 'barrio_mass', 'school_mass']))
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        @if($schedule->sacrament_type == 'parish_mass')
                            <i class="fas fa-church text-cyan-600 mr-2"></i>
                            Parish Mass Details
                        @elseif($schedule->sacrament_type == 'barrio_mass')
                            <i class="fas fa-people-roof text-emerald-600 mr-2"></i>
                            Barrio Mass Details
                        @else
                            <i class="fas fa-school text-amber-600 mr-2"></i>
                            School Mass Details
                        @endif
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if($schedule->mass_category)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Mass Category</label>
                                <p class="text-lg font-semibold text-gray-900">{{ ucfirst(str_replace('_', ' ', $schedule->mass_category)) }}</p>
                            </div>
                        @endif

                        @if($schedule->sacrament_type == 'barrio_mass' && $schedule->barangay_name)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Barangay</label>
                                <p class="text-gray-900">{{ $schedule->barangay_name }}</p>
                            </div>
                        @endif

                        @if($schedule->sacrament_type == 'barrio_mass' && $schedule->sitio_name)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Sitio/Purok</label>
                                <p class="text-gray-900">{{ $schedule->sitio_name }}</p>
                            </div>
                        @endif

                        @if(in_array($schedule->sacrament_type, ['parish_mass', 'barrio_mass']) && $schedule->chapel_name)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Chapel/Venue</label>
                                <p class="text-gray-900">{{ $schedule->chapel_name }}</p>
                            </div>
                        @endif

                        @if($schedule->sacrament_type == 'school_mass' && $schedule->school_name)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">School</label>
                                <p class="text-lg font-semibold text-gray-900">{{ $schedule->school_name }}</p>
                            </div>
                        @endif

                        @if($schedule->sacrament_type == 'school_mass' && $schedule->campus_or_venue)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Campus/Venue</label>
                                <p class="text-gray-900">{{ $schedule->campus_or_venue }}</p>
                            </div>
                        @endif

                        @if($schedule->sacrament_type == 'school_mass' && $schedule->grade_levels)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Grade Levels</label>
                                <p class="text-gray-900">{{ $schedule->grade_levels }}</p>
                            </div>
                        @endif

                        @if($schedule->sacrament_type == 'school_mass' && $schedule->assembly_time)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Assembly Time</label>
                                <p class="text-gray-900">{{ date('g:i A', strtotime($schedule->assembly_time)) }}</p>
                            </div>
                        @endif

                        @if($schedule->sacrament_type == 'school_mass' && $schedule->expected_students)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Expected Students</label>
                                <p class="text-gray-900">{{ number_format($schedule->expected_students) }}</p>
                            </div>
                        @endif

                        @if($schedule->sacrament_type == 'school_mass' && $schedule->expected_faculty)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Expected Faculty/Staff</label>
                                <p class="text-gray-900">{{ number_format($schedule->expected_faculty) }}</p>
                            </div>
                        @endif

                        @if($schedule->intention_summary)
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-500 mb-1">Mass Intention</label>
                                <p class="text-gray-900">{{ $schedule->intention_summary }}</p>
                            </div>
                        @endif

                        @if($schedule->sacrament_type == 'parish_mass' && $schedule->choir_team)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Choir Team</label>
                                <p class="text-gray-900">{{ $schedule->choir_team }}</p>
                            </div>
                        @endif

                        @if($schedule->sacrament_type == 'parish_mass' && $schedule->recurrence)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Recurrence</label>
                                <p class="text-gray-900">{{ ucfirst($schedule->recurrence) }}</p>
                            </div>
                        @endif

                        @if($schedule->sacrament_type == 'barrio_mass' && $schedule->barrio_coordinator)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Barrio Coordinator</label>
                                <p class="text-gray-900">{{ $schedule->barrio_coordinator }}</p>
                            </div>
                        @endif

                        @if($schedule->sacrament_type == 'barrio_mass' && $schedule->barrio_coordinator_phone)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Coordinator Phone</label>
                                <p class="text-gray-900">{{ $schedule->barrio_coordinator_phone }}</p>
                            </div>
                        @endif

                        @if($schedule->ministers_needed)
                            <div class="md:col-span-2">
                                <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    <i class="fas fa-users mr-2"></i>
                                    Additional ministers needed
                                </span>
                            </div>
                        @endif

                        @if($schedule->sacrament_type == 'barrio_mass' && $schedule->generator_needed)
                            <div class="md:col-span-2">
                                <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-plug mr-2"></i>
                                    Generator needed
                                </span>
                            </div>
                        @endif

                        @if($schedule->sacrament_type == 'barrio_mass' && $schedule->transport_needed)
                            <div class="md:col-span-2">
                                <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                    <i class="fas fa-van-shuttle mr-2"></i>
                                    Transportation needed
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Common Additional Information for New Types -->
            @if(in_array($schedule->sacrament_type, ['blessing', 'parish_mass', 'barrio_mass', 'school_mass']))
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-circle-info text-indigo-600 mr-2"></i>
                        Additional Information
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if($schedule->presider_name)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Presiding Priest</label>
                                <p class="text-gray-900">{{ $schedule->presider_name }}</p>
                            </div>
                        @endif

                        @if($schedule->expected_attendees)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Expected Attendees</label>
                                <p class="text-gray-900">{{ number_format($schedule->expected_attendees) }}</p>
                            </div>
                        @endif

                        @if($schedule->stipend_amount)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Stipend Amount</label>
                                <p class="text-lg font-semibold text-gray-900">₱{{ number_format($schedule->stipend_amount, 2) }}</p>
                            </div>
                        @endif

                        @if($schedule->location_text)
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-500 mb-1">Location/Venue Details</label>
                                <p class="text-gray-900">{{ $schedule->location_text }}</p>
                            </div>
                        @endif

                        @if($schedule->sound_system_needed)
                            <div class="md:col-span-2">
                                <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    <i class="fas fa-volume-high mr-2"></i>
                                    Sound system needed
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Additional Information -->
            @if($schedule->notes)
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-sticky-note text-indigo-600 mr-2"></i>
                        Notes
                    </h2>
                    <p class="text-gray-700 whitespace-pre-line">{{ $schedule->notes }}</p>
                </div>
            @endif

            <!-- System Information -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-info-circle text-indigo-600 mr-2"></i>
                    System Information
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @if($schedule->user)
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Created By</label>
                            <p class="text-gray-900">{{ $schedule->user->name }}</p>
                        </div>
                    @endif

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Created At</label>
                        <p class="text-gray-900">{{ $schedule->created_at->format('F d, Y g:i A') }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Last Updated</label>
                        <p class="text-gray-900">{{ $schedule->updated_at->format('F d, Y g:i A') }}</p>
                    </div>
                </div>
            </div>

            <!-- Quick Status Update -->
            @if($schedule->status != 'completed' && $schedule->status != 'cancelled')
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-tasks text-indigo-600 mr-2"></i>
                        Quick Status Update
                    </h2>

                    <div class="flex flex-wrap gap-3">
                        @if($schedule->status == 'pending')
                            <form method="POST" action="{{ route('secretary.schedule.updateStatus', $schedule) }}" class="inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="approved">
                                <button type="submit"
                                        class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow transition duration-150">
                                    <i class="fas fa-check mr-2"></i>
                                    Approve Schedule
                                </button>
                            </form>
                        @endif

                        @if($schedule->status == 'approved')
                            <form method="POST" action="{{ route('secretary.schedule.updateStatus', $schedule) }}" class="inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="completed">
                                <button type="submit"
                                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition duration-150">
                                    <i class="fas fa-check-double mr-2"></i>
                                    Mark as Completed
                                </button>
                            </form>
                        @endif

                        <form method="POST" action="{{ route('secretary.schedule.updateStatus', $schedule) }}" class="inline">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="cancelled">
                            <button type="submit"
                                    onclick="return confirm('Are you sure you want to cancel this schedule?')"
                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow transition duration-150">
                                <i class="fas fa-times mr-2"></i>
                                Cancel Schedule
                            </button>
                        </form>
                    </div>
                </div>
            @endif

            <!-- Actions -->
            <div class="flex gap-4">
                <a href="{{ route('secretary.schedule.index') }}"
                   class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow transition duration-150">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to List
                </a>
                <form method="POST"
                      action="{{ route('secretary.schedule.destroy', $schedule) }}"
                      class="inline"
                      onsubmit="return confirm('Are you sure you want to delete this schedule? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow transition duration-150">
                        <i class="fas fa-trash mr-2"></i>
                        Delete Schedule
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
