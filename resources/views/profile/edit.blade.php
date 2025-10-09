@if(auth()->user()->hasRole('secretary'))
    @extends('secretary.shell')
    @section('title', 'Profile Settings')
    @section('secretary-content')
@elseif(auth()->user()->hasRole('priest'))
    @extends('priest.shell')
    @section('title', 'Profile Settings')
    @section('priest-content')
@endif

    <div class="pt-16 min-h-screen bg-gray-50">
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Page Header -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Profile Settings</h1>
                    <p class="text-gray-600 mt-2">Manage your account information and preferences</p>
                </div>

                <div class="space-y-6">
                    <!-- Profile Information Card -->
                    <div class="bg-white rounded-lg shadow-md p-6 sm:p-8">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <!-- Update Password Card -->
                    <div class="bg-white rounded-lg shadow-md p-6 sm:p-8">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <!-- Delete Account Card -->
                    <div class="bg-white rounded-lg shadow-md p-6 sm:p-8">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@if(auth()->user()->hasRole('secretary'))
    @endsection
@elseif(auth()->user()->hasRole('priest'))
    @endsection
@endif
