<header class="bg-gray-200 font-semibold my-10 mx-20 text-yellow-500 rounded-md shadow">
    <div class="px-6 py-5">
        <div class="flex items-center justify-between">

            <!-- Logo + Nombre -->
            <div class="flex items-center space-x-3">
                <svg class="w-8 h-8 text-yellow-500" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor">
                    <path
                        d="M6.33,18.45v8.59c0,.41,.34,.75,.75,.75h15.13c.41,0,.75-.34,.75-.75v-8.6c1.91-.75,3.27-2.6,3.27-4.77,0-2.83-2.3-5.13-5.13-5.13-.56,0-1.13,.1-1.67,.28-1.2-1.87-3.24-3.01-5.49-3.01s-4.09,1.02-5.31,2.75c-3.06-.27-5.56,2.14-5.56,5.11,0,2.17,1.36,4.02,3.27,4.77Zm1.5,7.84v-1.87h13.63v1.87H7.83Zm13.63-7.48v4.11H7.83v-4.11h13.63ZM8.19,10.05c.18,0,.36,.02,.56,.05,1.72,.33,2.97,1.83,2.97,3.57,0,.41,.34,.75,.75,.75s.75-.34,.75-.75c0-2.05-1.23-3.85-3.04-4.67,.94-1.07,2.29-1.7,3.74-1.7,1.91,0,3.64,1.07,4.5,2.79,.09,.18,.25,.31,.43,.38,.19,.06,.39,.05,.57-.04,.52-.26,1.09-.4,1.65-.4,2,0,3.63,1.63,3.63,3.63s-1.63,3.63-3.63,3.63H8.19c-2,0-3.63-1.63-3.63-3.63s1.63-3.63,3.63-3.63Z">
                    </path>
                </svg>

                <a href="{{ route('dashboard') }}">
                    <h1
                        class="text-3xl md:text-4xl font-[Pacifico] font-extrabold text-yellow-600 tracking-tight hover:scale-105 transition-transform">
                        My Delicious Blog
                    </h1>
                </a>
            </div>

            <!-- Menú de navegación -->
            <nav class="hidden lg:flex items-center space-x-20 text-xl">
                <a href="{{ route('dashboard') }}" class="hover:text-yellow-300 transition-all">Mis recetas</a>
                <a href="{{ route('recipe.index') }}" class="hover:text-yellow-300 transition-all">Explorar recetas</a>
                <a href="{{ route('category.index') }}" class="hover:text-yellow-300 transition-all">Categorías</a>

                <a href="{{ route('recipe.create') }}"
                    class="bg-yellow-500 hover:bg-yellow-400  text-black py-2 px-6 rounded-full text-lg transition-all">
                    Crear receta
                </a>
            </nav>

            <!-- Buscador + Usuario -->
            <div class="flex items-center space-x-6">

                <form action="#" method="GET" class="relative flex items-center">

                    <div class="relative w-48 sm:w-64">
                        <input id="q" name="q" type="search" placeholder="Buscar receta..."
                            onkeyup="mostrarSugerencias(this.value)" autocomplete="off"
                            class="w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-3 leading-5 placeholder-gray-500 focus:border-yellow-500 focus:outline-none focus:ring-1 focus:ring-yellow-500 text-sm">

                        <!-- Sugerencias -->
                           <div id="sugerencias"
                            class="absolute z-10 bg-white w-full border border-gray-300 rounded-md shadow-md mt-1 hidden max-h-60 overflow-y-auto">
                           </div>
                        
                    </div>
                    <button type="submit"
                        class="ml-2 bg-yellow-500 hover:bg-yellow-400 text-white px-4 py-2 rounded-md text-sm">
                        Buscar
                    </button>
                </form>



                <!-- Dropdown de usuario -->
                <div class="hidden sm:flex items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 transition">
                                <div class="text-lg font-bold">{{ Auth::user()->name }}</div>
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20" stroke="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Mi perfil') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
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

    function mostrarSugerencias(str) {
    let request = new XMLHttpRequest();
    let listaSugerencias = document.getElementById('sugerencias');

    if (str.length === 0 || typeof str !== 'string') {
        listaSugerencias.innerHTML = "";
        listaSugerencias.classList.add('hidden');
        return;
    }

    request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let respuesta = JSON.parse(request.responseText);
            listaSugerencias.innerHTML = "";

            if (respuesta.length > 0) {
                let html = '';
                for (let i = 0; i < respuesta.length; i++) {
                    let recipeId = respuesta[i].id;
                    let recipeTitle = respuesta[i].title.replace(/'/g, "\\'");

                    html += `
                        <div class="px-3 py-2 hover:bg-yellow-100 cursor-pointer text-sm"
                             onclick="seleccionarSugerencia('${recipeTitle}', ${recipeId})">
                            ${respuesta[i].title}
                        </div>`;
                }
                listaSugerencias.innerHTML = html;
                listaSugerencias.classList.remove('hidden');
            } else {
                listaSugerencias.innerHTML =
                    "<div class='px-3 py-2 text-sm text-gray-500'>No se encontraron coincidencias</div>";
                listaSugerencias.classList.remove('hidden');
            }
        }
    };

    request.withCredentials = true;
    request.open("GET", "/dashboard/sugerencias?q=" + encodeURIComponent(str.toLowerCase()), true);
    request.send();
}


    // Este método se encarga de rellenar el input cuando se selecciona una sugerencia
    function seleccionarSugerencia(recipeTitle, recipeId) {
    document.getElementById('q').value = recipeTitle;
    document.getElementById('sugerencias').classList.add('hidden');

    // Redirige directamente a la receta
    window.location.href = "/dashboard/recipe/" + recipeId;
}

</script>
