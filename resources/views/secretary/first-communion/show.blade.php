@extends('secretary.shell')

@section('title', 'First Communion Record Details')

@section('secretary-content')
    <!-- Main Content -->
    <div class="pt-16 min-h-screen bg-gray-50" x-data="{ communicantsOpen: false, parentsOpen: false }">
        <div class="max-w-5xl mx-auto px-3 sm:px-6 lg:px-8 py-6 sm:py-8">
            <!-- Action Buttons -->
            <div class="mb-4 sm:mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                <a href="{{ route('secretary.first-communion.index') }}" class="text-blue-600 hover:text-blue-800 text-sm sm:text-base">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Records
                </a>
                <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 w-full sm:w-auto">
                    <a href="{{ route('secretary.first-communion.edit', $firstCommunion) }}" class="flex-1 sm:flex-none bg-green-600 text-white px-3 sm:px-6 py-2 rounded-lg hover:bg-green-700 transition font-medium text-sm sm:text-base text-center">
                        <i class="fas fa-edit mr-1 sm:mr-2"></i>Edit
                    </a>
                    <form action="{{ route('secretary.first-communion.destroy', $firstCommunion) }}" method="POST" class="flex-1 sm:flex-none" onsubmit="return confirm('Are you sure you want to delete this record?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-600 text-white px-3 sm:px-6 py-2 rounded-lg hover:bg-red-700 transition font-medium text-sm sm:text-base">
                            <i class="fas fa-trash mr-1 sm:mr-2"></i>Delete
                        </button>
                    </form>
                </div>
            </div>

            <!-- Record Details -->
            <div class="bg-white rounded-xl shadow-lg p-4 sm:p-6 md:p-8">
                <!-- Header -->
                <div class="text-center mb-6 sm:mb-8 border-b-4 border-teal-600 pb-4 sm:pb-6">
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-1 sm:mb-2">First Communion Record</h2>
                    <p class="text-xs sm:text-sm text-gray-600">
                        {{ \Carbon\Carbon::create($firstCommunion->year, $firstCommunion->month, $firstCommunion->day)->format('F d, Y') }}
                    </p>
                </div>

                <!-- Main Information -->
                <div class="mb-6 sm:mb-8">
                    <!-- Information Grid - Top Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 md:gap-8 mb-6 sm:mb-8">
                        <!-- Left Column -->
                        <div class="space-y-3 sm:space-y-4">
                            <div class="bg-gray-50 p-3 sm:p-4 rounded-lg">
                                <p class="text-xs sm:text-sm text-gray-600 mb-1">Address</p>
                                <p class="text-base sm:text-lg font-semibold text-gray-800">{{ $firstCommunion->address ?? 'Not provided' }}</p>
                            </div>

                            <div class="bg-gray-50 p-3 sm:p-4 rounded-lg">
                                <p class="text-xs sm:text-sm text-gray-600 mb-1">Minister</p>
                                <p class="text-base sm:text-lg font-semibold text-gray-800">{{ $firstCommunion->minister ?? 'Not provided' }}</p>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-3 sm:space-y-4">
                            <div class="bg-gray-50 p-3 sm:p-4 rounded-lg">
                                <p class="text-xs sm:text-sm text-gray-600 mb-1">Date of First Communion</p>
                                <p class="text-base sm:text-lg font-semibold text-gray-800">{{ \Carbon\Carbon::create($firstCommunion->year, $firstCommunion->month, $firstCommunion->day)->format('F d, Y') }}</p>
                            </div>

                            <div class="bg-gray-50 p-3 sm:p-4 rounded-lg">
                                <p class="text-xs sm:text-sm text-gray-600 mb-1">Baptismal Date</p>
                                <p class="text-base sm:text-lg font-semibold text-gray-800">{{ $firstCommunion->baptismal_date?->format('F d, Y') ?? 'Not provided' }}</p>
                            </div>

                            <div class="bg-gray-50 p-3 sm:p-4 rounded-lg">
                                <p class="text-xs sm:text-sm text-gray-600 mb-1">Baptismal Place</p>
                                <p class="text-base sm:text-lg font-semibold text-gray-800">{{ $firstCommunion->baptismal_place ?? 'Not provided' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Church -->
                    <div class="bg-teal-50 p-4 sm:p-6 rounded-lg text-center mb-6 sm:mb-8">
                        <p class="text-xs sm:text-sm text-gray-600 mb-2">Church</p>
                        <p class="text-xl sm:text-2xl font-bold text-gray-800">{{ $firstCommunion->church_name }}</p>
                    </div>

                    <!-- Communicants Section - Collapsible -->
                    <div class="mb-4 sm:mb-6 border rounded-lg overflow-hidden">
                        <button @click="communicantsOpen = !communicantsOpen"
                                class="w-full bg-indigo-100 hover:bg-indigo-200 p-4 sm:p-5 flex items-center justify-between transition duration-200">
                            <h3 class="text-lg sm:text-xl font-semibold text-gray-800 flex items-center">
                                <i class="fas fa-users text-indigo-600 mr-2"></i>Communicants
                            </h3>
                            <i class="fas fa-chevron-down text-indigo-600 transition-transform duration-300" :class="{ 'rotate-180': communicantsOpen }"></i>
                        </button>
                        <div x-show="communicantsOpen"
                             x-transition
                             class="bg-white p-4 sm:p-6 border-t border-indigo-200">
                            <div class="space-y-2 sm:space-y-3">
                                @foreach($firstCommunion->names ?? [] as $index => $name)
                                    <div class="bg-indigo-50 p-3 sm:p-4 rounded-lg border-l-4 border-indigo-600">
                                        <div class="flex items-start justify-between">
                                            <div>
                                                <p class="text-xs sm:text-sm text-indigo-700 font-medium">Communicant {{ $index + 1 }}</p>
                                                <p class="text-base sm:text-lg font-semibold text-gray-800 mt-1">{{ $name }}</p>
                                            </div>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-200 text-indigo-800">
                                                #{{ $index + 1 }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Parents Section - Collapsible -->
                    <div class="mb-6 sm:mb-8 border rounded-lg overflow-hidden">
                        <button @click="parentsOpen = !parentsOpen"
                                class="w-full bg-green-100 hover:bg-green-200 p-4 sm:p-5 flex items-center justify-between transition duration-200">
                            <h3 class="text-lg sm:text-xl font-semibold text-gray-800 flex items-center">
                                <i class="fas fa-family text-green-600 mr-2"></i>Parents
                            </h3>
                            <i class="fas fa-chevron-down text-green-600 transition-transform duration-300" :class="{ 'rotate-180': parentsOpen }"></i>
                        </button>
                        <div x-show="parentsOpen"
                             x-transition
                             class="bg-white p-4 sm:p-6 border-t border-green-200">
                            <div class="space-y-2 sm:space-y-3">
                                @foreach($firstCommunion->parents ?? [] as $index => $parent)
                                    <div class="bg-green-50 p-3 sm:p-4 rounded-lg border-l-4 border-green-600">
                                        <div class="flex items-start justify-between">
                                            <div>
                                                <p class="text-xs sm:text-sm text-green-700 font-medium">Parent {{ $index + 1 }}</p>
                                                <p class="text-base sm:text-lg font-semibold text-gray-800 mt-1">{{ $parent }}</p>
                                            </div>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-200 text-green-800">
                                                #{{ $index + 1 }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Record Information -->
                <div class="border-t-2 border-gray-300 pt-4 sm:pt-6">
                    <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-4">Record Information</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 text-xs sm:text-sm">
                        <div>
                            <p class="text-gray-600">Created:</p>
                            <p class="font-semibold text-gray-800">{{ $firstCommunion->created_at?->format('F d, Y g:i A') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Last Updated:</p>
                            <p class="font-semibold text-gray-800">{{ $firstCommunion->updated_at?->format('F d, Y g:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
