<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\DB;




class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Recipe::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $recipes = [
            [
                'title' => 'Tarta de Queso',
                'image' => 'recipes-img/tarta-de-queso.jpg',
                'description' => 'Mezcla queso crema, azúcar, huevos y vainilla. Vierte sobre una base de galletas trituradas con mantequilla. Hornea a 170°C durante 50 minutos. Deja enfriar y refrigera antes de servir.',
                'difficulty' => 'Fácil',
                'ingredients' => ['Queso crema', 'Huevos', 'Azúcar', 'Vainilla', 'Galletas', 'Mantequilla'],
                'user_id' => 1,
                'category_id' => 3,
            ],
            [
                'title' => 'Espaguetis Carbonara',
                'image' => 'recipes-img/espaguetis-carbonara.jpg',
                'description' => 'Cocina los espaguetis. Fríe panceta. Bate huevos con queso parmesano. Mezcla los espaguetis calientes con la panceta y luego con la mezcla de huevo sin que se cocinen. Sirve al instante.',
                'difficulty' => 'Media',
                'ingredients' => ['Espaguetis', 'Huevos', 'Queso parmesano', 'Panceta', 'Sal', 'Pimienta'],
                'user_id' => 1,
                'category_id' => 1,
            ],
            [
                'title' => 'Ensalada César',
                'image' => 'recipes-img/ensalada-cesar.jpg',
                'description' => 'Corta lechuga romana. Añade pollo a la plancha en tiras, crutones y queso parmesano. Aliña con salsa César y mezcla bien antes de servir.',
                'difficulty' => 'Fácil',
                'ingredients' => ['Lechuga romana', 'Pechuga de pollo', 'Queso parmesano', 'Crutones', 'Salsa César'],
                'user_id' => 1,
                'category_id' => 6,
            ],
            [
                'title' => 'Brownie de Chocolate',
                'image' => 'recipes-img/brownie-de-chocolate.jpg',
                'description' => 'Derrite chocolate y mantequilla. Mezcla con huevos, azúcar y harina. Vierte en un molde y hornea a 180°C durante 25 minutos. Deja enfriar antes de cortar.',
                'difficulty' => 'Fácil',
                'ingredients' => ['Chocolate negro', 'Mantequilla', 'Huevos', 'Azúcar', 'Harina'],
                'user_id' => 1,
                'category_id' => 3,
            ],
            [
                'title' => 'Tacos de Carne Asada',
                'image' => 'recipes-img/tacos-de-carne-asada.jpg',
                'description' => 'Marina carne con ajo, lima, comino y aceite. Ásala y córtala en tiras. Sirve en tortillas con cebolla, cilantro y salsa.',
                'difficulty' => 'Media',
                'ingredients' => ['Carne de res', 'Ajo', 'Lima', 'Comino', 'Tortillas', 'Cilantro', 'Cebolla'],
                'user_id' => 1,
                'category_id' => 4,
            ],
            [
                'title' => 'Paella Valenciana',
                'image' => 'recipes-img/paella-valenciana.jpg',
                'description' => 'Sofríe pollo, conejo y verduras. Añade tomate, pimentón y caldo. Incorpora arroz y azafrán. Cocina sin remover hasta que se absorba el líquido. Deja reposar antes de servir.',
                'difficulty' => 'Difícil',
                'ingredients' => ['Pollo', 'Conejo', 'Judías verdes', 'Arroz', 'Azafrán', 'Tomate', 'Caldo'],
                'user_id' => 1,
                'category_id' => 8,
            ],
            [
                'title' => 'Sopa Ramen',
                'image' => 'recipes-img/sopa-ramen.jpg',
                'description' => 'Hierve caldo con salsa de soja, jengibre y ajo. Cocina fideos aparte. Sirve en bol con huevo cocido, algas, brotes de bambú y chashu (cerdo marinado).',
                'difficulty' => 'Media',
                'ingredients' => ['Fideos ramen', 'Caldo', 'Salsa de soja', 'Jengibre', 'Ajo', 'Huevo', 'Algas', 'Chashu'],
                'user_id' => 1,
                'category_id' => 5,
            ],
            [
                'title' => 'Pancakes Americanos',
                'image' => 'recipes-img/pancakes-americanos.jpg',
                'description' => 'Mezcla leche, huevos, mantequilla derretida, harina, azúcar y levadura. Cocina porciones en una sartén caliente por ambos lados. Sirve con sirope de arce.',
                'difficulty' => 'Fácil',
                'ingredients' => ['Harina', 'Leche', 'Huevos', 'Mantequilla', 'Azúcar', 'Levadura', 'Sirope de arce'],
                'user_id' => 1,
                'category_id' => 3,
            ],
            [
                'title' => 'Pizza Margarita',
                'image' => 'recipes-img/pizza-margarita.jpg',
                'description' => 'Extiende masa, añade tomate triturado, mozzarella y hojas de albahaca. Hornea a 220°C hasta que el queso burbujee y la masa esté dorada.',
                'difficulty' => 'Media',
                'ingredients' => ['Masa de pizza', 'Tomate triturado', 'Mozzarella', 'Albahaca'],
                'user_id' => 1,
                'category_id' => 1,
            ],
            [
                'title' => 'Croquetas de Jamón',
                'image' => 'recipes-img/croquetas-de-jamon.jpg',
                'description' => 'Haz una bechamel con mantequilla, harina y leche. Añade jamón picado. Deja enfriar, forma las croquetas, pásalas por huevo y pan rallado, y fríelas.',
                'difficulty' => 'Media',
                'ingredients' => ['Jamón', 'Harina', 'Leche', 'Mantequilla', 'Huevo', 'Pan rallado'],
                'user_id' => 1,
                'category_id' => 4,
            ],
            [
                'title' => 'Curry de Garbanzos',
                'image' => 'recipes-img/curry-de-garbanzos.jpg',
                'description' => 'Sofríe cebolla, ajo y jengibre. Añade garbanzos cocidos, tomate triturado y leche de coco. Incorpora curry, comino, sal y pimienta. Cocina 15 minutos a fuego medio. Sirve caliente con arroz.',
                'difficulty' => 'Media',
                'ingredients' => ['Garbanzos cocidos', 'Cebolla', 'Ajo', 'Jengibre', 'Tomate triturado', 'Leche de coco', 'Curry', 'Comino'],
                'user_id' => 2,
                'category_id' => 2,
            ],
            [
                'title' => 'Hummus Casero',
                'image' => 'recipes-img/humus-de-garbanzos.jpg',
                'description' => 'Tritura garbanzos cocidos con tahini, zumo de limón, ajo, sal y aceite de oliva hasta obtener una pasta cremosa. Añade agua si es necesario. Sirve con pimentón y aceite.',
                'difficulty' => 'Fácil',
                'ingredients' => ['Garbanzos cocidos', 'Tahini', 'Limón', 'Ajo', 'Aceite de oliva', 'Pimentón'],
                'user_id' => 2,
                'category_id' => 1,
            ],
            [
                'title' => 'Pollo al Curry con Arroz Basmati',
                'image' => 'recipes-img/pollo-al-curry-con-arroz-basmati.jpg',
                'description' => 'Corta el pollo en dados y dora con cebolla y ajo. Añade curry, leche de coco y sal. Cocina a fuego lento 20 minutos. Sirve acompañado de arroz basmati cocido.',
                'difficulty' => 'Media',
                'ingredients' => ['Pollo', 'Cebolla', 'Ajo', 'Curry', 'Leche de coco', 'Arroz basmati'],
                'user_id' => 2,
                'category_id' => 2,
            ],
            [
                'title' => 'Tiramisú Clásico',
                'image' => 'recipes-img/tiramisu-clasico.jpg',
                'description' => 'Bate yemas con azúcar, mezcla con mascarpone. Monta claras y añade. Sumerge bizcochos en café, alterna capas con la crema. Refrigera y espolvorea cacao.',
                'difficulty' => 'Media',
                'ingredients' => ['Yemas de huevo', 'Azúcar', 'Mascarpone', 'Claras', 'Bizcochos de soletilla', 'Café', 'Cacao en polvo'],
                'user_id' => 2,
                'category_id' => 3,
            ],
            [
                'title' => 'Tabulé de Cuscús',
                'image' => 'recipes-img/tabule-de-cuscus.jpg',
                'description' => 'Hidrata el cuscús con agua caliente. Añade tomate, pepino, perejil y menta picados. Aliña con limón, sal y aceite. Refrigera antes de servir.',
                'difficulty' => 'Fácil',
                'ingredients' => ['Cuscús', 'Tomate', 'Pepino', 'Perejil', 'Menta', 'Limón', 'Aceite de oliva', 'Sal'],
                'user_id' => 2,
                'category_id' => 1,
            ],
            [
                'title' => 'Cupcakes de Vainilla',
                'image' => 'recipes-img/cupcakes-de-vainilla.jpg',
                'description' => 'Mezcla harina, azúcar, huevos, mantequilla y vainilla. Rellena moldes y hornea a 180°C durante 20 minutos. Deja enfriar y decora con crema de mantequilla.',
                'difficulty' => 'Fácil',
                'ingredients' => ['Harina', 'Azúcar', 'Huevos', 'Mantequilla', 'Vainilla', 'Crema de mantequilla'],
                'user_id' => 2,
                'category_id' => 3,
            ],
            [
                'title' => 'Bruschettas Italianas',
                'image' => 'recipes-img/bruschetes-italianas.jpg',
                'description' => 'Tuesta pan, frota con ajo. Mezcla tomate picado con albahaca, aceite y sal. Cubre el pan con la mezcla. Sirve frío.',
                'difficulty' => 'Fácil',
                'ingredients' => ['Pan', 'Ajo', 'Tomate', 'Albahaca', 'Aceite de oliva', 'Sal'],
                'user_id' => 2,
                'category_id' => 1,
            ],
            [
                'title' => 'Fajitas de Ternera',
                'image' => 'recipes-img/fajitas-de-ternera.jpg',
                'description' => 'Saltea ternera con cebolla y pimientos. Añade especias. Sirve en tortillas calientes con guacamole y salsa al gusto.',
                'difficulty' => 'Media',
                'ingredients' => ['Ternera', 'Cebolla', 'Pimientos', 'Especias tex-mex', 'Tortillas', 'Guacamole'],
                'user_id' => 2,
                'category_id' => 2,
            ],
        ];

       
        foreach ($recipes as $recipe) {
            $ingredients = $recipe['ingredients'];
            unset($recipe['ingredients']);

            $recipe = Recipe::create($recipe);

            foreach ($ingredients as $ingredientName) {
                $recipe->ingredients()->create([
                    'name' => $ingredientName,
                ]);
            }
    }
}
}

