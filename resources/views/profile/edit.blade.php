<x-admin-layout>
    <x-slot name="header">
        Profile Settings
    </x-slot>

    <div class="space-y-6">

        <div class="bg-white p-6 rounded-lg shadow-lg">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            @include('profile.partials.update-password-form')
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            @include('profile.partials.delete-user-form')
        </div>

    </div>
</x-admin-layout>
