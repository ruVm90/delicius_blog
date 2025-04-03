<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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
            'category_name' => 'required|min:3|max:25|unique:categories'
        ]);
        $category = Category::create(
            [
            'category_name' => $data['category_name']
            ]
            );
            
        return to_route('category.index')->with('status-category', 'Categoria creada');
    }

    /**
     * Mostrar las recetas de la categoria
     */

    public function show(Category $category)
    {
        $recipes = $category->recipes()->get();
        return view('dashboard.category.recipes', compact('category','recipes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'category_name' => 'required|min:3|max:25|unique:categories'
        ]);
        $category = Category::create(
            [
            'category_name' => $data['category_name']
            ]
            );
            
        return to_route('category.index')->with('status-category', 'Categoria actualizada');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('category.index')->with('status', 'Categoria borrada');
    }
}
