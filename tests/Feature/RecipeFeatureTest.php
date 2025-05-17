<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecipeFeatureTest extends TestCase
{
    use RefreshDatabase;

     public function test_user_can_see_recipe_list()
    {
        $this->seed(); // Ejecuta los seeders de User, Recipes, etc.

        $user = User::find(1); 

        $response = $this->actingAs($user)->get('/recipes');

        $response->assertStatus(200);
        $response->assertSee('Espaguetis Carbonara'); 
    }
}
