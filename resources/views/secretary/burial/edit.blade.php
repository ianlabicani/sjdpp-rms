@extends('secretary.shell')

@section('title', 'Edit Funeral Record')

@section('secretary-content')

    <!-- Main Content -->
    <div class="pt-16 min-h-screen bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center mb-4">
                    <a href="{{ route('secretary.burial.index') }}" class="text-blue-600 hover:text-blue-800 mr-4">
                        <i class="fas fa-arrow-left text-xl"></i>
                    </a>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Edit Funeral Record</h1>
                        <p class="text-gray-600 mt-2">Update funeral certificate record</p>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-md p-8">
                <form action="{{ route('secretary.burial.update', $burial) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <!-- Deceased Information Section -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                            <i class="fas fa-user mr-2 text-blue-600"></i>Deceased Information
                        </h3>

                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="md:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name', $burial->name) }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Age -->
                            <div>
                                <label for="age" class="block text-sm font-medium text-gray-700 mb-2">Age <span class="text-red-500">*</span></label>
                                <input type="number" id="age" name="age" value="{{ old('age', $burial->age) }}" required min="0"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                @error('age')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Civil Status <span class="text-red-500">*</span></label>
                                <select id="status" name="status" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                    <option value="">Select Status</option>
                                    <option value="Single" {{ old('status', $burial->status) == 'Single' ? 'selected' : '' }}>Single</option>
                                    <option value="Married" {{ old('status', $burial->status) == 'Married' ? 'selected' : '' }}>Married</option>
                                    <option value="Widowed" {{ old('status', $burial->status) == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                    <option value="Separated" {{ old('status', $burial->status) == 'Separated' ? 'selected' : '' }}>Separated</option>
                                </select>
                                @error('status')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Date of Death -->
                            <div>
                                <label for="date_of_death" class="block text-sm font-medium text-gray-700 mb-2">Date of Death <span class="text-red-500">*</span></label>
                                <input type="date" id="date_of_death" name="date_of_death" value="{{ old('date_of_death', $burial->date_of_death?->format('Y-m-d')) }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                @error('date_of_death')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Date of Burial -->
                            <div>
                                <label for="date_of_burial" class="block text-sm font-medium text-gray-700 mb-2">Date of Funeral <span class="text-red-500">*</span></label>
                                <input type="date" id="date_of_burial" name="date_of_burial" value="{{ old('date_of_burial', $burial->date_of_burial?->format('Y-m-d')) }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                @error('date_of_burial')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Burial Details Section -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                            <i class="fas fa-cross mr-2 text-purple-600"></i>Funeral Details
                        </h3>

                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Informant -->
                            <div>
                                <label for="informant" class="block text-sm font-medium text-gray-700 mb-2">Informant <span class="text-red-500">*</span></label>
                                <input type="text" id="informant" name="informant" value="{{ old('informant', $burial->informant) }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                @error('informant')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Place -->
                            <div>
                                <label for="place" class="block text-sm font-medium text-gray-700 mb-2">Place of Funeral <span class="text-red-500">*</span></label>
                                <input type="text" id="place" name="place" value="{{ old('place', $burial->place) }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                @error('place')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Presider -->
                            <div class="md:col-span-2">
                                <label for="presider" class="block text-sm font-medium text-gray-700 mb-2">Presiding Priest <span class="text-red-500">*</span></label>
                                <input type="text" id="presider" name="presider" value="{{ old('presider', $burial->presider) }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                @error('presider')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex gap-4 pt-6 border-t border-gray-200">
                        <button type="submit" class="flex-1 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                            <i class="fas fa-save mr-2"></i>Update Record
                        </button>
                        <a href="{{ route('secretary.burial.index') }}" class="flex-1 bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition font-semibold text-center">
                            <i class="fas fa-times mr-2"></i>Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
