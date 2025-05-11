<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\RecipeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\SearchController;
use App\Models\Recipe;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

// Pagina de bienvenida
Route::get('/',[welcomeController::class,'index'])->name('welcome');

// Panel dashboard
Route::get('/dashboard', [RecipeController::class, 'dashboard'])
->middleware(['auth'])
->name('dashboard');

// Buscador
Route::get('/dashboard/sugerencias', [SearchController::class, 'mostrarSugerencias'])->name('recipe.search');

// Recetas CRUD
Route::resource('dashboard/recipe', RecipeController::class);

// Perfil de usuario público con sus recetas
Route::get('dashboard/recipe/user/{user}', [RecipeController::class , 'userRecipes'])->name('recipe.user');

// Categorias CRUD
Route::resource('dashboard/category', CategoryController::class);

// Enviar correo electronico
Route::get('/send-mail', [MailController::class, 'sendMail']);

// Perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
