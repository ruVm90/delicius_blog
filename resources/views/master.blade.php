<!--- Plantilla maestra de la que todas heredaran -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Delicious Blog') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Componente HEADER -->
    @include('layouts._navigation')
    <div class="min-h-screen mt-10 bg-gray-200 mx-20 rounded-md">

        <!-- Si existe un mensaje en la sesion con la key status, lo muestra -->
        @if(session('status'))
        {{ session('status')}}
        @endif
        @if(session('status-category'))
        {{ session('status-category')}}
        @endif

        <!-- Page Content -->
        <main>
             
            @yield('content')
            
        </main>
    </div>
    <!-- Footer -->
    <footer class="bg-gray-200 font-semibold my-10 mx-20 text-yellow-500 py-6 text-center">
        <p>&copy; 2025 MY Delicius Blog. Todos los derechos reservados.</p>
        <p>Síguenos en <a href="#" class="underline">Redes Sociales</a></p>
    </footer>
</body>

</html>