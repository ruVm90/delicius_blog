<!-- Contenedor principal del formulario -->
<div class="max-w-2xl mx-auto p-6 bg-white rounded-xl shadow-md space-y-6">

    @csrf

    <!-- Nombre de la receta -->
    <div>
        <label for="title" class="block text-gray-700 font-semibold mb-2">Nombre de la receta:</label>
        <input type="text" name="title" placeholder="Escribe el titulo de tu receta.."
            value="{{ old('title', $recipe->title ?? '') }}"
            class="w-full border {{ $errors->has('title') ? 'border-red-400' : 'border-gray-300' }} rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500">
        @if ($errors->has('title'))
            <p class="mt-2 text-sm text-red-600">{{ $errors->first('title') }}</p>
        @endif
    </div>

    <!-- Categoría -->
    <div>
        <label for="category_id" class="block text-gray-700 font-semibold mb-2">Categoría:</label>
        <select name="category_id" id="category_id"
            class="w-full border {{ $errors->has('category_id') ? 'border-red-400' : 'border-gray-300' }} rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-yellow-500">
            <option value="">Seleccione una categoria</option>
            @foreach ($categories as $name => $id)
                <option
                    value="{{ $id }}"{{ old('category_id', $recipe->category_id ?? '') == $id ? 'selected' : '' }}>
                    {{ $name }}</option>
            @endforeach
        </select>
        @if ($errors->has('category_id'))
            <p class="mt-2 text-sm text-red-600">{{ $errors->first('category_id') }}</p>
        @endif
    </div>

    <!-- Ingredientes -->
    @php
        if (old('ingredients')) {
            // Si hay datos antiguos del formulario, úsalos
            $ingredients = collect(old('ingredients'))->map(function ($ingredient) {
                return [
                    'name' => is_array($ingredient) && isset($ingredient['name']) ? $ingredient['name'] : '',
                    'quantity' =>
                        is_array($ingredient) && isset($ingredient['quantity']) ? $ingredient['quantity'] : '',
                ];
            });
        } else {
            // Si no hay datos viejos, usa los del modelo (relación con la base de datos)
            $ingredients = $ingredients->map(function ($ingredient) {
                return [
                    'name' => $ingredient->name ?? '',
                    'quantity' => $ingredient->quantity ?? '',
                ];
            });
        }
    @endphp

    <div id="ingredients-container"
        class="bg-gray-50 {{ $errors->has('ingredients') ? ' border border-red-400' : '' }} p-4 rounded-lg">
        <label for="ingredients" class="block text-gray-700 font-semibold mb-2">Ingredientes y cantidad:</label>
        <div class="space-y-3 ">
            @foreach ($ingredients as $i => $ingredient)
                <div>
                    <div class="flex gap-2">
                        <input type="text" name="ingredients[{{ $i }}][name]" placeholder="Ingrediente"
                            value="{{ $ingredient['name'] }}"
                            class="ingredient-item w-1/2 border border-gray-300 rounded-lg px-3 py-2" />

                        <input type="text" name="ingredients[{{ $i }}][quantity]" placeholder="Cantidad"
                            value="{{ is_array($ingredient) && isset($ingredient['quantity']) ? $ingredient['quantity'] : '' }}"
                            class="w-1/2 border border-gray-300 rounded-lg px-3 py-2" />
                    </div>
                    @if ($errors->has("ingredients.$i.name"))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first("ingredients.$i.name") }}</p>
                    @endif
                    @if ($errors->has("ingredients.$i.quantity"))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first("ingredients.$i.quantity") }}</p>
                    @endif


                </div>
            @endforeach

        </div>


        <button id="add-ingredient" type="button"
            class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Añadir
            ingrediente</button>
        <button id="del-ingredient" type="button"
            class="mt-4 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Quitar ingrediente</button>

    </div>


    <!-- Imagen -->
    <div class=" {{ $errors->has('image') ? 'border-red-400' : 'border-gray-300' }}">
        <label for="image" class="block text-gray-700 font-semibold mb-2">Imagen de la receta:</label>
        @if (isset($recipe->image))
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="Imagen de la receta"
                class="w-80 h-auto mb-4 p-2 rounded">
        @endif
        <input type="file" name="image"
            class="block w-full text-sm text-gray-600
                      file:mr-4 file:py-2 file:px-4
                      file:rounded file:border-0
                      file:text-sm file:font-semibold
                      file:bg-blue-50 file:text-yellow-700
                      hover:file:bg-blue-100" />
        @if ($errors->has('image'))
            <p class="mt-2 text-sm text-red-600">{{ $errors->first('image') }}</p>
        @endif
    </div>

    <!-- Descripción -->
    <div>
        <label for="description" class="block text-gray-700 font-semibold mb-2">Descripción:</label>
        <textarea name="description" id="description" cols="30" rows="6"
            placeholder="Detalla la receta paso a paso..."
            class="w-full border {{ $errors->has('description') ? 'border-red-400' : 'border-gray-300' }} rounded-lg px-4 py-2 resize-y focus:outline-none focus:ring-2 focus:ring-yellow-500">{{ old('description', $recipe->description ?? '') }}</textarea>
        @if ($errors->has('description'))
            <p class="mt-2 text-sm text-red-600">{{ $errors->first('description') }}</p>
        @endif
    </div>

    <!-- Dificultad -->
    @php
        if (isset($recipe)) {
            $difficulty = $recipe->difficulty;
        } else {
            $difficulty = old('difficulty');
        }
    @endphp
    <div>
        <label for="difficulty" class="block text-gray-700 font-semibold mb-2">Nivel de dificultad:</label>
        <select name="difficulty" id="difficulty"
            class="w-full border {{ $errors->has('difficulty') ? 'border-red-400' : 'border-gray-300' }} rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-yellow-500">
            <option value="Facil" {{ $difficulty == 'Facil' ? 'selected' : '' }}>Fácil</option>
            <option value="Medio" {{ $difficulty == 'Medio' ? 'selected' : '' }}>Medio</option>
            <option value="Dificil" {{ $difficulty == 'Dificil' ? 'selected' : '' }}>Difícil</option>
        </select>
        @if ($errors->has('difficulty'))
            <p class="mt-2 text-sm text-red-600">{{ $errors->first('difficulty') }}</p>
        @endif
    </div>

    <!-- Botón de enviar -->
    <div class="text-right">
        <button type="submit"
            class="bg-gray-600 text-white font-semibold px-6 py-2 rounded-lg hover:bg-gray-700 transition">Guardar
            receta</button>
    </div>
    </form>
