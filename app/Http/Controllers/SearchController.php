<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SearchController extends Controller
{

    // Busca las coincidencias y devuelve si las hay
    public function mostrarSugerencias(Request $request){
        // Obtengo la peticion
        
         $texto = $request->input('q');
         dd($texto);
        // Si el campo esta vacio 
         if (!$texto){
            return response()->json(['error' => 'parametro vacio'], 400);
         }
         // Obtengo las equivalencias de la db
         $recipes = Recipe::where('title', 'LIKE', '%' . $texto . '%')->get(['id', 'title']);

        return response()->json($recipes);
    }
    


}
