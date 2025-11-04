@extends('secretary.shell')

@section('title', 'Death Record Details')

@section('secretary-content')

    <!-- Main Content -->
    <div class="pt-16 min-h-screen bg-gray-50 print:pt-0 print:bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 print:py-0">
            <!-- Action Buttons -->
            <div class="mb-6 flex justify-between items-center print:hidden">
                <a href="{{ route('secretary.burial.index') }}" class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-arrow-left mr-2"></i>Back to List
                </a>
                <div class="flex gap-3">
                    <button onclick="window.print()" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                        <i class="fas fa-print mr-2"></i>Print Certificate
                    </button>
                    <a href="{{ route('secretary.burial.edit', $burial) }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition font-medium">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>
                    <form action="{{ route('secretary.burial.destroy', $burial) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this record?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition font-medium">
                            <i class="fas fa-trash mr-2"></i>Delete
                        </button>
                    </form>
                </div>
            </div>

            <!-- Certificate View -->
            <div class="bg-white rounded-xl shadow-lg p-12 print:shadow-none print:p-8">
                <!-- Certificate Header -->
                <div class="text-center mb-8 border-b-4 border-purple-600 pb-6">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Church Logo" class="h-24 w-24 mx-auto mb-4 rounded-full object-cover">
                    <h1 class="text-4xl font-bold text-gray-800 mb-2">SJDPP Church</h1>
                    <h2 class="text-2xl font-semibold text-purple-600 mb-4">CERTIFICATE OF DEATH</h2>
                    <p class="text-gray-600">This is to certify that</p>
                </div>

                <!-- Main Information -->
                <div class="mb-8">
                    <div class="text-center mb-8">
                        <h3 class="text-3xl font-bold text-gray-800 border-b-2 border-gray-300 inline-block pb-2 px-8">{{ $burial->name }}</h3>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8 mb-8">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div class="bg-gray-50 p-4 rounded-lg print:bg-gray-100">
                                <p class="text-sm text-gray-600 mb-1">Age at Time of Death</p>
                                <p class="text-lg font-semibold text-gray-800">{{ $burial->age }} years old</p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-lg print:bg-gray-100">
                                <p class="text-sm text-gray-600 mb-1">Civil Status</p>
                                <p class="text-lg font-semibold text-gray-800">{{ $burial->status }}</p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-lg print:bg-gray-100">
                                <p class="text-sm text-gray-600 mb-1">Date of Death</p>
                                <p class="text-lg font-semibold text-gray-800">{{ $burial->date_of_death?->format('F d, Y') }}</p>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div class="bg-gray-50 p-4 rounded-lg print:bg-gray-100">
                                <p class="text-sm text-gray-600 mb-1">Date of Burial</p>
                                <p class="text-lg font-semibold text-gray-800">{{ $burial->date_of_burial?->format('F d, Y') }}</p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-lg print:bg-gray-100">
                                <p class="text-sm text-gray-600 mb-1">Place of Burial</p>
                                <p class="text-lg font-semibold text-gray-800">{{ $burial->place }}</p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-lg print:bg-gray-100">
                                <p class="text-sm text-gray-600 mb-1">Informant</p>
                                <p class="text-lg font-semibold text-gray-800">{{ $burial->informant }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Presider -->
                    <div class="bg-purple-50 p-6 rounded-lg text-center mb-8 print:bg-purple-100">
                        <p class="text-sm text-gray-600 mb-2">Presiding Priest</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $burial->presider }}</p>
                    </div>
                </div>

                <!-- Certificate Footer -->
                <div class="mt-12 pt-6 border-t-2 border-gray-300">
                    <div class="grid md:grid-cols-2 gap-8 text-center">
                        <div>
                            <div class="border-t-2 border-gray-800 pt-2 mt-16 inline-block px-8">
                                <p class="font-semibold text-gray-800">Secretary</p>
                            </div>
                        </div>
                        <div>
                            <div class="border-t-2 border-gray-800 pt-2 mt-16 inline-block px-8">
                                <p class="font-semibold text-gray-800">Parish Priest</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-8 text-sm text-gray-600">
                        <p>Issued on {{ now()->format('F d, Y') }}</p>
                        <p class="mt-2">SJDPP Church</p>
                    </div>
                </div>
            </div>

            <!-- Additional Details (Not Printed) -->
            <div class="mt-8 bg-white rounded-xl shadow-md p-6 print:hidden">
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    <i class="fas fa-info-circle mr-2 text-blue-600"></i>Record Information
                </h3>
                <div class="grid md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-600">Created:</p>
                        <p class="font-semibold text-gray-800">{{ $burial->created_at?->format('F d, Y g:i A') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Last Updated:</p>
                        <p class="font-semibold text-gray-800">{{ $burial->updated_at?->format('F d, Y g:i A') }}</p>
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
