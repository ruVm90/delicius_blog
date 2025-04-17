<header class="bg-gray-200 font-semibold my-10 mx-20 text-yellow-500 rounded-md shadow">
    <div class="px-6 py-5">
        <div class="flex items-center justify-between">

            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}">
                    <h1 class="text-2xl font-extrabold text-yellow-600">My Delicious Blog</h1>
                </a>
            </div>

            <!-- Menú de navegación -->
            <nav class="hidden lg:flex items-center space-x-20 text-xl">
                <a href="{{ route('dashboard') }}" class="hover:text-yellow-300 transition-all">Mis recetas</a>
                <a href="{{ route('recipe.index') }}" class="hover:text-yellow-300 transition-all">Explorar recetas</a>
                <a href="{{ route('category.index') }}" class="hover:text-yellow-300 transition-all">Categorías</a>

                <a href="{{ route('recipe.create') }}"
                   class="bg-yellow-500 hover:bg-yellow-400 text-black py-2 px-6 rounded-full text-lg transition-all">
                    Crear receta
                </a>
            </nav>

            <!-- Buscador + Usuario -->
            <div class="flex items-center space-x-6">

                <form action="#" method="GET" class="relative flex items-center">
                    @csrf
                    <div class="relative w-48 sm:w-64">
                        <input id="q" name="q" type="search" placeholder="Buscar receta..." 
                               onkeyup="mostrarSugerencias(this.value)" autocomplete="off"
                               class="w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-3 leading-5 placeholder-gray-500 focus:border-yellow-500 focus:outline-none focus:ring-1 focus:ring-yellow-500 text-sm">
                        
                        <!-- Sugerencias -->
                        <div id="sugerencias" class="absolute z-10 bg-white w-full border border-gray-300 rounded-md shadow-md mt-1 hidden max-h-60 overflow-y-auto"></div>
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
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
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
    
    // Si no se pulsa nada o no es un string se limpia el campo
    if (str.length === 0 || typeof str !== 'string') {
        listaSugerencias.innerHTML = "";
        listaSugerencias.classList.add('hidden');
        return;
    } else {
        // Cuando cambia el estado de la solicitud
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let respuesta = JSON.parse(request.responseText);
                listaSugerencias.innerHTML = "";
                
                if (respuesta.length > 0) {
                    let html = '';
                    for (let i = 0; i < respuesta.length; i++) {
                        html += `
                            <div class="px-3 py-2 hover:bg-yellow-100 cursor-pointer text-sm"
                                 onclick="seleccionarSugerencia('${respuesta[i]}')">
                                 ${respuesta[i].title}
                            </div>`;
                    }
                    listaSugerencias.innerHTML = html;
                    listaSugerencias.classList.remove('hidden');
                } else {
                    listaSugerencias.innerHTML = "<div class='px-3 py-2 text-sm text-gray-500'>No se encontraron coincidencias</div>";
                    listaSugerencias.classList.remove('hidden');
                }
            }
        };
         
        // Aquí es donde la búsqueda se hace. La URL debe tener la ruta correcta.
        request.withCredentials = true;
        request.open("GET", "/dashboard/sugerencias?q="  + str.toLowerCase() , true);
        request.send();
        console.log(str);
        console.log("Tipo de str:", typeof str);
    }
}

// Este método se encarga de rellenar el input cuando se selecciona una sugerencia
function seleccionarSugerencia(recipeTitle) {
    // Rellenamos el input con el título seleccionado
    document.getElementById('q').value = recipeTitle;

    
}


</script>