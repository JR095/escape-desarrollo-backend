<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create(['name'=>'Soda Maria','email'=>'soda.maria@gmail.com','password'=>bcrypt('123456'),'location'=>"https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9",'user_type_id'=>2,'canton_id'=>1,'district_id'=>1]);
    }
}
