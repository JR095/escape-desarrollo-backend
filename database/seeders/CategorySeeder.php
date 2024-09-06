<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name'=>'Restaurantes']);
        Category::create(['name'=>'Sodas']);
        Category::create(['name'=>'Comida Callejera']);
        Category::create(['name'=>'Cafeterías']);
        Category::create(['name'=>'Bares']);
        Category::create(['name'=>'Heladerías']);
        Category::create(['name'=>'Tiendas de Ropa']);
        Category::create(['name'=>'Artesanías']);
        Category::create(['name'=>'Mercados']);
        Category::create(['name'=>'Ferias']);
        Category::create(['name'=>'Caminatas']);
        Category::create(['name'=>'Deportes de Aventura']);
        Category::create(['name'=>'Parques y Jardines']);
        Category::create(['name'=>'Museos']);
        Category::create(['name'=>'Teatros']);
        Category::create(['name'=>'Cine']);
        Category::create(['name'=>'Conciertos']);
        Category::create(['name'=>'Spas']);
        Category::create(['name'=>'Excursiones Naturales']);
        Category::create(['name'=>'Discotecas']);
    }
}
