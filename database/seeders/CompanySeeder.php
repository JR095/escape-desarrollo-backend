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
        Company::create(['name' => 'Subway', 'phone_number' => '40529539', 'category_id' => 1, 'email' => 'subway@email.com', 'description' => 'Comida rápida de sandwiches.', 'canton_id' => 1, 'district_id' => 1,'latitude'=>9.985790925563698,'longitude'=>-84.73892640719382, 'followers_count' => 0,'image' => 'image0.jpg','user_type_id'=>1,'sub_categories_id'=>1,'password'=>bcrypt('123456')]);
        Company::create(['name' => 'Musmanni Esparza', 'phone_number' => '89897868', 'category_id' => 1, 'email' => 'servicioalclientemusmanni@musmanni.com', 'description' => 'Musmanni te acompaña con opciones deliciosas y nutritivas para cualquier momento del día.', 'canton_id' => 2, 'district_id' => 16,'latitude'=>9.991431447276888,'longitude'=>-84.6660658773303 , 'followers_count' => 0,'image' => 'Musmanni.png','user_type_id'=>1,'sub_categories_id'=>4,'password'=>bcrypt('123456')]);
        Company::create(['name' => 'Pops Esparza', 'phone_number' => '89897736', 'category_id' => 1, 'email' => 'servicioalcliente@pops.co.cr', 'description' => 'Todos tenemos un sabor de helado de POPS que nos transporta a algún momento de nuestra vida.', 'canton_id' => 2, 'district_id' => 16,'latitude'=>9.990365660207056,'longitude'=>-84.66704998166018,  'followers_count' => 0,'image' => 'Pops.png','user_type_id'=>1,'sub_categories_id'=>5,'password'=>bcrypt('123456')]);
        Company::create(['name' => 'Soda Las Torrejas', 'phone_number' => '26351515', 'category_id' => 1, 'email' => 'servicioalclientesoda@las-torrejas.com', 'description' => 'Sabor de hogar', 'canton_id' => 2, 'district_id' => 16,'latitude'=>9.990779066140592,'longitude'=>-84.66719045136163,'followers_count' => 0,'image' => 'SodaLasTorrejas.png','user_type_id'=>1,'sub_categories_id'=>2,'password'=>bcrypt('123456')]);
        Company::create(['name' => 'Bar Y Restaurante Navarra', 'phone_number' => '89723773', 'category_id' => 5, 'email' => 'baryrestaurantenavarra@gmail.com', 'description' => 'Garantizamos un ambiente tranquilo, familiar y de comida deliciosa, siempre comprometidos con el bien de los clientes', 'canton_id' => 2, 'district_id' => 20,'latitude'=>9.995020237226077,'longitude'=> -84.65360995764179,'followers_count' => 0,'image' => 'Navarra.jpg','user_type_id'=>1,'sub_categories_id'=>21,'password'=>bcrypt('123456')]);
        Company::create(['name' => 'Monge', 'phone_number' => '26355880', 'category_id' => 2, 'email' => 'servicio@grupomonge.com', 'description' => 'En Grupo Monge somos una corporación de capital costarricense que se dedica a la venta al detalle de electrodomésticos y muebles en Centroamérica y Sudamérica', 'canton_id' => 2, 'district_id' => 16, 'latitude' => 9.990989716017838, 'longitude' => -84.66671303151188, 'followers_count' => 0, 'image' => 'Monge.png', 'user_type_id' => 1, 'sub_categories_id' => 8, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'Pizza Express Esparza', 'phone_number' => '2635 2323', 'category_id' => 1, 'email' => 'servicioalclientepizzaexpress@pizzaexpress.com', 'description' => 'Las Mejores Pizzas', 'canton_id' => 2, 'district_id' => 16, 'latitude' => 9.990933767884092, 'longitude' => -84.66578096141134, 'followers_count' => 0, 'image' => 'Pizza_Express.jpg', 'user_type_id' => 1, 'sub_categories_id' => 1, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'USA Outlet', 'phone_number' => '2101 8082', 'category_id' => 2, 'email' => 'usaoutletcr@gmail.com', 'description' => 'El Outlet de Esparza, con los mejores descuentos y artículos exclusivos. Descubre el lujo de comprar a precios irresistibles.', 'canton_id' => 2, 'district_id' => 16, 'latitude' => 9.99234852308037, 'longitude' => -84.6654115222236, 'followers_count' => 0, 'image' => 'USA_Outlet.jpg', 'user_type_id' => 1, 'sub_categories_id' => 8, 'password' => bcrypt('12345')]);
    }
}