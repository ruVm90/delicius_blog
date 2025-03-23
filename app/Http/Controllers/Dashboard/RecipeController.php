<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Recipe\StoreRequest;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Pagina principal con el listado de las recetas mas recientes
     */
    public function index()
    {
        $recipes = Recipe::paginate(2); // Obtengo todas las recetas y las pagino
        return view('dashboard/recipe/index', compact('recipes')); // Retorno la vista y la variable recipes
    }

    /**
     * Formulario que creara una nueva receta
     */
    public function create()
    {
         $categories = Category::pluck('id', 'category_name');  // Obtengo el id y el nombre de las categorias en un array asociativo
         $recipe = new Recipe(); // Creo una instancia vacia de receta
         
         return view('dashboard/recipe/create', compact('categories', 'recipe')); // Retorno la vista y las dos variables
        
    }

    /**
     * Recibo los datos del formulario validados y los guardo en la db
     */
    public function store(StoreRequest $request)
    {
      // dd($request->all());
      $data = $request->validated(); // Obtengo los datos validos

      // Si 
      if($request->hasFile('image')){
        $data['image'] = $request->file('image')->store('recipes-img','public');
      }
      else{
        $data['image'] = null;
      }
       $recipe = Recipe::create( 
            [
                'title' => $data['title'],
                'image' => $data['image'],
                'description' => $data['description'],
                'difficulty' => $data['difficulty'],
                'category_id' => $data['category_id'],
                'user_id' => Auth::id()  // Obtengo la id del usuario que crea la receta // funcionara cuando tenga un usuario autenticado
            ]
            );
            // Guardar los ingredientes de la receta
         foreach($data['ingredients'] as $ingredient){ // recorro los ingredientes de los inputs y los introduzco en la db
            Ingredient::create(
                [
                    'name' => $ingredient,
                    'recipe_id' => $recipe->id
                ]
                );
         };
             return to_route('recipe.index')->with('status','Receta creada'); // redirecciono a la vista de inicio y muestro un mensaje
    }

    /**
     * Recibe por parametro una receta
     * Retorno la vista y la variable pasada
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        return view('dashboard.recipe.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
