@extends('secretary.shell')

@section('secretary-content')
<div class="pt-16 min-h-screen bg-gray-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Edit Wedding Record</h1>
            <p class="text-gray-600 mt-1">Update the details of the marriage</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="{{ route('secretary.wedding.update', $wedding) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Basic Information Section -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b pb-2">
                        <i class="fas fa-info-circle text-pink-600 mr-2"></i>Basic Information
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Year -->
                        <div>
                            <label for="year" class="block text-sm font-medium text-gray-700 mb-1">
                                Year <span class="text-red-500">*</span>
                            </label>
                            <input type="number"
                                   name="year"
                                   id="year"
                                   value="{{ old('year', $wedding->year) }}"
                                   min="1900"
                                   max="{{ now()->year + 1 }}"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            @error('year')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Date of Marriage -->
                        <div>
                            <label for="date_of_marriage" class="block text-sm font-medium text-gray-700 mb-1">
                                Date of Marriage <span class="text-red-500">*</span>
                            </label>
                            <input type="date"
                                   name="date_of_marriage"
                                   id="date_of_marriage"
                                   value="{{ old('date_of_marriage', $wedding->date_of_marriage->format('Y-m-d')) }}"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            @error('date_of_marriage')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Husband Information Section -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b pb-2">
                        <i class="fas fa-male text-pink-600 mr-2"></i>Husband Information
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Husband Name -->
                        <div class="md:col-span-2">
                            <label for="husband_name" class="block text-sm font-medium text-gray-700 mb-1">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="husband_name"
                                   id="husband_name"
                                   value="{{ old('husband_name', $wedding->husband_name) }}"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            @error('husband_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Husband Age -->
                        <div>
                            <label for="husband_age" class="block text-sm font-medium text-gray-700 mb-1">
                                Age <span class="text-red-500">*</span>
                            </label>
                            <input type="number"
                                   name="husband_age"
                                   id="husband_age"
                                   value="{{ old('husband_age', $wedding->husband_age) }}"
                                   min="1"
                                   max="150"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            @error('husband_age')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Husband Status -->
                        <div>
                            <label for="husband_status" class="block text-sm font-medium text-gray-700 mb-1">
                                Civil Status <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="husband_status"
                                   id="husband_status"
                                   value="{{ old('husband_status', $wedding->husband_status) }}"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            @error('husband_status')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Husband Parents -->
                        <div class="md:col-span-2">
                            <label for="husband_parents" class="block text-sm font-medium text-gray-700 mb-1">
                                Parents <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="husband_parents"
                                   id="husband_parents"
                                   value="{{ old('husband_parents', $wedding->husband_parents) }}"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            @error('husband_parents')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Wife Information Section -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b pb-2">
                        <i class="fas fa-female text-pink-600 mr-2"></i>Wife Information
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Wife Name -->
                        <div class="md:col-span-2">
                            <label for="wife_name" class="block text-sm font-medium text-gray-700 mb-1">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="wife_name"
                                   id="wife_name"
                                   value="{{ old('wife_name', $wedding->wife_name) }}"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            @error('wife_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Wife Age -->
                        <div>
                            <label for="wife_age" class="block text-sm font-medium text-gray-700 mb-1">
                                Age <span class="text-red-500">*</span>
                            </label>
                            <input type="number"
                                   name="wife_age"
                                   id="wife_age"
                                   value="{{ old('wife_age', $wedding->wife_age) }}"
                                   min="1"
                                   max="150"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            @error('wife_age')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Wife Status -->
                        <div>
                            <label for="wife_status" class="block text-sm font-medium text-gray-700 mb-1">
                                Civil Status <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="wife_status"
                                   id="wife_status"
                                   value="{{ old('wife_status', $wedding->wife_status) }}"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            @error('wife_status')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Wife Parents -->
                        <div class="md:col-span-2">
                            <label for="wife_parents" class="block text-sm font-medium text-gray-700 mb-1">
                                Parents <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="wife_parents"
                                   id="wife_parents"
                                   value="{{ old('wife_parents', $wedding->wife_parents) }}"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            @error('wife_parents')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Location and Additional Details Section -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b pb-2">
                        <i class="fas fa-map-marker-alt text-pink-600 mr-2"></i>Location & Additional Details
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Municipality -->
                        <div>
                            <label for="municipality" class="block text-sm font-medium text-gray-700 mb-1">
                                Municipality <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="municipality"
                                   id="municipality"
                                   value="{{ old('municipality', $wedding->municipality) }}"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            @error('municipality')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Barangay -->
                        <div>
                            <label for="barangay" class="block text-sm font-medium text-gray-700 mb-1">
                                Barangay <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="barangay"
                                   id="barangay"
                                   value="{{ old('barangay', $wedding->barangay) }}"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            @error('barangay')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Sponsor 1 -->
                        <div>
                            <label for="sponsor1" class="block text-sm font-medium text-gray-700 mb-1">
                                Sponsor 1 <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="sponsor1"
                                   id="sponsor1"
                                   value="{{ old('sponsor1', $wedding->sponsor1) }}"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            @error('sponsor1')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Sponsor 2 -->
                        <div>
                            <label for="sponsor2" class="block text-sm font-medium text-gray-700 mb-1">
                                Sponsor 2 <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="sponsor2"
                                   id="sponsor2"
                                   value="{{ old('sponsor2', $wedding->sponsor2) }}"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            @error('sponsor2')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Place of Sponsor -->
                        <div>
                            <label for="place_of_sponsor" class="block text-sm font-medium text-gray-700 mb-1">
                                Place of Sponsor <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="place_of_sponsor"
                                   id="place_of_sponsor"
                                   value="{{ old('place_of_sponsor', $wedding->place_of_sponsor) }}"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            @error('place_of_sponsor')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Presider -->
                        <div>
                            <label for="presider" class="block text-sm font-medium text-gray-700 mb-1">
                                Presider <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="presider"
                                   id="presider"
                                   value="{{ old('presider', $wedding->presider) }}"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            @error('presider')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end gap-4 pt-4 border-t">
                    <a href="{{ route('secretary.wedding.index') }}"
                       class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow transition duration-150">
                        <i class="fas fa-times mr-2"></i>Cancel
                    </a>
                    <button type="submit"
                            class="px-6 py-2 bg-pink-600 hover:bg-pink-700 text-white font-semibold rounded-lg shadow transition duration-150">
                        <i class="fas fa-save mr-2"></i>Update Record
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
