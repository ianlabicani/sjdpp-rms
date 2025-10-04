@extends('secretary.shell')

@section('title', 'Wedding Record Details')

@section('secretary-content')
<div class="pt-16 min-h-screen bg-gray-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Action Buttons (hidden in print) -->
        <div class="flex justify-between items-center mb-6 print:hidden">
            <a href="{{ route('secretary.wedding.index') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow transition duration-150">
                <i class="fas fa-arrow-left mr-2"></i>Back to List
            </a>
            <div class="flex gap-2">
                <a href="{{ route('secretary.wedding.edit', $wedding) }}"
                   class="inline-flex items-center px-4 py-2 bg-pink-600 hover:bg-pink-700 text-white font-semibold rounded-lg shadow transition duration-150">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <button onclick="window.print()"
                        class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow transition duration-150">
                    <i class="fas fa-print mr-2"></i>Print
                </button>
            </div>
        </div>

        <!-- Certificate -->
        <div class="bg-white rounded-lg shadow-lg p-12 border-4 border-double border-pink-600">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="mb-4">
                    <i class="fas fa-heart text-6xl text-pink-600"></i>
                </div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Certificate of Marriage</h1>
                <div class="w-32 h-1 bg-pink-600 mx-auto"></div>
            </div>

            <!-- Certificate Content -->
            <div class="space-y-6 text-gray-800">
                <!-- Year -->
                <div class="text-center">
                    <p class="text-xl font-semibold text-pink-600">Year {{ $wedding->year }}</p>
                </div>

                <!-- Introduction -->
                <div class="text-center text-lg leading-relaxed">
                    <p>This is to certify that the sacrament of</p>
                    <p class="text-2xl font-bold text-pink-600 my-2">HOLY MATRIMONY</p>
                    <p>was celebrated between</p>
                </div>

                <!-- Couple Names -->
                <div class="bg-pink-50 p-6 rounded-lg border-2 border-pink-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Husband -->
                        <div class="text-center">
                            <p class="text-sm font-semibold text-gray-600 mb-2">HUSBAND</p>
                            <p class="text-2xl font-bold text-gray-900 mb-2">{{ $wedding->husband_name }}</p>
                            <div class="text-sm text-gray-700 space-y-1">
                                <p><span class="font-semibold">Age:</span> {{ $wedding->husband_age }}</p>
                                <p><span class="font-semibold">Status:</span> {{ $wedding->husband_status }}</p>
                                <p><span class="font-semibold">Parents:</span> {{ $wedding->husband_parents }}</p>
                            </div>
                        </div>

                        <!-- Wife -->
                        <div class="text-center">
                            <p class="text-sm font-semibold text-gray-600 mb-2">WIFE</p>
                            <p class="text-2xl font-bold text-gray-900 mb-2">{{ $wedding->wife_name }}</p>
                            <div class="text-sm text-gray-700 space-y-1">
                                <p><span class="font-semibold">Age:</span> {{ $wedding->wife_age }}</p>
                                <p><span class="font-semibold">Status:</span> {{ $wedding->wife_status }}</p>
                                <p><span class="font-semibold">Parents:</span> {{ $wedding->wife_parents }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Marriage Details -->
                <div class="text-center text-lg leading-relaxed">
                    <p>on</p>
                    <p class="text-xl font-semibold text-pink-600 mt-2">
                        {{ $wedding->date_of_marriage->format('F d, Y') }}
                    </p>
                    <p class="mt-4">at</p>
                    <p class="text-lg font-semibold text-gray-900">
                        {{ $wedding->municipality }}, {{ $wedding->barangay }}
                    </p>
                </div>

                <!-- Sponsors and Presider -->
                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                        <div>
                            <p class="font-semibold text-gray-700 mb-1">Principal Sponsors:</p>
                            <p class="text-gray-900">{{ $wedding->sponsor1 }}</p>
                            <p class="text-gray-900">{{ $wedding->sponsor2 }}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-700 mb-1">Place of Sponsor:</p>
                            <p class="text-gray-900">{{ $wedding->place_of_sponsor }}</p>
                        </div>
                    </div>
                </div>

                <!-- Presider -->
                <div class="text-center mt-8">
                    <p class="text-sm font-semibold text-gray-700 mb-1">Presiding Minister:</p>
                    <p class="text-xl font-semibold text-gray-900">{{ $wedding->presider }}</p>
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
                    <span class="font-semibold text-gray-900 ml-2">#{{ $wedding->id }}</span>
                </div>
                <div>
                    <span class="text-gray-600">Created:</span>
                    <span class="font-semibold text-gray-900 ml-2">{{ $wedding->created_at->format('M d, Y') }}</span>
                </div>
                <div>
                    <span class="text-gray-600">Last Updated:</span>
                    <span class="font-semibold text-gray-900 ml-2">{{ $wedding->updated_at->format('M d, Y') }}</span>
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
