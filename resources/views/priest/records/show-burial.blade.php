@extends('priest.shell')

@section('title', 'Burial Record Details')

@section('priest-content')
    <div class="min-h-screen bg-gray-50 py-8 pt-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <a
                    href="{{ route('priest.records.burial') }}"
                    class="inline-flex items-center text-purple-600 hover:text-purple-700 mb-4"
                >
                    <i class="fas fa-arrow-left mr-2"></i>Back to Burial Records
                </a>
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                        <i class="fas fa-cross text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Burial Record Details</h1>
                        <p class="mt-1 text-sm text-gray-600">View complete burial record information</p>
                    </div>
                </div>
            </div>

            <!-- Record Details Card -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <!-- Header Section -->
                <div class="bg-purple-50 px-6 py-4 border-b border-purple-100">
                    <h2 class="text-xl font-semibold text-purple-900">
                        <i class="fas fa-info-circle mr-2"></i>Record Information
                    </h2>
                </div>

                <!-- Content -->
                <div class="p-6 space-y-6">
                    <!-- Deceased Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-user mr-2 text-purple-600"></i>Deceased Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Deceased Name</label>
                                <p class="text-base font-semibold text-gray-900">{{ $burial->name }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Age</label>
                                <p class="text-base text-gray-900">{{ $burial->age ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Status</label>
                                <p class="text-base text-gray-900">{{ $burial->status ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Death and Burial Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-calendar-alt mr-2 text-purple-600"></i>Death & Burial Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Date of Death</label>
                                <p class="text-base text-gray-900">
                                    {{ $burial->date_of_death ? $burial->date_of_death->format('F d, Y') : 'N/A' }}
                                </p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Date of Burial</label>
                                <p class="text-base text-gray-900">
                                    {{ $burial->date_of_burial ? $burial->date_of_burial->format('F d, Y') : 'N/A' }}
                                </p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Place of Burial</label>
                                <p class="text-base text-gray-900">{{ $burial->place ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Service Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-church mr-2 text-purple-600"></i>Service Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Presiding Priest</label>
                                <p class="text-base text-gray-900">{{ $burial->presider ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Informant</label>
                                <p class="text-base text-gray-900">{{ $burial->informant ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Metadata -->
                    <div class="border-t pt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-clock mr-2 text-gray-600"></i>Record Metadata
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Record Created</label>
                                <p class="text-base text-gray-900">
                                    {{ $burial->created_at ? $burial->created_at->format('F d, Y - h:i A') : 'N/A' }}
                                </p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Last Updated</label>
                                <p class="text-base text-gray-900">
                                    {{ $burial->updated_at ? $burial->updated_at->format('F d, Y - h:i A') : 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                    <a
                        href="{{ route('priest.records.burial') }}"
                        class="inline-flex items-center px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors"
                    >
                        <i class="fas fa-arrow-left mr-2"></i>Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
