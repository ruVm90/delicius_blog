<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" >
        @csrf

        <!-- Nombre de usuario -->
        <div>
            <x-input-label for="name" :value="__('Nombre de usuario')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>


        
        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full " type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        
        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Cornfirmar contraseña -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600  hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 " href="{{ route('login') }}">
                {{ __('Ya estoy registrado') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrarme') }}
            </x-primary-button>
            @if (Auth::check() && !Auth::user()->hasVerifiedEmail())
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <div class="mt-4 text-sm text-gray-600">
            {{ __('¿No has recibido el correo de verificación?') }}
            <button type="submit" class="underline text-sm text-blue-600 hover:text-blue-800 ml-2">
                {{ __('Reenviar verificación') }}
            </button>
        </div>
    </form>
@endif

        </div>
    </form>
</x-guest-layout>
