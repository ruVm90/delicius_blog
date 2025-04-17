<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Recipe\StoreRequest;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    /**
     * (PENDIENTE DE HACER)
     * Mostrar las recetas de todos los usuarios
     */
    public function index()
    {
        $recipes = Recipe::orderBy('updated_at', 'desc')->paginate(6); // Ordeno todas las recetas de mas reciente a mas antigua y las pagino
        
        return view('dashboard.recipe.index', compact('recipes')); // Retorno la vista y la variable recipes
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

      // Si el request tiene un archivo llamado image la guardo en storage/app/public/recipes-img/
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
             return to_route('dashboard')->with('status','Receta creada'); // redirecciono a la vista de inicio y muestro un mensaje
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
     * Retorno el formulario con las categorias y le paso la variable recipe
     */
    public function edit(Recipe $recipe)
    {
       $categories = Category::pluck('id', 'category_name');
      
       return view('dashboard.recipe.edit', compact('categories','recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Recipe $recipe)
    {
        $data = $request->validated(); // Obtengo los datos validos

    if ($request->hasFile('image')) {
        // Eliminar la imagen anterior si existe
        if ($recipe->image) {
            Storage::disk('public')->delete($recipe->image);
        }
        $data['image'] = $request->file('image')->store('recipes-img', 'public');
    } else {
        $data['image'] = $recipe->image; // Mantener la imagen anterior
    }
       $recipe->update(
            [
                'title' => $data['title'],
                'image' => $data['image'],
                'description' => $data['description'],
                'difficulty' => $data['difficulty'],
                'category_id' => $data['category_id'],
            ]
            );
    
            
          // Actualizar ingredientes: eliminar los existentes y agregar los nuevos
    $recipe->ingredients()->delete(); // Borra los ingredientes anteriores

    foreach ($data['ingredients'] as $ingredient) {
        $recipe->ingredients()->create([
            'name' => $ingredient,
            'recipe_id' => $recipe->id
        ]);
    }
             return to_route('dashboard')->with('status','Receta actualizada'); // redirecciono a la vista de inicio y muestro un mensaje
    }

    

    /**
     * Remove the specified resource from storage.
     * Elimina la receta enviada por el parametro y redirecciona a la pagina de inicio
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return to_route('dashboard')->with('status','Receta borrada');
    }

    /**
     *  Mostrar el dashboard en mis recetas
     */
    public function dashboard(){

        $user = auth()->user(); // Obtengo el usuario autenticado
        $my_recipes = $user->recipes()->get();

        return view('dashboard.recipe.dashboard', compact('my_recipes', 'user'));
    }
}
