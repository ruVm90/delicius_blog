<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $categories = [
            [
                'category_name' => 'Pasta',
                'image' => 'categories-img/Pasta.jpg',
            ],
            [
                'category_name' => 'Carnes',
                'image' => 'categories-img/Carnes.jpg',
            ],
            [
                'category_name' => 'Arroces',
                'image' => 'categories-img/Arroces.jpg',
            ],
            [
                'category_name' => 'Ensaladas',
                'image' => 'categories-img/Ensaladas.jpg',
            ],
            [
                'category_name' => 'Cremas y sopas',
                'image' => 'categories-img/Cremas.jpg',
            ],
            [
                'category_name' => 'Guisos tradicionales',
                'image' => 'categories-img/Guisos.jpg',
            ],
            [
                'category_name' => 'Pescados',
                'image' => 'categories-img/Pescados.jpg',
            ],
            [
                'category_name' => 'Postres',
                'image' => 'categories-img/Postres.jpg',
            ],
        ];

        foreach ($categories as $category){
            $category = Category::create($category);
        }
    }
}
