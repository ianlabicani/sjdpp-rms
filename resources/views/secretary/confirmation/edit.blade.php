@extends('secretary.shell')

@section('title', 'Edit Confirmation Record')

@section('secretary-content')
    <div class="pt-16 min-h-screen bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Edit Confirmation Record</h1>
                <p class="text-gray-600 mt-1">Update the details of the confirmation</p>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <form method="POST" action="{{ route('secretary.confirmation.update', $confirmation) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information Section -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b pb-2">
                            <i class="fas fa-user text-indigo-600 mr-2"></i>Basic Information
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
                                    value="{{ old('year', $confirmation->year) }}"
                                    min="1900"
                                    max="{{ now()->year + 1 }}"
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('year') border-red-500 @enderror">
                                @error('year')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Date of Confirmation -->
                            <div>
                                <label for="date_of_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                                    Date of Confirmation <span class="text-red-500">*</span>
                                </label>
                                <input type="date"
                                    name="date_of_confirmation"
                                    id="date_of_confirmation"
                                    value="{{ old('date_of_confirmation', $confirmation->date_of_confirmation->format('Y-m-d')) }}"
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('date_of_confirmation') border-red-500 @enderror">
                                @error('date_of_confirmation')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Name -->
                            <div class="md:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    name="name"
                                    id="name"
                                    value="{{ old('name', $confirmation->name) }}"
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('name') border-red-500 @enderror">
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Baptism Information Section -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b pb-2">
                            <i class="fas fa-water text-indigo-600 mr-2"></i>Baptism Information
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Parish of Baptism -->
                            <div>
                                <label for="parish_of_baptism" class="block text-sm font-medium text-gray-700 mb-1">
                                    Parish of Baptism <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    name="parish_of_baptism"
                                    id="parish_of_baptism"
                                    value="{{ old('parish_of_baptism', $confirmation->parish_of_baptism) }}"
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('parish_of_baptism') border-red-500 @enderror">
                                @error('parish_of_baptism')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Province of Baptism -->
                            <div>
                                <label for="province_of_baptism" class="block text-sm font-medium text-gray-700 mb-1">
                                    Province of Baptism <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    name="province_of_baptism"
                                    id="province_of_baptism"
                                    value="{{ old('province_of_baptism', $confirmation->province_of_baptism) }}"
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('province_of_baptism') border-red-500 @enderror">
                                @error('province_of_baptism')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Place of Baptism -->
                            <div class="md:col-span-2">
                                <label for="place_of_baptism" class="block text-sm font-medium text-gray-700 mb-1">
                                    Place of Baptism <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    name="place_of_baptism"
                                    id="place_of_baptism"
                                    value="{{ old('place_of_baptism', $confirmation->place_of_baptism) }}"
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('place_of_baptism') border-red-500 @enderror">
                                @error('place_of_baptism')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information Section -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 border-b pb-2">
                            <i class="fas fa-info-circle text-indigo-600 mr-2"></i>Additional Information
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Parents -->
                            <div>
                                <label for="parents" class="block text-sm font-medium text-gray-700 mb-1">
                                    Parents <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    name="parents"
                                    id="parents"
                                    value="{{ old('parents', $confirmation->parents) }}"
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('parents') border-red-500 @enderror">
                                @error('parents')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Sponsor -->
                            <div>
                                <label for="sponsor" class="block text-sm font-medium text-gray-700 mb-1">
                                    Sponsor <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    name="sponsor"
                                    id="sponsor"
                                    value="{{ old('sponsor', $confirmation->sponsor) }}"
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('sponsor') border-red-500 @enderror">
                                @error('sponsor')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Name of Minister -->
                            <div class="md:col-span-2">
                                <label for="name_of_minister" class="block text-sm font-medium text-gray-700 mb-1">
                                    Name of Minister <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    name="name_of_minister"
                                    id="name_of_minister"
                                    value="{{ old('name_of_minister', $confirmation->name_of_minister) }}"
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('name_of_minister') border-red-500 @enderror">
                                @error('name_of_minister')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end gap-4 pt-4 border-t">
                        <a href="{{ route('secretary.confirmation.index') }}"
                        class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow transition duration-150">
                            <i class="fas fa-times mr-2"></i>Cancel
                        </a>
                        <button type="submit"
                                class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition duration-150">
                            <i class="fas fa-save mr-2"></i>Update Record
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
