<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create(['name'=>'Puntarenas']);
        Location::create(['name'=>'Esparza']);
        Location::create(['name'=>'Buenos Aires']);
        Location::create(['name'=>'Montes de Oro']);
        Location::create(['name'=>'Osa']);
        Location::create(['name'=>'Aguirre']);
        Location::create(['name'=>'Golfito']);
        Location::create(['name'=>'Coto Brus']);
        Location::create(['name'=>'Parrita']);
        Location::create(['name'=>'Corredores']);
        Location::create(['name'=>'Garabito']);


    }
}
