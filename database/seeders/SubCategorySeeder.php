<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubCategory::create(['name' => 'Restaurantes', 'category_id' => 1]);
        SubCategory::create(['name' => 'Sodas', 'category_id' => 1]);
        SubCategory::create(['name' => 'Comida Callejera', 'category_id' => 1]);
        SubCategory::create(['name' => 'Cafeterías', 'category_id' => 1]);
        SubCategory::create(['name' => 'Heladerías', 'category_id' => 1]);
        SubCategory::create(['name' => 'Tiendas de Ropa', 'category_id' => 2]);
        SubCategory::create(['name' => 'Artesanías', 'category_id' => 2]);
        SubCategory::create(['name' => 'Mercados', 'category_id' => 2]);
        SubCategory::create(['name' => 'Ferias', 'category_id' => 2]);
        SubCategory::create(['name' => 'Caminatas', 'category_id' => 3]);
        SubCategory::create(['name' => 'Deportes de Aventura', 'category_id' => 3]);
        SubCategory::create(['name' => 'Parques y Jardines', 'category_id' => 3]);
        SubCategory::create(['name' => 'Excursiones Naturales', 'category_id' => 3]);
        SubCategory::create(['name' => 'Museos', 'category_id' => 4]);
        SubCategory::create(['name' => 'Teatros', 'category_id' => 4]);
        SubCategory::create(['name' => 'Exposiciones de Arte', 'category_id' => 4]);
        SubCategory::create(['name' => 'Cine', 'category_id' => 5]);
        SubCategory::create(['name' => 'Conciertos', 'category_id' => 5]);
        SubCategory::create(['name' => 'Festivales', 'category_id' => 5]);
        SubCategory::create(['name' => 'Piscinas', 'category_id' => 5]);
        SubCategory::create(['name' => 'Discotecas', 'category_id' => 5]);
        SubCategory::create(['name' => 'Spas', 'category_id' => 6]);

    }
}
