<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RecipeUnitTest extends TestCase
{
    //Pruebas unitarias
    public function test_recipe_title_is_not_empty()
    {
        $title = 'Paella Valenciana';
        $this->assertNotEmpty($title, 'El título de la receta no debe estar vacío.');
    }

    public function test_recipe_difficulty_is_valid()
    {
        $difficulty = 'Media';
        $validDifficulties = ['Fácil', 'Media', 'Difícil'];
        $this->assertContains($difficulty, $validDifficulties, 'La dificultad debe ser válida.');
    }

    public function test_recipe_image_url_is_valid()
    {
        $imageUrl = 'https://example.com/imagen.jpg';
        $this->assertTrue(filter_var($imageUrl, FILTER_VALIDATE_URL) !== false, 'La URL de la imagen debe ser válida.');
    }

    public function test_user_id_is_positive_integer()
    {
        $userId = 2;
        $this->assertIsInt($userId);
        $this->assertGreaterThan(0, $userId, 'El ID del usuario debe ser un número entero positivo.');
    }

    public function test_category_id_is_positive_integer()
    {
        $categoryId = 5;
        $this->assertIsInt($categoryId);
        $this->assertGreaterThan(0, $categoryId, 'El ID de la categoría debe ser un número entero positivo.');
    }
}
