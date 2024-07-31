<x-app-layout>
    <x-slot name="header">
    <nav class="bg-gray-800 dark:bg-gray-900 text-white py-4 w-full fixed top-0 left-0">
        <div class="container mx-auto flex items-center justify-between px-4">
            <div class="text-lg font-semibold">User Profile</div>
            <div class="space-x-4">
                <a href="{{ route('dashboard') }}" class="hover:bg-gray-700 px-4 py-2 rounded transition duration-300 ease-in-out">Dashboard</a>
            </div>
        </div>
    </nav>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
    </x-slot>
</x-app-layout>
