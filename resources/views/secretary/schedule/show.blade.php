@extends('secretary.shell')

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
                                @else
                                    <i class="fas fa-heart mr-2"></i>
                                @endif
                                {{ ucfirst($schedule->sacrament_type) }}
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
