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
        User::create(['name'=>'Discotecas','email'=>'test@example.com','password'=>bcrypt('123456'),'phone_number'=>'123456789','location_id'=>1,'preference_id'=>1]);

    }
}
