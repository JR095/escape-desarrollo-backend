<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Canton;

class CantonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Canton::create(['name'=>'Puntarenas']);
        Canton::create(['name'=>'Esparza']);
        Canton::create(['name'=>'Buenos Aires']);
        Canton::create(['name'=>'Montes de Oro']);
        Canton::create(['name'=>'Osa']);
        Canton::create(['name'=>'Aguirre']);
        Canton::create(['name'=>'Golfito']);
        Canton::create(['name'=>'Coto Brus']);
        Canton::create(['name'=>'Parrita']);
        Canton::create(['name'=>'Corredores']);
        Canton::create(['name'=>'Garabito']);
    }
}
