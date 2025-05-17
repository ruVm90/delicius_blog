<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class InterfaceTest extends TestCase
{
    
    #[\PHPUnit\Framework\Attributes\Test]
    public function homepage_loads_correctly(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Delicious Blog');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function recipes_list_is_visible(): void
    {
        $user = \App\Models\User::first();
        $this->actingAs($user);
    
        $response = $this->get('/dashboard/recipe');
        $response->assertStatus(200);
        $response->assertSee('recetas');
    }
    

    #[\PHPUnit\Framework\Attributes\Test]
    public function recipe_detail_shows_correct_data(): void
    {
        $user = \App\Models\User::first(); 
    
        $this->actingAs($user);
    
        $recipe = \App\Models\Recipe::where('user_id', $user->id)->first();
    
        
        $this->assertNotNull($recipe, 'No se encontró una receta asociada al usuario.');
    
        
        $response = $this->get("dashboard/recipe/{$recipe->id}");
    
        $response->assertStatus(200);
        $response->assertSee($recipe->title);
    }
    

    #[\PHPUnit\Framework\Attributes\Test]
    public function user_can_access_login_page(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('Iniciar sesión');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function guest_cannot_access_dashboard(): void
    {
        $response = $this->get('dashboard');
        $response->assertRedirect('/login');
    }

   
}
