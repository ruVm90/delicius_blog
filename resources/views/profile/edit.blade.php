<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 text-center leading-tight">
            {{ __('Mi perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-20 sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-orange-200 shadow rounded-md ">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-orange-200  shadow sm:rounded-lg rounded-md">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-orange-200  shadow sm:rounded-lg rounded-md">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
