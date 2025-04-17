<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\RecipeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\SearchController;
use App\Models\Recipe;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;


Route::get('/',[welcomeController::class,'index'])->name('welcome');


Route::get('/dashboard', [RecipeController::class, 'dashboard'])
->middleware(['auth'])
->name('dashboard');

 // Ruta para el buscador
 Route::get('/dashboard/sugerencias', function (Request $request) {
    $texto = $request->input('q');
         dd($texto);
        // Si el campo esta vacio 
         if (!$texto){
            return response()->json(['error' => 'parametro vacio'], 400);
         }
         // Obtengo las equivalencias de la db
         $recipes = Recipe::where('title', 'LIKE', '%' . $texto . '%')->get(['id', 'title']);

        return response()->json($recipes);
 }); 

Route::resource('dashboard/recipe', RecipeController::class);

Route::resource('dashboard/category', CategoryController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/prueba-sugerencia', function () {
    return response()->json(['ok' => true]);
});

require __DIR__.'/auth.php';
