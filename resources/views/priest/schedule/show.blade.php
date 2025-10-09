@extends('priest.shell')

@            <!-- Header with Sacrament Type -->
            <div class="bg-{{ $schedule->sacrament_type_color }}-100 border-l-4 border-{{ $schedule->sacrament_type_color }}-500 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $schedule->sacrament_type_color }}-200 text-{{ $schedule->sacrament_type_color }}-800">
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
                        <span class="ml-2 px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $schedule->status_color }}-100 text-{{ $schedule->status_color }}-800">
                            Priest: {{ ucfirst($schedule->status) }}
                        </span>
                    </div>tle', 'Schedule Details')

@section('priest-content')
<div class="pt-16 min-h-screen bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Schedule Details</h1>
                <p class="text-gray-600 mt-1">Review schedule information</p>
            </div>
            <a href="{{ route('priest.schedule.index') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition duration-150">
                <i class="fas fa-arrow-left mr-2"></i>Back to List
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Schedule Information -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
            <!-- Header with Sacrament Type -->
            <div class="bg-{{ $schedule->sacrament_type_color }}-100 border-l-4 border-{{ $schedule->sacrament_type_color }}-500 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $schedule->sacrament_type_color }}-200 text-{{ $schedule->sacrament_type_color }}-800">
                            {{ ucfirst($schedule->sacrament_type) }}
                        </span>
                        <span class="ml-2 px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $schedule->status_color }}-100 text-{{ $schedule->status_color }}-800">
                            Priest: {{ ucfirst($schedule->status) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Client Information -->
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-user text-gray-600 mr-2"></i>Client Information
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 rounded-lg p-4">
                    <div>
                        <h4 class="text-sm font-semibold text-gray-700 mb-1">Full Name</h4>
                        <p class="text-gray-900">{{ $schedule->client_name }}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-700 mb-1">Contact Number</h4>
                        <p class="text-gray-900">{{ $schedule->contact_number }}</p>
                    </div>
                    @if($schedule->email)
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 mb-1">Email Address</h4>
                            <p class="text-gray-900">{{ $schedule->email }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Schedule Details -->
            <div class="border-t border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    <i class="fas fa-calendar text-gray-600 mr-2"></i>Schedule Details
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <h4 class="text-sm font-semibold text-gray-700 mb-1">Date</h4>
                        <p class="text-gray-900">{{ $schedule->schedule_date->format('F d, Y') }}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-700 mb-1">Time</h4>
                        <p class="text-gray-900">{{ date('g:i A', strtotime($schedule->schedule_time)) }}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-700 mb-1">Secretary Status</h4>
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $schedule->status_color }}-100 text-{{ $schedule->status_color }}-800">
                            {{ ucfirst($schedule->status) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Blessing Specific Information -->
            @if($schedule->sacrament_type == 'blessing')
                <div class="border-t border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">
                        <i class="fas fa-hand-holding-heart text-teal-600 mr-2"></i>Blessing Details
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 rounded-lg p-4">
                        @if($schedule->blessing_type)
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Blessing Type</h4>
                                <p class="text-gray-900">{{ ucfirst(str_replace('_', ' ', $schedule->blessing_type)) }}</p>
                            </div>
                        @endif
                        @if($schedule->owner_name)
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Owner Name</h4>
                                <p class="text-gray-900">{{ $schedule->owner_name }}</p>
                            </div>
                        @endif
                        @if($schedule->address)
                            <div class="md:col-span-2">
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Address</h4>
                                <p class="text-gray-900">{{ $schedule->address }}</p>
                            </div>
                        @endif
                        @if($schedule->barangay_name)
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Barangay</h4>
                                <p class="text-gray-900">{{ $schedule->barangay_name }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Mass Specific Information -->
            @if(in_array($schedule->sacrament_type, ['parish_mass', 'barrio_mass', 'school_mass']))
                <div class="border-t border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">
                        @if($schedule->sacrament_type == 'parish_mass')
                            <i class="fas fa-church text-cyan-600 mr-2"></i>Parish Mass Details
                        @elseif($schedule->sacrament_type == 'barrio_mass')
                            <i class="fas fa-people-roof text-emerald-600 mr-2"></i>Barrio Mass Details
                        @else
                            <i class="fas fa-school text-amber-600 mr-2"></i>School Mass Details
                        @endif
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 rounded-lg p-4">
                        @if($schedule->mass_category)
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Mass Category</h4>
                                <p class="text-gray-900">{{ ucfirst(str_replace('_', ' ', $schedule->mass_category)) }}</p>
                            </div>
                        @endif
                        @if($schedule->sacrament_type == 'barrio_mass' && $schedule->barangay_name)
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Barangay</h4>
                                <p class="text-gray-900">{{ $schedule->barangay_name }}</p>
                            </div>
                        @endif
                        @if($schedule->sacrament_type == 'school_mass' && $schedule->school_name)
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">School</h4>
                                <p class="text-gray-900">{{ $schedule->school_name }}</p>
                            </div>
                        @endif
                        @if($schedule->intention_summary)
                            <div class="md:col-span-2">
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Mass Intention</h4>
                                <p class="text-gray-900">{{ $schedule->intention_summary }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Common Additional Information for New Types -->
            @if(in_array($schedule->sacrament_type, ['blessing', 'parish_mass', 'barrio_mass', 'school_mass']))
                <div class="border-t border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">
                        <i class="fas fa-circle-info text-indigo-600 mr-2"></i>Additional Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 rounded-lg p-4">
                        @if($schedule->presider_name)
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Presiding Priest</h4>
                                <p class="text-gray-900">{{ $schedule->presider_name }}</p>
                            </div>
                        @endif
                        @if($schedule->expected_attendees)
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Expected Attendees</h4>
                                <p class="text-gray-900">{{ number_format($schedule->expected_attendees) }}</p>
                            </div>
                        @endif
                        @if($schedule->stipend_amount)
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Stipend Amount</h4>
                                <p class="text-gray-900">₱{{ number_format($schedule->stipend_amount, 2) }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Notes -->
            @if($schedule->notes)
                <div class="border-t border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">
                        <i class="fas fa-sticky-note text-gray-600 mr-2"></i>Client Notes
                    </h3>
                    <div class="bg-gray-50 rounded-lg p-4 whitespace-pre-wrap">{{ $schedule->notes }}</div>
                </div>
            @endif

            <!-- Priest Review Status -->
            @if($schedule->priest_reviewed_at)
                <div class="border-t border-gray-200 p-6 bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">
                        <i class="fas fa-clipboard-check text-gray-600 mr-2"></i>Priest Review
                    </h3>
                    <div class="space-y-2">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 mb-1">Status</h4>
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $schedule->color }}-100 text-{{ $schedule->status_color }}-800">
                                {{ ucfirst($schedule->status) }}
                            </span>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 mb-1">Reviewed At</h4>
                            <p class="text-gray-900">{{ $schedule->priest_reviewed_at->format('F d, Y g:i A') }}</p>
                        </div>
                        @if($schedule->priest_notes)
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Priest Notes</h4>
                                <div class="bg-white rounded-lg p-3 border border-gray-200 whitespace-pre-wrap">{{ $schedule->priest_notes }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Metadata -->
            <div class="border-t border-gray-200 px-6 py-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
                    <div>
                        <span class="font-semibold">Created By:</span> {{ $schedule->user->name ?? 'Unknown' }}
                    </div>
                    <div>
                        <span class="font-semibold">Created At:</span> {{ $schedule->created_at->format('M d, Y g:i A') }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        @if($schedule->status === 'pending')
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Review Actions</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Approve Form -->
                    <form action="{{ route('priest.schedule.approve', $schedule) }}" method="POST" class="border border-green-200 rounded-lg p-4 bg-green-50">
                        @csrf
                        @method('PATCH')
                        <h4 class="font-semibold text-green-900 mb-3">
                            <i class="fas fa-check-circle mr-2"></i>Approve Schedule
                        </h4>
                        <div class="mb-4">
                            <label for="approve_notes" class="block text-sm font-medium text-gray-700 mb-2">
                                Notes (Optional)
                            </label>
                            <textarea id="approve_notes"
                                      name="priest_notes"
                                      rows="3"
                                      placeholder="Add any notes or instructions..."
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"></textarea>
                        </div>
                        <button type="submit"
                                class="w-full px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-150">
                            <i class="fas fa-check mr-2"></i>Approve
                        </button>
                    </form>

                    <!-- Decline Form -->
                    <form action="{{ route('priest.schedule.decline', $schedule) }}" method="POST" class="border border-red-200 rounded-lg p-4 bg-red-50">
                        @csrf
                        @method('PATCH')
                        <h4 class="font-semibold text-red-900 mb-3">
                            <i class="fas fa-times-circle mr-2"></i>Decline Schedule
                        </h4>
                        <div class="mb-4">
                            <label for="decline_notes" class="block text-sm font-medium text-gray-700 mb-2">
                                Reason <span class="text-red-500">*</span>
                            </label>
                            <textarea id="decline_notes"
                                      name="priest_notes"
                                      rows="3"
                                      required
                                      placeholder="Please provide a reason for declining..."
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"></textarea>
                        </div>
                        <button type="submit"
                                class="w-full px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition duration-150">
                            <i class="fas fa-times mr-2"></i>Decline
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
