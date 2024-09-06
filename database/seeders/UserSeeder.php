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
        User::create(['name'=>'Andrea Gutiérrez','email'=>'andrea.gutierrez@gmail.com','password'=>bcrypt('123456'),'location'=>"https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9",'user_type_id'=>2,'canton_id'=>1,'district_id'=>1]);
        User::create(['name'=>'Carlos Ramírez','email'=>'carlos.ramirez@gmail.com','password'=>bcrypt('123456'),'location'=>"https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9",'user_type_id'=>2,'canton_id'=>1,'district_id'=>1]);
        User::create(['name'=>'Sofía Vargas','email'=>'sofia.vargas@gmail.com','password'=>bcrypt('123456'),'location'=>"https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9",'user_type_id'=>2,'canton_id'=>1,'district_id'=>1]);
        User::create(['name'=>'Miguel Castro','email'=>'miguel.castro@gmail.com','password'=>bcrypt('123456'),'location'=>"https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9",'user_type_id'=>2,'canton_id'=>1,'district_id'=>1]);
        User::create(['name'=>'Mariana Jiménez','email'=>'mariana.jimenez@gmail.com','password'=>bcrypt('123456'),'location'=>"https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9",'user_type_id'=>2,'canton_id'=>1,'district_id'=>1]);
        User::create(['name'=>'José Fernández','email'=>'jose.fernandez@gmail.com','password'=>bcrypt('123456'),'location'=>"https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9",'user_type_id'=>2,'canton_id'=>1,'district_id'=>1]);
        User::create(['name'=>'Daniela Solano','email'=>'daniela.solano@gmail.com','password'=>bcrypt('123456'),'location'=>"https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9",'user_type_id'=>2,'canton_id'=>1,'district_id'=>1]);
        User::create(['name'=>'Juan Pérez','email'=>'juan.perez@gmail.com','password'=>bcrypt('123456'),'location'=>"https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9",'user_type_id'=>2,'canton_id'=>1,'district_id'=>1]);
        User::create(['name'=>'Laura Mora','email'=>'laura.mora@gmail.com','password'=>bcrypt('123456'),'location'=>"https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9",'user_type_id'=>2,'canton_id'=>1,'district_id'=>1]);
        User::create(['name'=>'Diego Rojas','email'=>'diego.rojas@gmail.com','password'=>bcrypt('123456'),'location'=>"https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9",'user_type_id'=>2,'canton_id'=>1,'district_id'=>1]);
    }
}
