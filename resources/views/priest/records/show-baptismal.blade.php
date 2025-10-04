@extends('priest.shell')

@section('title', 'Baptismal Record Details')

@section('priest-content')
    <div class="min-h-screen bg-gray-50 py-8 pt-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <a
                    href="{{ route('priest.records.baptismal') }}"
                    class="inline-flex items-center text-blue-600 hover:text-blue-700 mb-4"
                >
                    <i class="fas fa-arrow-left mr-2"></i>Back to Baptismal Records
                </a>
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                        <i class="fas fa-baby text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Baptismal Record Details</h1>
                        <p class="mt-1 text-sm text-gray-600">View complete baptismal record information</p>
                    </div>
                </div>
            </div>

            <!-- Record Details Card -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <!-- Header Section -->
                <div class="bg-blue-50 px-6 py-4 border-b border-blue-100">
                    <h2 class="text-xl font-semibold text-blue-900">
                        <i class="fas fa-info-circle mr-2"></i>Record Information
                    </h2>
                </div>

                <!-- Content -->
                <div class="p-6 space-y-6">
                    <!-- Child Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-child mr-2 text-blue-600"></i>Child Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Child's Name</label>
                                <p class="text-base font-semibold text-gray-900">{{ $baptismal->name }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Birth Date</label>
                                <p class="text-base text-gray-900">
                                    {{ $baptismal->birth_date ? $baptismal->birth_date->format('F d, Y') : 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Baptism Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-water mr-2 text-blue-600"></i>Baptism Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Baptism Date</label>
                                <p class="text-base text-gray-900">
                                    {{ $baptismal->baptism_date ? $baptismal->baptism_date->format('F d, Y') : 'N/A' }}
                                </p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Church Name</label>
                                <p class="text-base text-gray-900">{{ $baptismal->church_name ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Presiding Priest</label>
                                <p class="text-base text-gray-900">{{ $baptismal->priest_name ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Parents Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-users mr-2 text-blue-600"></i>Parents Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Father's Name</label>
                                <p class="text-base text-gray-900">{{ $baptismal->fathers_name ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Mother's Name</label>
                                <p class="text-base text-gray-900">{{ $baptismal->mothers_name ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sponsors Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-hands-helping mr-2 text-blue-600"></i>Sponsors Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Primary Sponsor</label>
                                <p class="text-base text-gray-900">{{ $baptismal->sponsor ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Secondary Sponsor</label>
                                <p class="text-base text-gray-900">{{ $baptismal->secondary_sponsor ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Record Reference -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-book mr-2 text-blue-600"></i>Record Reference
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Book Number</label>
                                <p class="text-base text-gray-900">{{ $baptismal->book_number ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Page Number</label>
                                <p class="text-base text-gray-900">{{ $baptismal->page_number ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Line Number</label>
                                <p class="text-base text-gray-900">{{ $baptismal->line_number ?? 'N/A' }}</p>
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
                                    {{ $baptismal->created_at ? $baptismal->created_at->format('F d, Y - h:i A') : 'N/A' }}
                                </p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-600 mb-1">Last Updated</label>
                                <p class="text-base text-gray-900">
                                    {{ $baptismal->updated_at ? $baptismal->updated_at->format('F d, Y - h:i A') : 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                    <a
                        href="{{ route('priest.records.baptismal') }}"
                        class="inline-flex items-center px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
                    >
                        <i class="fas fa-arrow-left mr-2"></i>Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
