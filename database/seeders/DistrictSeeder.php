<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        District::create(['name' => 'Puntarenas', 'canton_id' => 1]);
        District::create(['name' => 'Pitahaya', 'canton_id' => 1]);
        District::create(['name' => 'Chomes', 'canton_id' => 1]);
        District::create(['name' => 'Lepanto', 'canton_id' => 1]);
        District::create(['name' => 'Paquera', 'canton_id' => 1]);
        District::create(['name' => 'Manzanillo', 'canton_id' => 1]);
        District::create(['name' => 'Guacimal', 'canton_id' => 1]);
        District::create(['name' => 'Barranca', 'canton_id' => 1]);
        District::create(['name' => 'Monteverde', 'canton_id' => 1]);
        District::create(['name' => 'Isla del Coco', 'canton_id' => 1]);
        District::create(['name' => 'Cóbano', 'canton_id' => 1]);
        District::create(['name' => 'Chacarita', 'canton_id' => 1]);
        District::create(['name' => 'Chira', 'canton_id' => 1]);
        District::create(['name' => 'Acapulco', 'canton_id' => 1]);
        District::create(['name' => 'El Roble', 'canton_id' => 1]);
        District::create(['name' => 'Esparza centro', 'canton_id' => 2]);
        District::create(['name' => 'Espíritu Santo', 'canton_id' => 2]);
        District::create(['name' => 'San Juan', 'canton_id' => 2]);
        District::create(['name' => 'San Rafael', 'canton_id' => 2]);
        District::create(['name' => 'San Jerónimo', 'canton_id' => 2]);
    }
}
