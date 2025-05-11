<!-- Componente de recetas en formato tarjeta, 
    recibira la variable recipe -->
    @props(['recipe'])

    <div class="bg-white rounded-md shadow w-full h-[500px] flex flex-col">
        <header class="p-4 flex justify-between items-center">
            <h3 class="uppercase text-xl font-bold truncate">{{ $recipe->title }}</h3>
    
            <!-- Imagen del usuario -->
            <div class="flex items-center space-x-2">  <!-- Contenedor de la imagen y el nombre -->
                <img class="  rounded-full object-cover" src="/assets/img/user-img/user-icon.png" alt="User Icon"/>
                <a href="{{ route('recipe.user' , $recipe->user) }}" class="uppercase font-bold text-md text-yellow-500 hover:underline">
                    {{ $recipe->user->name }}
                </a>
            </div>
        </header>
    
        <section class="h-64 overflow-hidden bg-gray-100">
            @if($recipe->image)
                <img src="{{ asset('storage/' . $recipe->image) }}" class="w-full h-full object-cover" />
            @else
                <div 
            class="w-full h-64 flex items-center justify-center border border-dashed border-gray-300 rounded-2xl text-gray-800 text-2xl font-bold backdrop-blur-sm bg-cover bg-center"
            style="background-image: linear-gradient(rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.4)), url('/assets/welcome/Portada_blog.png');"
        >
            Sin imagen disponible
        </div>
            @endif
        </section>
    
    
        <div class="p-4">
            <p class="text-lg text-gray-600">Categoría: {{ $recipe->category->category_name }}</p>
            <p class="text-lg text-gray-600">Dificultad: {{ $recipe->difficulty }}</p>
            <p class="text-lg text-gray-600">Ultima vez actualizada: {{ \Carbon\Carbon::parse($recipe->updated_at)->diffForHumans() }}</p>
        </div>
    
        <footer class="m-auto p-4 bg-yellow-500 hover:bg-yellow-400 text-black py-2 px-6 rounded-full text-lg transition-all">
            
            <a href="{{ route('recipe.show', $recipe) }}" class="uppercase font-bold text-lg text-black ">
                Ver receta
            </a>
        </footer>
    </div>
    