</div>

<script>
    window.addEventListener("DOMContentLoaded", () => {
        const existentes = document.querySelectorAll('.ingredient-item');
        if (existentes.length === 0) {
            addIngredient(new Event('manual'));
        }
        actualizarIngredientes();
    });

    // Añade inputs para introducir ingredientes o los elimina segun se pulse el boton 
    let botonAdd = document.getElementById("add-ingredient");
    let botonDel = document.getElementById("del-ingredient");
    botonAdd.addEventListener("click", addIngredient);
    botonDel.addEventListener("click", delIngredient);

    function actualizarIngredientes() {
        let inputs = document.getElementsByClassName('ingredient-item');
        let hayIngredientes = inputs.length > 0;

        botonDel.disabled = !hayIngredientes; // Si no hay ingredientes desactivo el boton

        // Añade o quita una clase del elemento segun se evalue la expresion del segundo argumento
        botonDel.classList.toggle('bg-red-900', !hayIngredientes);
        botonDel.classList.toggle('opacity-50', !hayIngredientes);
        botonDel.classList.toggle('cursor-not-allowed', !hayIngredientes);
    }


    function addIngredient(event) {
        event.preventDefault(); // Evita la recarga de la pagina

        let container = document.getElementById("ingredients-container");
        let newIngredient = document.createElement('div');
        newIngredient.classList.add('mt-3');

        let div = document.createElement('div');
        div.classList.add('flex', 'gap-2', 'mb-2');

        let inputName = document.createElement('input');
        inputName.classList.add('ingredient-item', 'w-1/2', 'border', 'border-gray-300', 'rounded-lg', 'px-3', 'py-2');
        inputName.placeholder = "Ingrediente";
        inputName.type = 'text';
        const index = document.querySelectorAll('.ingredient-item').length;
        inputName.name = `ingredients[${index}][name]`;


        let inputQty = document.createElement('input');
        inputQty.classList.add('ingredient-item', 'w-1/2', 'border', 'border-gray-300', 'rounded-lg', 'px-3', 'py-2');
        inputQty.placeholder = "Cantidad";
        inputQty.type = 'text';
        inputQty.name = `ingredients[${index}][quantity]`;

        div.appendChild(inputName);
        div.appendChild(inputQty);
        newIngredient.appendChild(div);

        container.insertBefore(newIngredient, botonAdd);
        inputName.focus();

        actualizarIngredientes();

    }

    function delIngredient(event) {
        event.preventDefault();

        let inputs = document.getElementsByClassName('ingredient-item');

        if (inputs.length > 0) {
            let ultimoIngrediente = inputs[inputs.length - 1];
            ultimoIngrediente.parentElement.remove();
        }
        actualizarIngredientes();
    }
</script>
