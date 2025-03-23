@extends('master')
@section('content')
@include('layouts/_error-forms')

<form action="{{route('recipe.update', $recipe->id)}}" method="POST" enctype="multipart/form-data">

    @method('PATCH')
    @csrf

    <label for="title">Nombre de la receta:</label>
    <input type="text" name="title" value="{{ $recipe->title }}">
    
    <!-- pongo las categorias en el select y obtengo el id de la seleccionada --->
    <label for="category_id">Categoria:</label>
    <select name="category_id" id="category_id">
        @foreach ($categories as $name => $id)
            <option value="{{$id}}" {{$recipe->category->id == $id ? 'selected' : '' }}>{{ $name }}</option>
            
        @endforeach
    </select>
    <div class="ingredients-container">
        <label for="ingredients">Ingredientes y cantidad:</label>
        
           @foreach ($recipe->ingredients as $ingredient)
           <div class="ingredient-item">
               <input type="text" name="ingredients[]" value="{{ $ingredient->name}}">
           </div>   
           @endforeach
            
        <button id="add-ingredient">Añadir otro ingrediente</button>
    </div>
    <label for="image">Imagen de la receta:</label>
    @if ($recipe->image){
        <img src="{{ asset('storage/' . $recipe->image) }}" alt="Imagen actual" width="150">
    }
        
    @endif
    <input type="file" name="image" >
    
    <label for="description">Descripción:</label>
    <textarea name="description" id="description" cols="30" rows="10" >{{ $recipe->description }}</textarea>
    
    <label for="difficulty">Nivel de dificultad:</label>
    <select name="difficulty" id="difficulty">
        <option value="Facil" {{$recipe->difficulty == 'Facil' ? 'selected' : ''}}>Facil</option>
        <option value="Medio" {{$recipe->difficulty == 'Medio' ? 'selected' : ''}}>Medio</option>
        <option value="Dificil" {{$recipe->difficulty == 'Dificil' ? 'selected' : ''}}>Dificil</option>
    </select>
  
    


<button type="submit">Editar receta</button>
</form>
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
@endsection

