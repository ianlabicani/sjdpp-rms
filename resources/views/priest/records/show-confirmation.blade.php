@extends('priest.shell')

@section('priest-content')
    <div class="min-h-screen bg-gray-50 py-8 pt-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <a
                    href="{{ route('priest.records.confirmation') }}"
                    class="inline-flex items-center text-indigo-600 hover:text-indigo-700 mb-4"
                >
                    <i class="fas fa-arrow-left mr-2"></i>Back to Confirmation Records
                </a>
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                        <i class="fas fa-dove text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Confirmation Record Details</h1>
                        <p class="mt-1 text-sm text-gray-600">View complete confirmation record information</p>
                    </div>
                </div>
            </div>

            <!-- Record Details Card -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <!-- Header Section -->
                <div class="bg-indigo-50 px-6 py-4 border-b border-indigo-100">
                    <h2 class="text-xl font-semibold text-indigo-900">
                        <i class="fas fa-info-circle mr-2"></i>Record Information
                    </h2>
                </div>

                <!-- Content -->
                <div class="p-6 space-y-6">
                    <!-- Confirmand Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-user mr-2 text-indigo-600"></i>Confirmand Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Confirmand Name</label>
                                <p class="text-base font-semibold text-gray-900">{{ $confirmation->name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Confirmation Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-calendar-check mr-2 text-indigo-600"></i>Confirmation Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Date of Confirmation</label>
                                <p class="text-base text-gray-900">
                                    {{ $confirmation->date_of_confirmation ? $confirmation->date_of_confirmation->format('F d, Y') : 'N/A' }}
                                </p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Year</label>
                                <p class="text-base text-gray-900">{{ $confirmation->year ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Minister</label>
                                <p class="text-base text-gray-900">{{ $confirmation->name_of_minister ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Baptism Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-church mr-2 text-indigo-600"></i>Baptism Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Parish of Baptism</label>
                                <p class="text-base text-gray-900">{{ $confirmation->parish_of_baptism ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Province of Baptism</label>
                                <p class="text-base text-gray-900">{{ $confirmation->province_of_baptism ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Place of Baptism</label>
                                <p class="text-base text-gray-900">{{ $confirmation->place_of_baptism ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Family Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-users mr-2 text-indigo-600"></i>Family & Sponsor Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Parents</label>
                                <p class="text-base text-gray-900">{{ $confirmation->parents ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Sponsor</label>
                                <p class="text-base text-gray-900">{{ $confirmation->sponsor ?? 'N/A' }}</p>
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
                                    {{ $confirmation->created_at ? $confirmation->created_at->format('F d, Y - h:i A') : 'N/A' }}
                                </p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Last Updated</label>
                                <p class="text-base text-gray-900">
                                    {{ $confirmation->updated_at ? $confirmation->updated_at->format('F d, Y - h:i A') : 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                    <a
                        href="{{ route('priest.records.confirmation') }}"
                        class="inline-flex items-center px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors"
                    >
                        <i class="fas fa-arrow-left mr-2"></i>Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
