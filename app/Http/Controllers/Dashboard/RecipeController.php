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
     * 
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
        $ingredients = collect();


        return view('dashboard/recipe/create', compact('categories', 'recipe', 'ingredients')); // Retorno la vista y las variables

    }

    /**
     * Recibo los datos del formulario validados y los guardo en la db
     */
    public function store(StoreRequest $request)
    {

        $data = $request->validated(); // Obtengo los datos validos


        // Si el request tiene un archivo llamado image la guardo en storage/app/public/recipes-img/
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('recipes-img', 'public');
        } else {
            $data['image'] = null;
        }
        $recipe = Recipe::create(
            [
                'title' => $data['title'],
                'image' => $data['image'],
                'description' => $data['description'],
                'difficulty' => $data['difficulty'],
                'category_id' => $data['category_id'],
                'user_id' => Auth::id()  // Obtengo la id del usuario que crea la receta 
            ]
        );
        // Guardar los ingredientes de la receta
        foreach ($data['ingredients'] as $ingredient) { // recorro los ingredientes de los inputs y los introduzco en la db
            Ingredient::create(
                [
                    'name' => $ingredient['name'],
                    'recipe_id' => $recipe->id,
                    'quantity' => $ingredient['quantity'],
                ]
            );
        };

        return to_route('dashboard')->with('status', 'Receta creada'); // redirecciono a la vista de inicio y muestro un mensaje
    }

    /**
     * Recibe por parametro una receta
     * Retorno la vista y la variable pasada
     *
     */
    public function show(Recipe $recipe)
    {
        return view('dashboard.recipe.show', compact('recipe'));
    }

    /**
     * 
     * Retorno el formulario con las categorias y le paso la variable recipe
     */
    public function edit(Recipe $recipe)
    {
        $categories = Category::pluck('id', 'category_name');
        $ingredients = $recipe->ingredients;
        return view('dashboard.recipe.edit', compact('categories', 'recipe', 'ingredients'));
    }

    /**
     * Actualizar una receta
     */
    public function update(StoreRequest $request, Recipe $recipe)
    {
        // Obtengo los datos validados
        $data = $request->validated();

        //  Verificar si hay cambios en los campos principales
        if (
            $data["title"] == $recipe->title &&
            $data["description"] == $recipe->description &&
            $data["difficulty"] == $recipe->difficulty &&
            $data["category_id"] == $recipe->category_id
        ) {

            //  Comparar ingredientes individualmente
            $existingIngredients = $recipe->ingredients->pluck('name')->toArray(); // Obtengo los nombres de los ingredientes existentes
            $newIngredients = $data['ingredients']; // Los ingredientes enviados por el usuario

            // Compara los ingredientes (ordenados para evitar problemas de orden)
            sort($existingIngredients);
            sort($newIngredients);

            if ($existingIngredients == $newIngredients) {
                // Si no hay cambios en los ingredientes ni en los campos principales
                return to_route('dashboard')->with('status', 'No ha habido cambios en la receta');
            }
        }

        //  Manejo de la imagen (si se ha cargado una nueva imagen)
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($recipe->image) {
                Storage::disk('public')->delete($recipe->image);
            }
            // Almacenar la nueva imagen
            $data['image'] = $request->file('image')->store('recipes-img', 'public');
        } else {
            // Mantener la imagen anterior si no se sube una nueva
            $data['image'] = $recipe->image;
        }

        //  Actualizar los campos de la receta
        $recipe->update([
            'title' => $data['title'],
            'image' => $data['image'],
            'description' => $data['description'],
            'difficulty' => $data['difficulty'],
            'category_id' => $data['category_id'],
        ]);

        //  Actualizar los ingredientes: eliminar los anteriores y agregar los nuevos
        $recipe->ingredients()->delete(); // Borra los ingredientes anteriores

        foreach ($data['ingredients'] as $ingredient) {
            $recipe->ingredients()->create([
                'name' => $ingredient,
                'recipe_id' => $recipe->id
            ]);
        }

        //  Redirigir con un mensaje de éxito
        return to_route('dashboard')->with('status', 'Receta actualizada');
    }




    /**
     * Remove the specified resource from storage.
     * Elimina la receta enviada por el parametro y redirecciona a la pagina de inicio
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return to_route('dashboard')->with('status', 'Receta borrada');
    }

    /**
     *  Mostrar el dashboard en mis recetas
     */
    public function dashboard()
    {
        // Obtengo el usuario autenticado
        $user = auth()->user();

        // Obtengo las recetas del usuario autenticado
        $my_recipes = $user->recipes()->get();

        // Retorno la vista 'dashboard.recipe.dashboard' y paso las variables 'my_recipes' y 'user'
        return view('dashboard.recipe.dashboard', compact('my_recipes', 'user'));
    }

    /**
     *  Mostrar las recetas del usuario selecionado
     */
    public function userRecipes(User $user)
    {

        $recipes = $user->recipes()->paginate(6);

        return view('dashboard.recipe.user', compact('recipes', 'user'));
    }
}
