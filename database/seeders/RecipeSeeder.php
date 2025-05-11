<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Ingredient;
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
        // Obtengo el nombre de las categorias por su id
        $categories = Category::pluck('id', 'category_name')->toArray();

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Recipe::truncate();
        Ingredient::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $recipes = [
            [
                'title' => 'Tarta de Queso',
                'image' => 'recipes-img/tarta-de-queso.jpg',
                'description' => 'Mezcla queso crema, azúcar, huevos y vainilla. Vierte sobre una base de galletas trituradas con mantequilla. Hornea a 170°C durante 50 minutos. Deja enfriar y refrigera antes de servir.',
                'difficulty' => 'Fácil',
                'ingredients' => ['Queso crema', 'Huevos', 'Azúcar', 'Vainilla', 'Galletas', 'Mantequilla'],
                'user_id' => random_int(1, 3),
                'category' => 'Postres',
            ],
            [
                'title' => 'Espaguetis Carbonara',
                'image' => 'recipes-img/espaguetis-carbonara.jpg',
                'description' => 'Cocina los espaguetis. Fríe panceta. Bate huevos con queso parmesano. Mezcla los espaguetis calientes con la panceta y luego con la mezcla de huevo sin que se cocinen. Sirve al instante.',
                'difficulty' => 'Media',
                'ingredients' => ['Espaguetis', 'Huevos', 'Queso parmesano', 'Panceta', 'Sal', 'Pimienta'],
                'user_id' => random_int(1, 3),
                'category' => 'Pasta',
            ],
            [
                'title' => 'Ensalada César',
                'image' => 'recipes-img/ensalada-cesar.jpg',
                'description' => 'Corta lechuga romana. Añade pollo a la plancha en tiras, crutones y queso parmesano. Aliña con salsa César y mezcla bien antes de servir.',
                'difficulty' => 'Fácil',
                'ingredients' => ['Lechuga romana', 'Pechuga de pollo', 'Queso parmesano', 'Crutones', 'Salsa César'],
                'user_id' => random_int(1, 3),
                'category' => 'Ensaladas',
            ],
            [
                'title' => 'Brownie de Chocolate',
                'image' => 'recipes-img/brownie-de-chocolate.jpg',
                'description' => 'Derrite chocolate y mantequilla. Mezcla con huevos, azúcar y harina. Vierte en un molde y hornea a 180°C durante 25 minutos. Deja enfriar antes de cortar.',
                'difficulty' => 'Fácil',
                'ingredients' => ['Chocolate negro', 'Mantequilla', 'Huevos', 'Azúcar', 'Harina'],
                'user_id' => random_int(1, 3),
                'category' => 'Postres',
            ],
            [
                'title' => 'Tacos de Carne Asada',
                'image' => 'recipes-img/tacos-de-carne-asada.jpg',
                'description' => 'Marina carne con ajo, lima, comino y aceite. Ásala y córtala en tiras. Sirve en tortillas con cebolla, cilantro y salsa.',
                'difficulty' => 'Media',
                'ingredients' => ['Carne de res', 'Ajo', 'Lima', 'Comino', 'Tortillas', 'Cilantro', 'Cebolla'],
                'user_id' => random_int(1, 3),
                'category' => 'Carnes',
            ],
            [
                'title' => 'Paella Valenciana',
                'image' => 'recipes-img/paella-valenciana.jpg',
                'description' => 'Sofríe pollo, conejo y verduras. Añade tomate, pimentón y caldo. Incorpora arroz y azafrán. Cocina sin remover hasta que se absorba el líquido. Deja reposar antes de servir.',
                'difficulty' => 'Difícil',
                'ingredients' => ['Pollo', 'Conejo', 'Judías verdes', 'Arroz', 'Azafrán', 'Tomate', 'Caldo'],
                'user_id' => random_int(1, 3),
                'category' => 'Arroces',
            ],
            [
                'title' => 'Sopa Ramen',
                'image' => 'recipes-img/sopa-ramen.jpg',
                'description' => 'Hierve caldo con salsa de soja, jengibre y ajo. Cocina fideos aparte. Sirve en bol con huevo cocido, algas, brotes de bambú y chashu (cerdo marinado).',
                'difficulty' => 'Media',
                'ingredients' => ['Fideos ramen', 'Caldo', 'Salsa de soja', 'Jengibre', 'Ajo', 'Huevo', 'Algas', 'Chashu'],
                'user_id' => random_int(1, 3),
                'category' => 'Cremas y sopas',
            ],
            [
                'title' => 'Pancakes Americanos',
                'image' => 'recipes-img/pancakes-americanos.jpg',
                'description' => 'Mezcla leche, huevos, mantequilla derretida, harina, azúcar y levadura. Cocina porciones en una sartén caliente por ambos lados. Sirve con sirope de arce.',
                'difficulty' => 'Fácil',
                'ingredients' => ['Harina', 'Leche', 'Huevos', 'Mantequilla', 'Azúcar', 'Levadura', 'Sirope de arce'],
                'user_id' => random_int(1, 3),
                'category' => 'Postres',
            ],
            [
                'title' => 'Pizza Margarita',
                'image' => 'recipes-img/pizza-margarita.jpg',
                'description' => 'Extiende masa, añade tomate triturado, mozzarella y hojas de albahaca. Hornea a 220°C hasta que el queso burbujee y la masa esté dorada.',
                'difficulty' => 'Media',
                'ingredients' => ['Masa de pizza', 'Tomate triturado', 'Mozzarella', 'Albahaca'],
                'user_id' => random_int(1, 3),
                'category' => 'Pasta',
            ],
            [
                'title' => 'Croquetas de Jamón',
                'image' => 'recipes-img/croquetas-de-jamon.jpg',
                'description' => 'Haz una bechamel con mantequilla, harina y leche. Añade jamón picado. Deja enfriar, forma las croquetas, pásalas por huevo y pan rallado, y fríelas.',
                'difficulty' => 'Media',
                'ingredients' => ['Jamón', 'Harina', 'Leche', 'Mantequilla', 'Huevo', 'Pan rallado'],
                'user_id' => random_int(1, 3),
                'category' => 'Carnes',
            ],
            [
                'title' => 'Curry de Garbanzos',
                'image' => 'recipes-img/curry-de-garbanzos.jpg',
                'description' => 'Sofríe cebolla, ajo y jengibre. Añade garbanzos cocidos, tomate triturado y leche de coco. Incorpora curry, comino, sal y pimienta. Cocina 15 minutos a fuego medio. Sirve caliente con arroz.',
                'difficulty' => 'Media',
                'ingredients' => ['Garbanzos cocidos', 'Cebolla', 'Ajo', 'Jengibre', 'Tomate triturado', 'Leche de coco', 'Curry', 'Comino'],
                'user_id' => random_int(1, 3),
                'category' => 'Guisos tradicionales',
            ],
            [
                'title' => 'Hummus Casero',
                'image' => 'recipes-img/humus-de-garbanzos.jpg',
                'description' => 'Tritura garbanzos cocidos con tahini, zumo de limón, ajo, sal y aceite de oliva hasta obtener una pasta cremosa. Añade agua si es necesario. Sirve con pimentón y aceite.',
                'difficulty' => 'Fácil',
                'ingredients' => ['Garbanzos cocidos', 'Tahini', 'Limón', 'Ajo', 'Aceite de oliva', 'Pimentón'],
                'user_id' => random_int(1, 3),
                'category' => 'Guisos tradicionales',
            ],
            [
                'title' => 'Pollo al Curry con Arroz Basmati',
                'image' => 'recipes-img/pollo-al-curry-con-arroz-basmati.jpg',
                'description' => 'Corta el pollo en dados y dora con cebolla y ajo. Añade curry, leche de coco y sal. Cocina a fuego lento 20 minutos. Sirve acompañado de arroz basmati cocido.',
                'difficulty' => 'Media',
                'ingredients' => ['Pollo', 'Cebolla', 'Ajo', 'Curry', 'Leche de coco', 'Arroz basmati'],
                'user_id' => random_int(1, 3),
                'category' => 'Carnes',
            ],
            [
                'title' => 'Tiramisú Clásico',
                'image' => 'recipes-img/tiramisu-clasico.jpg',
                'description' => 'Bate yemas con azúcar, mezcla con mascarpone. Monta claras y añade. Sumerge bizcochos en café, alterna capas con la crema. Refrigera y espolvorea cacao.',
                'difficulty' => 'Media',
                'ingredients' => ['Yemas de huevo', 'Azúcar', 'Mascarpone', 'Claras', 'Bizcochos de soletilla', 'Café', 'Cacao en polvo'],
                'user_id' => random_int(1, 3),
                'category' => 'Postres',
            ],
            [
                'title' => 'Tabulé de Cuscús',
                'image' => 'recipes-img/tabule-de-cuscus.jpg',
                'description' => 'Hidrata el cuscús con agua caliente. Añade tomate, pepino, perejil y menta picados. Aliña con limón, sal y aceite. Refrigera antes de servir.',
                'difficulty' => 'Fácil',
                'ingredients' => ['Cuscús', 'Tomate', 'Pepino', 'Perejil', 'Menta', 'Limón', 'Aceite de oliva', 'Sal'],
                'user_id' => random_int(1, 3),
                'category' => 'Guisos tradicionales',
            ],
            [
                'title' => 'Cupcakes de Vainilla',
                'image' => 'recipes-img/cupcakes-de-vainilla.jpg',
                'description' => 'Mezcla harina, azúcar, huevos, mantequilla y vainilla. Rellena moldes y hornea a 180°C durante 20 minutos. Deja enfriar y decora con crema de mantequilla.',
                'difficulty' => 'Fácil',
                'ingredients' => ['Harina', 'Azúcar', 'Huevos', 'Mantequilla', 'Vainilla', 'Crema de mantequilla'],
                'user_id' => random_int(1, 3),
                'category' => 'Postres',
            ],
            [
                'title' => 'Bruschettas Italianas',
                'image' => 'recipes-img/bruschetes-italianas.jpg',
                'description' => 'Tuesta pan, frota con ajo. Mezcla tomate picado con albahaca, aceite y sal. Cubre el pan con la mezcla. Sirve frío.',
                'difficulty' => 'Fácil',
                'ingredients' => ['Pan', 'Ajo', 'Tomate', 'Albahaca', 'Aceite de oliva', 'Sal'],
                'user_id' => random_int(1, 3),
                'category' => 'Pasta',
            ],
            [
                'title' => 'Dorada a la sal',
                'image' => 'recipes-img/dorada-a-la-sal.jpg',
                'description' => 'Pon a precalentar el horno a 200ºC por arriba y por abajo.
En una bandeja de horno, coloca papel de hornear y extiende sobre este una base de sal, de aproximadamente un dedo de grosor. Presiona la sal para que quede compactada, lo más fácil es hacerlo con las manos humedecidas.
Coge la dorada, asegúrate de que está bien limpia por dentro, ponle las dos ramitas de romero y sécala bien con papel de cocina. Después, colócala sobre la sal.
A continuación, utiliza la misma técnica de antes para cubrir la dorada completamente con una capa de sal de un dedo de grosor. Truco: deja fuera sin cubrir sólo una pequeña parte de la cola, de esta forma, más tarde podrás comprobar si el pescado está en su punto.
Introduce la bandeja en el horno y cocina durante 20 minutos. El tiempo estimado de horno para cocinar a la sal es de 20 minutos por kilo de peso del pescado.
Pasados los 20 minutos, saca la bandeja del horno y tira con suavidad de la cola de la dorada. Si se desprende, el pescado está listo, y si no, déjalo en el horno unos pocos minutos más.
Una vez fuera del horno, deja reposar 5 minutos. Después, ayúdate de un cuchillo para romper la costra de sal.
Separa los filetes de dorada y sírvelos con un chorrito de aceite de oliva virgen extra español por encima para que se mezcle con los jugos del pescado y culminar el plato de la mejor manera posible.',
                'difficulty' => 'Fácil',
                'ingredients' => ['1 dorada (de 1 kg)', '2 kg de sal marina gruesa', 'Aceite de Oliva Virgen Extra español', '2 ramitas de romero'],
                'user_id' => random_int(1, 3),
                'category' => 'Pescados',
            ],
            [
                'title' => 'Fajitas de ternera',
                'image' => 'recipes-img/fajitas-de-ternera.jpg',
                'description' => 'Saltea ternera con cebolla y pimientos. Añade especias. Sirve en tortillas calientes con guacamole y salsa al gusto.',
                'difficulty' => 'Media',
                'ingredients' => ['Ternera', 'Cebolla', 'Pimientos', 'Especias tex-mex', 'Tortillas', 'Guacamole'],
                'user_id' => random_int(1, 3),
                'category' => 'Carnes',
            ],
            [
                'title' => 'Lubina a la plancha',
                'image' => 'recipes-img/lubina-a-la-plancha.jpg',
                'description' => 'Con la lubina limpia y sin cabeza, procedemos a cortarla abriéndola en mariposa. Esta tarea es muy sencilla contando con un buen cuchillo, pero también podemos pedírselo al pescadero que normalmente nos la preparará sin problema. Retiramos la espina y una vez limpio el pescado, procedemos a secarlo bien utilizando papel absorbente de cocina por ambas caras.

Preparamos un aliño con ajo y perejil picados y aceite de oliva. Este aliño lo utilizaremos para humedecer la plancha extendiendo unas gotas con una brocha de cocina y cuando la plancha esté bien caliente, procederemos a cocinar la lubina salpimentada al gusto, empezando con la parte de la carne, dejando la piel hacia arriba.

Dejamos cocinar durante tres minutos aproximadamente y damos la vuelta a la pieza con cuidado. Añadimos una pizca más del aliño de aceite de oliva virgen extra con ajo y perejil sobre la carne de la lubina cocinada y dejamos que se haga por la cara de la piel, durante otros tres minutos para que quede bien crujiente pero sin resecarse.',
                'difficulty' => 'Media',
                'ingredients' => ['Lubina de ración', 'Ajo y perejil (un diente de ajo y un manojito de perejil fresco)', 'Aceite de oliva virgen extra(50 ml)', 'Sal y pimienta al gusto'],
                'user_id' => random_int(1, 3),
                'category' => 'Pescados',
            ],
            [
                'title' => 'Boquerones al limón',
                'image' => 'recipes-img/boquerones-al-limon.jpg',
                'description' => 'Limpia los boquerones quitándoles la tripa y la espina, hasta que te queden como en la foto de abajo. Colócalos en un recipiente y échales sal.
Pon los ajos pelados y el zumo de limón en un mortero. Machácalos. Reparte por los boquerones. Mete el recipiente en el frigorífico durante una media hora.
Sácalos, rebózalos en harina y golpéalos suavemente con tus dedos para eliminar la harina sobrante.
Calienta abundante aceite de oliva virgen extra en una sartén no muy grande. Fríelos con paciencia.
Ponlos a escurrir en un colador y a continuación pásalos a un papel de hornear. Sírvelos inmediatamente',
                'difficulty' => 'Dificil',
                'ingredients' => ['1 kg de boquerones', '1 limón', '2 dientes de ajo', 'Sal', 'Harina', 'Aceite de oliva virgen extra'],
                'user_id' => random_int(1, 3),
                'category' => 'Pescados',
            ],
        ];


        foreach ($recipes as $recipe) {
            $ingredients = $recipe['ingredients'];
            unset($recipe['ingredients']);

            // Convertir 'category' (nombre) a category_id (número)
            $recipe['category_id'] = $categories[$recipe['category']];
            unset($recipe['category']);

            // Crear la receta
            $recipe = Recipe::create($recipe);

            // Crear ingredientes asociados
            foreach ($ingredients as $ingredientName) {
                $recipe->ingredients()->create(['name' => $ingredientName]);
            }
        }
    }
}
