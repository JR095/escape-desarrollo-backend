<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User_Type;

class User_TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User_Type::create(['name'=>'Company']);
        User_Type::create(['name'=>'User']);
        User_Type::create(['name'=>'Premium']);
        User_Type::create(['name'=>'Admin']);



    }
}
