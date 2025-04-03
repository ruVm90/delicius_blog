<!-- Header Section -->
<header class="bg-gray-200 font-semibold my-10 mx-20 text-yellow-500">
    <div class="mx-4 px-4 sm:px-6 lg:px-8 p-5 ">
        <div class="flex items-center justify-between ">

            <!-- Logo Section -->
            <div class="shrink-0 ml-15 max-w-md flex items-center justify-between bg-gray-300 rounded-lg">
                <a href="{{ route('dashboard') }}">
                    <img src="/assets/img/Logo.png" class="block h-full w-sm fill-current" />
                </a>
                <!-- Title Section -->
                {{-- <div class=" font-mono text-4xl  ml-5 text-gray-800">
                    My Delicious Blog
                </div> --}}
            </div>

            <!-- Navigation Menu -->
            <nav class="hidden md:flex space-x-20 text-xl ">
                <a href="{{ route('dashboard')}}" class="hover:text-yellow-300 transition-all">Mis recetas</a>
                <a href="{{ route("recipe.index")}}" class="hover:text-yellow-300 transition-all">Explorar recetas</a>
                <a href="{{ route("category.index")}}" class="hover:text-yellow-300 transition-all">Categorias</a>

            </nav>

            <!-- Call-to-Action Button -->
            <div class="flex  w-80 items-center justify-between">
                <a href="{{ route("recipe.create") }}"
                    class="bg-yellow-500 hover:bg-yellow-400 text-black py-2 px-6 rounded-full text-lg transition-all">
                    Crear receta
                </a>
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  bg-white  hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div class="text-lg font-bold">{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Mi perfil') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Mobile Menu Button (for smaller screens) -->
            <div class="md:hidden flex items-center">
                <button id="menu-button" class="text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="md:hidden mt-5 hidden space-y-4">
            <a href="#" class="block text-lg hover:text-gray-300 transition-all">Home</a>
            <a href="#services" class="block text-lg hover:text-gray-300 transition-all">Services</a>
            <a href="#about" class="block text-lg hover:text-gray-300 transition-all">About Us</a>
            <a href="#contact" class="block text-lg hover:text-gray-300 transition-all">Contact</a>
        </div>
    </div>
</header>

<script>
    // Mobile Menu Toggle
    const menuButton = document.getElementById('menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    menuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>