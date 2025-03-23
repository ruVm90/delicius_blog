<!-- Plantilla de formulario -->

@csrf

<label for="title">Nombre de la receta:</label>
<input type="text" name="title" value="{{ old('title') }}">

<!-- pongo las categorias en el select y obtengo el id de la seleccionada --->
<label for="category_id">Categoria:</label>
<select name="category_id" id="category_id">
    @foreach ($categories as $name => $id)
        <option value="{{$id}}"{{ old('category_id') == $id ? 'selected' : '' }}>{{$name}}</option>
        
    @endforeach
</select>
<div class="ingredients-container">
    <label for="ingredients">Ingredientes y cantidad:</label>
    <div class="ingredient-item">
        <input type="text" name="ingredients[]" value="{{ old('ingredients.0') }}">
    </div>
    <div class="ingredient-item">
        <input type="text" name="ingredients[]" value="{{ old('ingredients.1') }}">
    </div>
    <div class="ingredient-item">
        <input type="text" name="ingredients[]" value="{{ old('ingredients.2') }}">
    </div>
    <button id="add-ingredient">Añadir otro ingrediente</button>
</div>
<label for="image">Imagen de la receta:</label>
<input type="file" name="image">

<label for="description">Descripción:</label>
<textarea name="description" id="description" cols="30" rows="10" >{{ old('description') }}</textarea>

<label for="difficulty">Nivel de dificultad:</label>
<select name="difficulty" id="difficulty">
    <option value="Facil">Facil</option>
    <option value="Medio">Medio</option>
    <option value="Dificil">Dificil</option>
</select>
<script>
    // Añade inputs para introducir ingredientes segun se pulse el boton
    document.getElementById("add-ingredient").addEventListener("click", function(event){
       event.preventDefault(); // Evita la recarga de la pagina
       
       let container = document.getElementsByClassName("ingredients-container")[0];
       let newIngredient = document.createElement('div');
       newIngredient.classList.add('ingredient-item');
       
       let input = document.createElement('input');
       input.type = 'text';
       input.name = 'ingredients[]';
       
       newIngredient.appendChild(input);
       container.appendChild(newIngredient);
    });
 </script>

