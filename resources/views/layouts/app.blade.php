<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col">
        {{-- Navegación superior --}}
        @include('layouts._navigation')

        {{-- Cabecera de página --}}
        @isset($header)
            <header class="bg-white shadow-sm border-b border-gray-200 mx-20 rounded-md">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-bold text-gray-900">
                        {{ $header }}
                    </h1>
                </div>
            </header>
        @endisset

        {{-- Contenido principal --}}
        <main class="flex-grow">
            {{ $slot }}
        </main>

        {{-- Footer opcional (si lo deseas) --}}
        {{-- <footer class="bg-white text-center py-4 text-sm text-gray-500">
            &copy; {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
        </footer> --}}
    </div>
</body>
</html>
