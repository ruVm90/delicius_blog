<!-- Pagina de bienvenida -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Delicious Blog</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">


    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <p style="color: red;">⚠️ Los archivos CSS/JS no están disponibles. Verifica que hayas ejecutado Vite.</p>
    @endif
</head>

<body class="h-screen flex flex-col bg-gray-50 text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-white shadow-md border-b border-yellow-300">
        <div class="flex items-center justify-between px-6 py-4">

            <!-- Logo + Nombre -->
            <div class="flex items-center space-x-3">
                <svg class="w-8 h-8 text-yellow-500" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor">
                    <path
                        d="M6.33,18.45v8.59c0,.41,.34,.75,.75,.75h15.13c.41,0,.75-.34,.75-.75v-8.6c1.91-.75,3.27-2.6,3.27-4.77,0-2.83-2.3-5.13-5.13-5.13-.56,0-1.13,.1-1.67,.28-1.2-1.87-3.24-3.01-5.49-3.01s-4.09,1.02-5.31,2.75c-3.06-.27-5.56,2.14-5.56,5.11,0,2.17,1.36,4.02,3.27,4.77Zm1.5,7.84v-1.87h13.63v1.87H7.83Zm13.63-7.48v4.11H7.83v-4.11h13.63ZM8.19,10.05c.18,0,.36,.02,.56,.05,1.72,.33,2.97,1.83,2.97,3.57,0,.41,.34,.75,.75,.75s.75-.34,.75-.75c0-2.05-1.23-3.85-3.04-4.67,.94-1.07,2.29-1.7,3.74-1.7,1.91,0,3.64,1.07,4.5,2.79,.09,.18,.25,.31,.43,.38,.19,.06,.39,.05,.57-.04,.52-.26,1.09-.4,1.65-.4,2,0,3.63,1.63,3.63,3.63s-1.63,3.63-3.63,3.63H8.19c-2,0-3.63-1.63-3.63-3.63s1.63-3.63,3.63-3.63Z">
                    </path>
                </svg>

                <h1
                    class="text-3xl md:text-4xl font-[Pacifico] font-extrabold text-yellow-600 tracking-tight hover:scale-105 transition-transform">
                    My Delicious Blog
                </h1>
            </div>

            <!-- Botones de Login/Register -->
            @if (Route::has('login'))
                <nav class="flex items-center space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="bg-yellow-500 hover:bg-yellow-400 text-white py-2 px-4 rounded-full text-sm font-semibold transition">
                            Mis Recetas
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="bg-yellow-500 hover:bg-yellow-400 text-white py-2 px-4 rounded-full text-sm font-semibold transition">
                            Iniciar Sesión
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="border border-yellow-500 text-yellow-600 hover:bg-yellow-100 py-2 px-4 rounded-full text-sm font-semibold transition">
                                Registrarse
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>


    <!-- Contenido principal -->
    <main class="flex-grow overflow-auto">
        <!-- Hero -->
        <section class="bg-white">
            <div class="container mx-auto px-6 py-8 text-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">¡Bienvenido a tu rincón culinario!
                </h2>
                <p class="text-md md:text-lg text-gray-600 mb-2">Descubre, comparte y guarda recetas deliciosas para
                    todos los gustos y edades.</p>
                <p class="text-md md:text-lg text-gray-600 mb-4">¿Estás listo para cocinar algo increíble?</p>
                <a href="{{ route('register') }}"
                    class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-6 rounded-full text-md transition-all transform hover:scale-105">
                    Explorar Recetas
                </a>
            </div>
        </section>

        <hr class="h-1">

        <!-- Categorías -->
        <section class="container mx-auto px-6 py-8">
            <h3 class="text-2xl font-bold text-center text-gray-800 mb-8">Categorías Populares</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($categories as $category)
                    <div
                        class="bg-white rounded-xl shadow hover:shadow-lg transition transform hover:-translate-y-1 p-4 flex flex-col items-center text-center border border-yellow-400">
                        <a href="{{ Auth::user() ? route('category.show', $category) : route('login') }}"
                            class="w-full">
                            @if ($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}"
                                    class="w-full h-32 object-cover rounded-lg mb-2"
                                    alt="{{ $category->category_name }}">
                            @else
                                <div
                                    class="w-full h-32 flex items-center justify-center bg-gray-100 rounded-lg text-gray-400 italic mb-2">
                                    Sin imagen
                                </div>
                            @endif
                        </a>
                        <h4 class="text-md font-semibold text-gray-900 uppercase mb-1">{{ $category->category_name }}
                        </h4>
                        <p class="text-sm text-gray-600">Explora más sobre esta categoría.</p>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t text-center text-sm text-gray-500 py-4">
        <p>&copy; 2025 My Delicious Blog. Todos los derechos reservados.</p>
        <p>Síguenos en <a href="#" class="underline hover:text-yellow-600">Redes Sociales</a></p>
    </footer>
</body>
