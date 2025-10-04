@extends('priest.shell')

@section('title', 'Wedding Record Details')

@section('priest-content')
    <div class="min-h-screen bg-gray-50 py-8 pt-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <a
                    href="{{ route('priest.records.wedding') }}"
                    class="inline-flex items-center text-pink-600 hover:text-pink-700 mb-4"
                >
                    <i class="fas fa-arrow-left mr-2"></i>Back to Wedding Records
                </a>
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-pink-100 text-pink-600 mr-4">
                        <i class="fas fa-ring text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Wedding Record Details</h1>
                        <p class="mt-1 text-sm text-gray-600">View complete wedding record information</p>
                    </div>
                </div>
            </div>

            <!-- Record Details Card -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <!-- Header Section -->
                <div class="bg-pink-50 px-6 py-4 border-b border-pink-100">
                    <h2 class="text-xl font-semibold text-pink-900">
                        <i class="fas fa-info-circle mr-2"></i>Record Information
                    </h2>
                </div>

                <!-- Content -->
                <div class="p-6 space-y-6">
                    <!-- Couple Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-heart mr-2 text-pink-600"></i>Couple Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Groom/Husband Name</label>
                                <p class="text-base font-semibold text-gray-900">{{ $wedding->husband_name }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Bride/Wife Name</label>
                                <p class="text-base font-semibold text-gray-900">{{ $wedding->wife_name }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Groom Status</label>
                                <p class="text-base text-gray-900">{{ $wedding->husband_status ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Bride Status</label>
                                <p class="text-base text-gray-900">{{ $wedding->wife_status ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Groom Age</label>
                                <p class="text-base text-gray-900">{{ $wedding->husband_age ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Bride Age</label>
                                <p class="text-base text-gray-900">{{ $wedding->wife_age ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Marriage Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-calendar-check mr-2 text-pink-600"></i>Marriage Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Date of Marriage</label>
                                <p class="text-base text-gray-900">
                                    {{ $wedding->date_of_marriage ? $wedding->date_of_marriage->format('F d, Y') : 'N/A' }}
                                </p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Year</label>
                                <p class="text-base text-gray-900">{{ $wedding->year ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Municipality</label>
                                <p class="text-base text-gray-900">{{ $wedding->municipality ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Barangay</label>
                                <p class="text-base text-gray-900">{{ $wedding->barangay ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Presiding Priest</label>
                                <p class="text-base text-gray-900">{{ $wedding->presider ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Parents Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-users mr-2 text-pink-600"></i>Parents Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Groom's Parents</label>
                                <p class="text-base text-gray-900">{{ $wedding->husband_parents ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Bride's Parents</label>
                                <p class="text-base text-gray-900">{{ $wedding->wife_parents ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sponsors Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-hands-helping mr-2 text-pink-600"></i>Sponsors Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Primary Sponsor</label>
                                <p class="text-base text-gray-900">{{ $wedding->sponsor1 ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Secondary Sponsor</label>
                                <p class="text-base text-gray-900">{{ $wedding->sponsor2 ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Place of Sponsor</label>
                                <p class="text-base text-gray-900">{{ $wedding->place_of_sponsor ?? 'N/A' }}</p>
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
                                    {{ $wedding->created_at ? $wedding->created_at->format('F d, Y - h:i A') : 'N/A' }}
                                </p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Last Updated</label>
                                <p class="text-base text-gray-900">
                                    {{ $wedding->updated_at ? $wedding->updated_at->format('F d, Y - h:i A') : 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                    <a
                        href="{{ route('priest.records.wedding') }}"
                        class="inline-flex items-center px-6 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition-colors"
                    >
                        <i class="fas fa-arrow-left mr-2"></i>Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
