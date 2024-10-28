<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name'=>'Andrea Gutiérrez','email'=>'andrea.gutierrez@gmail.com','password'=>bcrypt('123456'),'latitude'=>0.0,'longitude'=>0.0,'image' => 'Usuario.png','user_type_id'=>2, 'canton_id' => 1, 'district_id' => 1,'preferences_1'=>'Soda','preferences_2'=>'Cafe','preferences_3'=>'Cerveza']);
        User::create(['name'=>'Carlos Ramírez','email'=>'carlos.ramirez@gmail.com','password'=>bcrypt('123456'),'latitude'=>0.0,'longitude'=>0.0,'image' => 'Usuario.png','user_type_id'=>2, 'canton_id' => 1, 'district_id' => 1,'preferences_1'=>'Soda','preferences_2'=>'Cafe','preferences_3'=>'Cerveza']);
        User::create(['name'=>'Sofía Vargas','email'=>'sofia.vargas@gmail.com','password'=>bcrypt('123456'),'latitude'=>0.0,'longitude'=>0.0,'image' => 'Usuario.png','user_type_id'=>2, 'canton_id' => 1, 'district_id' => 1,'preferences_1'=>'Soda','preferences_2'=>'Cafe','preferences_3'=>'Cerveza']);  
    }
}
