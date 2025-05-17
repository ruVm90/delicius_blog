<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Listado de categorias
     */
    public function index()
    {
        $categories = Category::all();

        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Crear una nueva categoria (SOLO ADMIN)
     */
    public function create()
    {
        $category = new Category();

        return view('dashboard.category.create', compact('category'));
    }

    /**
     * Guardo la categoria en la base de datos
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_name' => 'required|min:3|max:25|unique:categories',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories-img', 'public');
        } else {
            $data['image'] = null;
        }
        $category = Category::create(
            [
                'category_name' => ucfirst($data['category_name']), // La primera letra en mayusculas
                'image' => $data['image']
            ]
        );

        return to_route('category.index')->with('status-category', 'Categoria creada');
    }

    /**
     * Mostrar las recetas de la categoria
     */

    public function show(Category $category)
    {
        $recipes = $category->recipes()->paginate(6);
        return view('dashboard.category.recipes', compact('category', 'recipes'));
    }

    /**
     * Muestra el formulario para editar la categoria
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Actualiza la categoria
     */
    public function update(Request $request, Category $category)
    {
        // Solo validamos y actualizamos si el nombre de la categoría ha cambiado
        if ($category->category_name != $request->category_name || $request->hasFile('image')) {
            $data = $request->validate([
                'category_name' => 'required|min:3|max:25|unique:categories,category_name,' . $category->id,
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($request->hasFile('image')) {
                if ($category->image) {
                    Storage::disk('public')->delete($category->image);
                }
                $data['image'] = $request->file('image')->store('categories-img', 'public');
            } else {
                $data['image'] = $category->image;
            }
            // Actualizamos el modelo con el nuevo nombre
            $category->update([
                'category_name' => $data['category_name'],
                'image' => $data['image']
            ]);

            // Redirigimos con un mensaje de éxito
            return to_route('category.index')->with('status-category', 'Categoria actualizada');
        }

        // Si no hay cambios, no hacemos nada y redirigimos
        return to_route('category.index')->with('status-category', 'No hubo cambios en la categoría');
    }



    /**
     * Elimina la categoria (Solo admin)
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('category.index')->with('status', 'Categoria borrada');
    }
}
