@extends('secretary.shell')

@section('title', 'Confirmation Record Details')

@section('secretary-content')
    <div class="pt-16 min-h-screen bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Action Buttons (hidden in print) -->
            <div class="flex justify-between items-center mb-6 print:hidden">
                <a href="{{ route('secretary.confirmation.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow transition duration-150">
                    <i class="fas fa-arrow-left mr-2"></i>Back to List
                </a>
                <div class="flex gap-2">
                    <a href="{{ route('secretary.confirmation.edit', $confirmation) }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition duration-150">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>
                    <button onclick="window.print()"
                            class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow transition duration-150">
                        <i class="fas fa-print mr-2"></i>Print
                    </button>
                </div>
            </div>

            <!-- Certificate -->
            <div class="bg-white rounded-lg shadow-lg p-12 border-4 border-double border-indigo-600">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="mb-4">
                        <i class="fas fa-hands-praying text-6xl text-indigo-600"></i>
                    </div>
                    <h1 class="text-4xl font-bold text-gray-900 mb-2">Certificate of Confirmation</h1>
                    <div class="w-32 h-1 bg-indigo-600 mx-auto"></div>
                </div>

                <!-- Certificate Content -->
                <div class="space-y-6 text-gray-800">
                    <!-- Year -->
                    <div class="text-center">
                        <p class="text-xl font-semibold text-indigo-600">Year {{ $confirmation->year }}</p>
                    </div>

                    <!-- Introduction -->
                    <div class="text-center text-lg leading-relaxed">
                        <p>This is to certify that</p>
                    </div>

                    <!-- Name -->
                    <div class="text-center">
                        <p class="text-3xl font-bold text-gray-900 border-b-2 border-gray-300 pb-2 inline-block px-8">
                            {{ $confirmation->name }}
                        </p>
                    </div>

                    <!-- Confirmation Details -->
                    <div class="text-center text-lg leading-relaxed">
                        <p>received the Sacrament of Confirmation on</p>
                        <p class="text-xl font-semibold text-indigo-600 mt-2">
                            {{ $confirmation->date_of_confirmation->format('F d, Y') }}
                        </p>
                    </div>

                    <!-- Baptism Information -->
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 text-center">Baptism Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div>
                                <span class="font-semibold text-gray-700">Parish of Baptism:</span>
                                <p class="text-gray-900">{{ $confirmation->parish_of_baptism }}</p>
                            </div>
                            <div>
                                <span class="font-semibold text-gray-700">Province of Baptism:</span>
                                <p class="text-gray-900">{{ $confirmation->province_of_baptism }}</p>
                            </div>
                            <div class="md:col-span-2">
                                <span class="font-semibold text-gray-700">Place of Baptism:</span>
                                <p class="text-gray-900">{{ $confirmation->place_of_baptism }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm font-semibold text-gray-700 mb-1">Parents:</p>
                            <p class="text-gray-900">{{ $confirmation->parents }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-700 mb-1">Sponsor:</p>
                            <p class="text-gray-900">{{ $confirmation->sponsor }}</p>
                        </div>
                    </div>

                    <!-- Minister -->
                    <div class="text-center mt-8">
                        <p class="text-sm font-semibold text-gray-700 mb-1">Minister:</p>
                        <p class="text-xl font-semibold text-gray-900">{{ $confirmation->name_of_minister }}</p>
                    </div>

                    <!-- Footer -->
                    <div class="text-center text-sm text-gray-600 mt-12 pt-6 border-t border-gray-300">
                        <p>Issued on {{ now()->format('F d, Y') }}</p>
                        <p class="mt-2">San Jose de Dios Parish Church</p>
                    </div>
                </div>
            </div>

            <!-- Record Details (hidden in print) -->
            <div class="mt-6 bg-white rounded-lg shadow p-6 print:hidden">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Record Details</h3>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-gray-600">Record ID:</span>
                        <span class="font-semibold text-gray-900 ml-2">#{{ $confirmation->id }}</span>
                    </div>
                    <div>
                        <span class="text-gray-600">Created:</span>
                        <span class="font-semibold text-gray-900 ml-2">{{ $confirmation->created_at->format('M d, Y') }}</span>
                    </div>
                    <div>
                        <span class="text-gray-600">Last Updated:</span>
                        <span class="font-semibold text-gray-900 ml-2">{{ $confirmation->updated_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        .bg-white.rounded-lg.shadow-lg,
        .bg-white.rounded-lg.shadow-lg * {
            visibility: visible;
        }
        .bg-white.rounded-lg.shadow-lg {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            box-shadow: none;
            border-radius: 0;
        }
        .print\:hidden {
            display: none !important;
        }
    }
</style>
@endsection
