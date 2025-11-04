@extends('secretary.shell')

@section('title', 'Baptism Record Details')

@section('secretary-content')

    <!-- Main Content -->
    <div class="pt-16 min-h-screen bg-gray-50 print:pt-0 print:bg-white">
        <div class="max-w-5xl mx-auto px-3 sm:px-6 lg:px-8 py-6 sm:py-8 print:py-0">
            <!-- Action Buttons -->
            <div class="mb-4 sm:mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 print:hidden">
                <a href="{{ route('secretary.baptismal.index') }}" class="text-blue-600 hover:text-blue-800 text-sm sm:text-base">
                    <i class="fas fa-arrow-left mr-2"></i>Back to List
                </a>
                <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 w-full sm:w-auto">
                    <a href="{{ route('secretary.baptismal.certificate', $baptismal) }}" target="_blank" class="flex-1 sm:flex-none bg-indigo-600 text-white px-3 sm:px-6 py-2 rounded-lg hover:bg-indigo-700 transition font-medium text-sm sm:text-base text-center">
                        <i class="fas fa-file-pdf mr-1 sm:mr-2"></i><span class="hidden sm:inline">Official Certificate</span><span class="sm:hidden">Certificate</span>
                    </a>
                    <a href="{{ route('secretary.baptismal.edit', $baptismal) }}" class="flex-1 sm:flex-none bg-green-600 text-white px-3 sm:px-6 py-2 rounded-lg hover:bg-green-700 transition font-medium text-sm sm:text-base text-center">
                        <i class="fas fa-edit mr-1 sm:mr-2"></i>Edit
                    </a>
                    <form action="{{ route('secretary.baptismal.destroy', $baptismal) }}" method="POST" class="flex-1 sm:flex-none" onsubmit="return confirm('Are you sure you want to delete this record?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-600 text-white px-3 sm:px-6 py-2 rounded-lg hover:bg-red-700 transition font-medium text-sm sm:text-base">
                            <i class="fas fa-trash mr-1 sm:mr-2"></i>Delete
                        </button>
                    </form>
                </div>
            </div>

            <!-- Certificate View -->
            <div class="bg-white rounded-xl shadow-lg p-4 sm:p-6 md:p-12 print:shadow-none print:p-8">
                <!-- Certificate Header -->
                <div class="text-center mb-6 sm:mb-8 border-b-4 border-blue-600 pb-4 sm:pb-6">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Church Logo" class="h-16 sm:h-20 md:h-24 w-16 sm:w-20 md:w-24 mx-auto mb-3 sm:mb-4 rounded-full object-cover">
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-1 sm:mb-2">{{ $baptismal->church_name }}</h1>
                    <h2 class="text-lg sm:text-xl md:text-2xl font-semibold text-blue-600 mb-2 sm:mb-4">CERTIFICATE OF BAPTISM</h2>
                    <p class="text-xs sm:text-sm md:text-base text-gray-600">This is to certify that</p>
                </div>

                <!-- Main Information -->
                <div class="mb-6 sm:mb-8">
                    <div class="text-center mb-6 sm:mb-8">
                        <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 border-b-2 border-gray-300 inline-block pb-2 px-3 sm:px-8">{{ $baptismal->name }}</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 md:gap-8 mb-6 sm:mb-8">
                        <!-- Left Column -->
                        <div class="space-y-3 sm:space-y-4">
                            <div class="bg-gray-50 p-3 sm:p-4 rounded-lg print:bg-gray-100">
                                <p class="text-xs sm:text-sm text-gray-600 mb-1">Date of Birth</p>
                                <p class="text-base sm:text-lg font-semibold text-gray-800">{{ $baptismal->birth_date?->format('F d, Y') }}</p>
                            </div>

                            <div class="bg-gray-50 p-3 sm:p-4 rounded-lg print:bg-gray-100">
                                <p class="text-xs sm:text-sm text-gray-600 mb-1">Father's Name</p>
                                <p class="text-base sm:text-lg font-semibold text-gray-800">{{ $baptismal->fathers_name }}</p>
                            </div>

                            <div class="bg-gray-50 p-3 sm:p-4 rounded-lg print:bg-gray-100">
                                <p class="text-xs sm:text-sm text-gray-600 mb-1">Primary Sponsor</p>
                                <p class="text-base sm:text-lg font-semibold text-gray-800">{{ $baptismal->sponsor }}</p>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-3 sm:space-y-4">
                            <div class="bg-gray-50 p-3 sm:p-4 rounded-lg print:bg-gray-100">
                                <p class="text-xs sm:text-sm text-gray-600 mb-1">Date of Baptism</p>
                                <p class="text-base sm:text-lg font-semibold text-gray-800">{{ $baptismal->baptism_date?->format('F d, Y') }}</p>
                            </div>

                            <div class="bg-gray-50 p-3 sm:p-4 rounded-lg print:bg-gray-100">
                                <p class="text-xs sm:text-sm text-gray-600 mb-1">Mother's Name</p>
                                <p class="text-base sm:text-lg font-semibold text-gray-800">{{ $baptismal->mothers_name }}</p>
                            </div>

                            @if($baptismal->secondary_sponsor)
                            <div class="bg-gray-50 p-3 sm:p-4 rounded-lg print:bg-gray-100">
                                <p class="text-xs sm:text-sm text-gray-600 mb-1">Secondary Sponsor</p>
                                <p class="text-base sm:text-lg font-semibold text-gray-800">{{ $baptismal->secondary_sponsor }}</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Officiating Priest -->
                    <div class="bg-blue-50 p-4 sm:p-6 rounded-lg text-center mb-6 sm:mb-8 print:bg-blue-100">
                        <p class="text-xs sm:text-sm text-gray-600 mb-2">Officiating Priest</p>
                        <p class="text-xl sm:text-2xl font-bold text-gray-800">{{ $baptismal->priest_name }}</p>
                    </div>

                    <!-- Record Reference -->
                    <div class="bg-gray-50 p-4 sm:p-6 rounded-lg print:bg-gray-100">
                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-4 text-center">Record Reference</h4>
                        <div class="grid grid-cols-3 gap-2 sm:gap-4 text-center">
                            <div>
                                <p class="text-xs sm:text-sm text-gray-600 mb-1">Book Number</p>
                                <p class="text-lg sm:text-xl font-bold text-gray-800">{{ $baptismal->book_number }}</p>
                            </div>
                            <div>
                                <p class="text-xs sm:text-sm text-gray-600 mb-1">Page Number</p>
                                <p class="text-lg sm:text-xl font-bold text-gray-800">{{ $baptismal->page_number }}</p>
                            </div>
                            <div>
                                <p class="text-xs sm:text-sm text-gray-600 mb-1">Line Number</p>
                                <p class="text-lg sm:text-xl font-bold text-gray-800">{{ $baptismal->line_number }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Certificate Footer -->
                <div class="mt-8 sm:mt-12 pt-4 sm:pt-6 border-t-2 border-gray-300">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 text-center">
                        <div>
                            <div class="border-t-2 border-gray-800 pt-2 mt-12 sm:mt-16 inline-block px-4 sm:px-8">
                                <p class="text-xs sm:text-sm font-semibold text-gray-800">Secretary</p>
                            </div>
                        </div>
                        <div>
                            <div class="border-t-2 border-gray-800 pt-2 mt-12 sm:mt-16 inline-block px-4 sm:px-8">
                                <p class="text-xs sm:text-sm font-semibold text-gray-800">Parish Priest</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-6 sm:mt-8 text-xs sm:text-sm text-gray-600">
                        <p>Issued on {{ now()->format('F d, Y') }}</p>
                        <p class="mt-1 sm:mt-2">{{ $baptismal->church_name }}</p>
                    </div>
                </div>
            </div>

            <!-- Additional Details (Not Printed) -->
            <div class="mt-6 sm:mt-8 bg-white rounded-xl shadow-md p-4 sm:p-6 print:hidden">
                <h3 class="text-base sm:text-lg md:text-xl font-bold text-gray-800 mb-4">
                    <i class="fas fa-info-circle mr-2 text-blue-600"></i>Record Information
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 text-xs sm:text-sm">
                    <div>
                        <p class="text-gray-600">Created:</p>
                        <p class="font-semibold text-gray-800">{{ $baptismal->created_at?->format('F d, Y g:i A') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Last Updated:</p>
                        <p class="font-semibold text-gray-800">{{ $baptismal->updated_at?->format('F d, Y g:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media print {
            @page {
                size: letter;
                margin: 1cm;
            }
            body {
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>

@endsection
