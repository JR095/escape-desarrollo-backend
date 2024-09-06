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
       Category::create(['name' => 'Comida y Bebida']);
       Category::create(['name' => 'Compras']);
       Category::create(['name' => 'Actividades al Aire Libre']);
       Category::create(['name' => 'Entretenimiento']);
       Category::create(['name' => 'Cultura']);
       Category::create(['name' => 'Bienestar y Relajación']);
        
    }
}
