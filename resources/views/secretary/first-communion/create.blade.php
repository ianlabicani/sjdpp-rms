@extends('secretary.shell')

@section('title', 'Create First Communion Record')

@section('secretary-content')
<div class="pt-16 min-h-screen bg-gray-50" x-data="communionForm()">
    <div class="max-w-3xl mx-auto px-3 sm:px-6 lg:px-8 py-6 sm:py-8">
        <!-- Header -->
        <div class="mb-6">
            <a href="{{ route('secretary.first-communion.index') }}" class="text-blue-600 hover:text-blue-800 text-sm sm:text-base">
                <i class="fas fa-arrow-left mr-2"></i>Back to Records
            </a>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-2">Create First Communion Record</h1>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-lg shadow-md p-4 sm:p-6">
            <form action="{{ route('secretary.first-communion.store') }}"
                  method="POST" class="space-y-6">
                @csrf

                <!-- Date Fields Section -->
                <div class="border-b border-gray-200 pb-6">
                    <h2 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4">
                        <i class="fas fa-calendar text-indigo-600 mr-2"></i>Date Information
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">
                        <!-- Year -->
                        <div>
                            <label for="year" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Year <span class="text-red-500">*</span></label>
                            <input type="number"
                                   name="year"
                                   id="year"
                                   value="{{ old('year', now()->year) }}"
                                   min="1900"
                                   max="{{ now()->year }}"
                                   required
                                   class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm @error('year') border-red-500 @enderror">
                            @error('year')
                                <p class="text-red-600 text-xs sm:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Month -->
                        <div>
                            <label for="month" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Month <span class="text-red-500">*</span></label>
                            <select name="month"
                                    id="month"
                                    required
                                    class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm @error('month') border-red-500 @enderror">
                                <option value="">Select Month</option>
                                @for($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ old('month') == $i ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::create(2024, $i, 1)->format('F') }}
                                    </option>
                                @endfor
                            </select>
                            @error('month')
                                <p class="text-red-600 text-xs sm:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Day -->
                        <div>
                            <label for="day" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Day <span class="text-red-500">*</span></label>
                            <input type="number"
                                   name="day"
                                   id="day"
                                   value="{{ old('day') }}"
                                   min="1"
                                   max="31"
                                   required
                                   class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm @error('day') border-red-500 @enderror">
                            @error('day')
                                <p class="text-red-600 text-xs sm:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Communicants Section - Collapsible -->
                <div class="border rounded-lg overflow-hidden">
                    <button type="button"
                            @click="communicantsOpen = !communicantsOpen"
                            class="w-full bg-indigo-100 hover:bg-indigo-200 p-4 sm:p-5 flex items-center justify-between transition duration-200 text-left">
                        <h2 class="text-lg sm:text-xl font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-users text-indigo-600 mr-2"></i>Communicants
                        </h2>
                        <i class="fas fa-chevron-down text-indigo-600 transition-transform duration-300" :class="{ 'rotate-180': communicantsOpen }"></i>
                    </button>

                    <div x-show="communicantsOpen" x-transition class="bg-white p-4 sm:p-6 border-t border-indigo-200">
                        <div class="space-y-4 sm:space-y-5">
                            <template x-for="(communicant, index) in communicants" :key="index">
                                <div class="bg-gray-50 p-4 sm:p-5 rounded-lg border border-gray-200 relative">
                                    <!-- Remove Button -->
                                    <button type="button"
                                            @click="removeCommunicant(index)"
                                            x-show="communicants.length > 1"
                                            class="absolute top-3 right-3 sm:top-4 sm:right-4 text-red-500 hover:text-red-700 transition">
                                        <i class="fas fa-trash text-sm sm:text-base"></i>
                                    </button>

                                    <!-- Communicant Number Badge -->
                                    <div class="mb-3 sm:mb-4">
                                        <span class="inline-block bg-indigo-100 text-indigo-800 text-xs font-semibold px-3 py-1 rounded-full">
                                            Communicant <span x-text="index + 1"></span>
                                        </span>
                                    </div>

                                    <!-- Name -->
                                    <div>
                                        <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
                                        <input type="text"
                                               :name="'names[' + index + ']'"
                                               x-model="communicant.name"
                                               required
                                               placeholder="Enter communicant name"
                                               class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm">
                                    </div>
                                </div>
                            </template>
                        </div>

                        <button type="button"
                                @click="addCommunicant()"
                                class="mt-4 inline-flex items-center px-4 sm:px-5 py-2 sm:py-2.5 bg-indigo-50 text-indigo-600 hover:bg-indigo-100 rounded-lg transition border border-indigo-200 text-sm sm:text-base font-medium">
                            <i class="fas fa-plus mr-2"></i>Add Another Communicant
                        </button>

                        @error('names')
                            <p class="text-red-600 text-xs sm:text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Parents Section - Collapsible -->
                <div class="border rounded-lg overflow-hidden">
                    <button type="button"
                            @click="parentsOpen = !parentsOpen"
                            class="w-full bg-green-100 hover:bg-green-200 p-4 sm:p-5 flex items-center justify-between transition duration-200 text-left">
                        <h2 class="text-lg sm:text-xl font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-family text-green-600 mr-2"></i>Parents
                        </h2>
                        <i class="fas fa-chevron-down text-green-600 transition-transform duration-300" :class="{ 'rotate-180': parentsOpen }"></i>
                    </button>

                    <div x-show="parentsOpen" x-transition class="bg-white p-4 sm:p-6 border-t border-green-200">
                        <div class="space-y-4 sm:space-y-5">
                            <template x-for="(parent, index) in parents" :key="index">
                                <div class="bg-gray-50 p-4 sm:p-5 rounded-lg border border-gray-200 relative">
                                    <!-- Remove Button -->
                                    <button type="button"
                                            @click="removeParent(index)"
                                            x-show="parents.length > 1"
                                            class="absolute top-3 right-3 sm:top-4 sm:right-4 text-red-500 hover:text-red-700 transition">
                                        <i class="fas fa-trash text-sm sm:text-base"></i>
                                    </button>

                                    <!-- Parent Number Badge -->
                                    <div class="mb-3 sm:mb-4">
                                        <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">
                                            Parent <span x-text="index + 1"></span>
                                        </span>
                                    </div>

                                    <!-- Name -->
                                    <div>
                                        <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
                                        <input type="text"
                                               :name="'parents[' + index + ']'"
                                               x-model="parent.name"
                                               required
                                               placeholder="Enter parent name"
                                               class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm">
                                    </div>
                                </div>
                            </template>
                        </div>

                        <button type="button"
                                @click="addParent()"
                                class="mt-4 inline-flex items-center px-4 sm:px-5 py-2 sm:py-2.5 bg-green-50 text-green-600 hover:bg-green-100 rounded-lg transition border border-green-200 text-sm sm:text-base font-medium">
                            <i class="fas fa-plus mr-2"></i>Add Another Parent
                        </button>

                        @error('parents')
                            <p class="text-red-600 text-xs sm:text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Additional Information Section -->
                <div class="border-b border-gray-200 pb-6">
                    <h2 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4">
                        <i class="fas fa-map-marker-alt text-indigo-600 mr-2"></i>Additional Information
                    </h2>

                    <div class="space-y-4 sm:space-y-5">
                        <!-- Address -->
                        <div>
                            <label for="address" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Address</label>
                            <textarea name="address"
                                      id="address"
                                      rows="2"
                                      class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm @error('address') border-red-500 @enderror">{{ old('address') }}</textarea>
                            @error('address')
                                <p class="text-red-600 text-xs sm:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Minister -->
                        <div>
                            <label for="minister" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Minister</label>
                            <input type="text"
                                   name="minister"
                                   id="minister"
                                   value="{{ old('minister') }}"
                                   class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm @error('minister') border-red-500 @enderror">
                            @error('minister')
                                <p class="text-red-600 text-xs sm:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Baptismal Date -->
                        <div>
                            <label for="baptismal_date" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Baptismal Date</label>
                            <input type="date"
                                   name="baptismal_date"
                                   id="baptismal_date"
                                   value="{{ old('baptismal_date') }}"
                                   class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm @error('baptismal_date') border-red-500 @enderror">
                            @error('baptismal_date')
                                <p class="text-red-600 text-xs sm:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Baptismal Place -->
                        <div>
                            <label for="baptismal_place" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Baptismal Place</label>
                            <input type="text"
                                   name="baptismal_place"
                                   id="baptismal_place"
                                   value="{{ old('baptismal_place') }}"
                                   class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm @error('baptismal_place') border-red-500 @enderror">
                            @error('baptismal_place')
                                <p class="text-red-600 text-xs sm:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                    <button type="submit"
                            class="flex-1 px-4 sm:px-6 py-2 sm:py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition duration-150 text-sm sm:text-base">
                        <i class="fas fa-save mr-2"></i>Create Record
                    </button>
                    <a href="{{ route('secretary.first-communion.index') }}"
                       class="flex-1 px-4 sm:px-6 py-2 sm:py-3 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow transition duration-150 text-sm sm:text-base text-center">
                        <i class="fas fa-times mr-2"></i>Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Alpine.js Script -->
<script>
    function communionForm() {
        return {
            communicants: @json(old('names', [['name' => '']])),
            parents: @json(old('parents', [['name' => '']])),
            communicantsOpen: true,
            parentsOpen: true,

            addCommunicant() {
                this.communicants.push({ name: '' });
            },

            removeCommunicant(index) {
                this.communicants.splice(index, 1);
            },

            addParent() {
                this.parents.push({ name: '' });
            },

            removeParent(index) {
                this.parents.splice(index, 1);
            },
        };
    }
</script>
@endsection
