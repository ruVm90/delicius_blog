@extends('master')
@section('content')
        <h2 class="font-bold text-3xl text-gray-800 text-center leading-tight">
            {{ __('Mi perfil') }}
        </h2>
    

    <div class="py-12  min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- Información de perfil --}}
            <div class="bg-white shadow-md rounded-2xl p-6 sm:p-8 transition hover:shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Información del perfil</h3>
                <div class="max-w-2xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Actualizar contraseña --}}
            <div class="bg-white shadow-md rounded-2xl p-6 sm:p-8 transition hover:shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Actualizar contraseña</h3>
                <div class="max-w-2xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            
            {{-- Eliminar cuenta --}}
            <div class="bg-white shadow-md rounded-2xl p-6 sm:p-8 transition hover:shadow-lg">
                <h3 class="text-xl font-semibold text-red-600 mb-4 border-b pb-2">Eliminar cuenta</h3>
                <div class="max-w-2xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

@endsection