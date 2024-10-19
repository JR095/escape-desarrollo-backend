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
        Company::create(['name' => 'Pasteles Morado', 'phone_number' => '60996428', 'category_id' => 1, 'email' => 'pastelesmorado@gmail.com', 'description' => 'Los pasteles de Esparza.', 'canton_id' => 2, 'district_id' => 16, 'latitude' => 9.992207562473999, 'longitude' => -84.6663614791357,  'followers_count' => 0, 'image' => 'PastelesMorados.png', 'user_type_id' => 1, 'sub_categories_id' => 3, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'Feria del Agricultor Esparza', 'phone_number' => '26355066', 'category_id' => 2, 'email' => 'feriadelagricultor@gmail.com', 'description' => 'Feria del Agricultor.', 'canton_id' => 2, 'district_id' => 20, 'latitude' =>9.997856584543099, 'longitude' => -84.65633061549458 ,  'followers_count' => 0, 'image' => 'FeriaEsparza.png', 'user_type_id' => 1, 'sub_categories_id' => 9, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'Panaderia Y Repostería Andy', 'phone_number' => '26350166', 'category_id' => 1, 'email' => 'panaderiaandy@gmail.com', 'description' => 'Panaderia Y Repostería.', 'canton_id' => 2, 'district_id' => 21, 'latitude' =>9.999931856514682, 'longitude' => -84.65926133071174 ,'followers_count' => 0, 'image' => 'PanaderiaAndy.png', 'user_type_id' => 1, 'sub_categories_id' => 4, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'Tortillería La Esparzana', 'phone_number' => '88831515', 'category_id' => 1, 'email' => 'tortillerialaesparzana@gmail.com', 'description' => 'Comida Criolla 100% a la leña.', 'canton_id' => 2, 'district_id' => 20, 'latitude' =>9.994986984768147, 'longitude' => -84.64705241781839, 'followers_count' => 0, 'image' => 'TortilleriaLaEsparzana.png', 'user_type_id' => 1, 'sub_categories_id' => 3, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'Balneario y Restaurante El Pavo Real', 'phone_number' => '26366039', 'category_id' => 5, 'email' => 'balnearioyrestauranteelpavoreal@gmail.com', 'description' => 'Balneario y Restaurante El Pavo Real.', 'canton_id' => 2, 'district_id' => 20, 'latitude' =>9.99506622978389, 'longitude' => -84.64257581096673 , 'followers_count' => 0, 'image' => 'BalnearioPavoReal.png', 'user_type_id' => 1, 'sub_categories_id' => 20, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'Garabatos Cafetería Gourmet', 'phone_number' => '6141 9320', 'category_id' => 1, 'email' => 'garabatosgourmet@gmail.com', 'description' => 'La mejor cafetería de Esparza.', 'canton_id' => 2, 'district_id' => 16, 'latitude' => 9.99125805192547, 'longitude' => -84.66827240274364, 'followers_count' => 0, 'image' => 'Garabatos_cafetería.png', 'user_type_id' => 1, 'sub_categories_id' => 4, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'Yulys Fashion Boutique', 'phone_number' => '2635 2812', 'category_id' => 2, 'email' => 'yulysfashion@gmail.com', 'description' => 'En Yulys Fashion Boutique, te ofrecemos una amplia selección de moda para todas las ocasiones. Desde estilos casuales y elegantes hasta las últimas tendencias.', 'canton_id' => 2, 'district_id' => 16, 'latitude' => 9.991274802762513, 'longitude' => -84.66720010260998, 'followers_count' => 0, 'image' => 'Yulys_Boutique.jpg', 'user_type_id' => 1, 'sub_categories_id' => 6, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'Tienda Y Zapateria Moda Sport', 'phone_number' => '2636 6990', 'category_id' => 2, 'email' => 'modasport@gmail.com', 'description' => 'En Tienda Y Zapateria Moda Sport, nos especializamos en calzado deportivo diseñado para mejorar tu rendimiento. Ofrecemos una variedad de zapatillas de alta calidad para correr, entrenar, y practicar tus deportes favoritos.', 'canton_id' => 2, 'district_id' => 16, 'latitude' => 9.991933550266353, 'longitude' => -84.66538173063141, 'followers_count' => 0, 'image' => 'Moda_Sport.jpg', 'user_type_id' => 1, 'sub_categories_id' => 6, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'CompuCenter Esparza', 'phone_number' => '8442 3636', 'category_id' => 2, 'email' => 'compucenteresparza@gmail.com', 'description' => 'Excelencia a su servicio en Laptops y Equipo Desktop.', 'canton_id' => 2, 'district_id' => 16, 'latitude' => 9.994456399045317, 'longitude' => -84.66443268824577, 'followers_count' => 0, 'image' => 'Compucenter.jpg', 'user_type_id' => 1, 'sub_categories_id' => 8, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'Anfiteatro Cultural La Concha Acústica', 'phone_number' => '8633 2607', 'category_id' => 5, 'email' => 'anfiteatroconchaacustica@gmail.com', 'description' => 'El Anfiteatro La Concha Acústica es un espacio al aire libre diseñado para ofrecer experiencias inolvidables. Con su arquitectura es el lugar perfecto para disfrutar de conciertos, obras de teatro, y eventos culturales en un entorno único.', 'canton_id' => 1, 'district_id' => 1, 'latitude' => 9.975321623202756, 'longitude' => -84.8334189831829, 'followers_count' => 0, 'image' => 'Anfiteatro.jpg', 'user_type_id' => 1, 'sub_categories_id' => 19, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'Catarata Pelton', 'phone_number' => '0000 0000', 'category_id' => 3, 'email' => 'cataratapelton@gmail.com', 'description' => ' catarata pelton', 'canton_id' => 2, 'district_id' => 21, 'latitude' => 9.982312500176393, 'longitude' => -84.67652988098179,'followers_count' => 0, 'image' => 'CatarataPelton.png', 'user_type_id' => 1, 'sub_categories_id' => 13, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'Parque Ignacio Pérez Zamora', 'phone_number' => '26360100', 'category_id' => 3, 'email' => 'info@muniesparza.go.cr', 'description' => 'Parque Ignacio Pérez Zamora es un lugar ideal para visitar.', 'canton_id' => 2, 'district_id' => 16, 'latitude' => 9.99015986574226, 'longitude' => -84.66664526130373, 'followers_count' => 0, 'image' => 'ParqueIgnacioPerez.png', 'user_type_id' => 1, 'sub_categories_id' => 12, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'EXPO FERIA DEL AGUACATE ESPARZA', 'phone_number' => '82738200', 'category_id' => 2, 'email' => 'feriadelaguacate@gmail.com', 'description' => 'EXPO FERIA DEL AGUACATE ESPARZA', 'canton_id' => 2, 'district_id' => 19, 'latitude' => 10.033818412553126, 'longitude' => -84.64035173818463,  'followers_count' => 0, 'image' => 'FeriaAguacate.png', 'user_type_id' => 1, 'sub_categories_id' => 9, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'Centro Agrícola Cantonal de Esparza', 'phone_number' => '26355066', 'category_id' => 2, 'email' => 'cantonaldeesparza@gmail.com', 'description' => 'Centro Agrícola Cantonal de Esparza', 'canton_id' => 2, 'district_id' => 16, 'latitude' => 9.990581813146688, 'longitude' => -84.66440214053654 ,  'followers_count' => 0, 'image' => 'centroagricola.jpg', 'user_type_id' => 1, 'sub_categories_id' => 9, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'Parque Marino del Pacífico', 'phone_number' => '2661 5272', 'category_id' => 4, 'email' => 'contacto@parquemarino.org', 'description' => 'El Parque Marino del Pacífico es una organización interinstitucional, liderada por el Ministerio de Ambiente, Energía y Telecomunicaciones (MINAET).', 'canton_id' => 1, 'district_id' => 1, 'latitude' => 9.977137104531556, 'longitude' => -84.82671265157417, 'followers_count' => 0, 'image' => 'acuario.jpg', 'user_type_id' => 1, 'sub_categories_id' => 14, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'Serenity Spa Costa Rica', 'phone_number' => '2630 3036', 'category_id' => 6, 'email' => 'serenityspacr@gmail.com', 'description' => 'Con más de 30 años de experiencia en spa y 20 años de servicio profesional y confiable en Costa Rica, Serenity Spa ofrece tratamientos de spa excepcionales y memorables.', 'canton_id' => 1, 'district_id' => 1, 'latitude' => 9.687991097124309, 'longitude' => -84.66003395576216, 'followers_count' => 0, 'image' => 'spa.jpeg', 'user_type_id' => 1, 'sub_categories_id' => 22, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'Restaurante La Takería', 'phone_number' => '2661 1050', 'category_id' => 1, 'email' => 'latakeria@gmail.com', 'description' => 'Comida mexicana, carnes de primera e ingredientes frescos frente al mar en el Paseo de los Turistas', 'canton_id' => 1, 'district_id' => 1, 'latitude' => 9.974952598605839, 'longitude' => -84.84415461769574, 'followers_count' => 0, 'image' => 'La_Takeria.jpg', 'user_type_id' => 1, 'sub_categories_id' => 1, 'password' => bcrypt('12345')]);
        Company::create(['name' => 'Tiento Café Lounge', 'phone_number' => '8799 5959', 'category_id' => 1, 'email' => 'cafelounge@gmail.com', 'description' => 'Ven y disfruta de una amplia variedad de cafés, tés, bebidas calientes y frías, junto con una selección de pasteles, bocadillos y postres.', 'canton_id' => 2, 'district_id' => 16, 'latitude' => 9.999243548968723, 'longitude' => -84.65761104128667, 'followers_count' => 0, 'image' => 'cafe_lounge.jpg', 'user_type_id' => 1, 'sub_categories_id' => 4, 'password' => bcrypt('12345')]);
    }
}