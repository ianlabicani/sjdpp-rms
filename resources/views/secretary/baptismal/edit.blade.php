@extends('secretary.shell')

@section('title', 'Edit Baptism Record')

@section('secretary-content')

    <!-- Main Content -->
    <div class="pt-16 min-h-screen bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center mb-4">
                    <a href="{{ route('secretary.baptismal.index') }}" class="text-blue-600 hover:text-blue-800 mr-4">
                        <i class="fas fa-arrow-left text-xl"></i>
                    </a>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Edit Baptism Record</h1>
                        <p class="text-gray-600 mt-2">Update Baptism certificate record</p>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-md p-8">
                <form action="{{ route('secretary.baptismal.update', $baptismal) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <!-- Personal Information Section -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                            <i class="fas fa-user mr-2 text-blue-600"></i>Personal Information
                        </h3>

                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="md:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name', $baptismal->name) }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('name') border-red-500 @enderror">
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Birth Date -->
                            <div>
                                <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-2">Birth Date <span class="text-red-500">*</span></label>
                                <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $baptismal->birth_date?->format('Y-m-d')) }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('birth_date') border-red-500 @enderror">
                                @error('birth_date')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Baptism Date -->
                            <div>
                                <label for="baptism_date" class="block text-sm font-medium text-gray-700 mb-2">Baptism Date <span class="text-red-500">*</span></label>
                                <input type="date" id="baptism_date" name="baptism_date" value="{{ old('baptism_date', $baptismal->baptism_date?->format('Y-m-d')) }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('baptism_date') border-red-500 @enderror">
                                @error('baptism_date')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Parents Information Section -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                            <i class="fas fa-users mr-2 text-green-600"></i>Parents Information
                        </h3>

                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Father's Name -->
                            <div>
                                <label for="fathers_name" class="block text-sm font-medium text-gray-700 mb-2">Father's Name <span class="text-red-500">*</span></label>
                                <input type="text" id="fathers_name" name="fathers_name" value="{{ old('fathers_name', $baptismal->fathers_name) }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('fathers_name') border-red-500 @enderror">
                                @error('fathers_name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Mother's Name -->
                            <div>
                                <label for="mothers_name" class="block text-sm font-medium text-gray-700 mb-2">Mother's Name <span class="text-red-500">*</span></label>
                                <input type="text" id="mothers_name" name="mothers_name" value="{{ old('mothers_name', $baptismal->mothers_name) }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('mothers_name') border-red-500 @enderror">
                                @error('mothers_name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Baptism Details Section -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                            <i class="fas fa-church mr-2 text-purple-600"></i>Baptism Details
                        </h3>

                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Church Name -->
                            <div class="md:col-span-2">
                                <label for="church_name" class="block text-sm font-medium text-gray-700 mb-2">Church Name <span class="text-red-500">*</span></label>
                                <input type="text" id="church_name" name="church_name" value="{{ old('church_name', $baptismal->church_name) }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('church_name') border-red-500 @enderror">
                                @error('church_name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Sponsor -->
                            <div>
                                <label for="sponsor" class="block text-sm font-medium text-gray-700 mb-2">Primary Sponsor <span class="text-red-500">*</span></label>
                                <input type="text" id="sponsor" name="sponsor" value="{{ old('sponsor', $baptismal->sponsor) }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('sponsor') border-red-500 @enderror">
                                @error('sponsor')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Secondary Sponsor -->
                            <div>
                                <label for="secondary_sponsor" class="block text-sm font-medium text-gray-700 mb-2">Secondary Sponsor</label>
                                <input type="text" id="secondary_sponsor" name="secondary_sponsor" value="{{ old('secondary_sponsor', $baptismal->secondary_sponsor) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('secondary_sponsor') border-red-500 @enderror"
                                       placeholder="Optional">
                                @error('secondary_sponsor')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Priest Name -->
                            <div class="md:col-span-2">
                                <label for="priest_name" class="block text-sm font-medium text-gray-700 mb-2">Officiating Priest <span class="text-red-500">*</span></label>
                                <input type="text" id="priest_name" name="priest_name" value="{{ old('priest_name', $baptismal->priest_name) }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('priest_name') border-red-500 @enderror">
                                @error('priest_name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Record Reference Section -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                            <i class="fas fa-book mr-2 text-orange-600"></i>Record Reference
                        </h3>

                        <div class="grid md:grid-cols-3 gap-6">
                            <!-- Book Number -->
                            <div>
                                <label for="book_number" class="block text-sm font-medium text-gray-700 mb-2">Book Number <span class="text-red-500">*</span></label>
                                <input type="number" id="book_number" name="book_number" value="{{ old('book_number', $baptismal->book_number) }}" required min="1"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('book_number') border-red-500 @enderror">
                                @error('book_number')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Page Number -->
                            <div>
                                <label for="page_number" class="block text-sm font-medium text-gray-700 mb-2">Page Number <span class="text-red-500">*</span></label>
                                <input type="number" id="page_number" name="page_number" value="{{ old('page_number', $baptismal->page_number) }}" required min="1"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('page_number') border-red-500 @enderror">
                                @error('page_number')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Line Number -->
                            <div>
                                <label for="line_number" class="block text-sm font-medium text-gray-700 mb-2">Line Number <span class="text-red-500">*</span></label>
                                <input type="number" id="line_number" name="line_number" value="{{ old('line_number', $baptismal->line_number) }}" required min="1"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('line_number') border-red-500 @enderror">
                                @error('line_number')
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
                        <a href="{{ route('secretary.baptismal.index') }}" class="flex-1 bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition font-semibold text-center">
                            <i class="fas fa-times mr-2"></i>Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
