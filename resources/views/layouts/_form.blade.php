<!-- Plantilla de formulario -->

@csrf

<label for="title">Nombre de la receta:</label>
<input type="text" name="title">

<!-- pongo las categorias en el select y obtengo el id de la seleccionada --->
<label for="category_id">Categoria:</label>
<select name="category_id" id="category_id">
    @foreach ($categories as $name => $id)
        <option value="{{$id}}">{{$name}}</option>
        
    @endforeach
</select>
<div class="ingredients-container">
    <label for="ingredients">Ingredientes y cantidad:</label>
    <input type="text" name="ingredients[]">
    <input type="text" name="ingredients[]">
    <input type="text" name="ingredients[]">
    <button id="add-ingredient">Añadir otro ingrediente</button>
</div>
<label for="image">Imagen de la receta:</label>
<input type="file" name="image">

<label for="description">Descripción:</label>
<textarea name="description" id="description" cols="30" rows="10"></textarea>

<label for="difficulty">Nivel de dificultad:</label>
<select name="difficulty" id="difficulty">
    <option value="facil">Facil</option>
    <option value="normal">Medio</option>
    <option value="dificil">Dificil</option>
</select>
<script>
    // Funcion que añadira inputs de ingredientes si se hace click en el boton

   document.getElementById("add-ingredient").addEventListener("click", function(event){
      let container = document.getElementsByClassName("ingredients-container")[0];
      event.preventDefault(); // Evita la recarga de la pagina
      let input = document.createElement('input');
      input.type = 'text';
      input.name = 'ingredients[]';
      container.appendChild(input);
   });
</script>

