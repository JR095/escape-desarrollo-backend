<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post_place;

class Post_PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post_place::create(['company_id' => 1, 'description' => 'Comida rápida de sandwiches.', 'image' => 'image0.jpg', 'address' => 'Puntarenas', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 2, 'description' => 'Musmanni te acompaña con opciones deliciosas y nutritivas para cualquier momento del día.', 'image' => 'Musmanni.png', 'address' => 'Esparza Centro', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 3, 'description' => 'Todos tenemos un sabor de helado de POPS que nos transporta a algún momento de nuestra vida.', 'image' => 'Pops.png', 'address' => 'Esparza Centro', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 4, 'description' => 'Sabor de hogar', 'image' => 'SodaLasTorrejas.png', 'address' => 'Esparza Centro', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 5, 'description' => 'Garantizamos un ambiente tranquilo, familiar y de comida deliciosa, siempre comprometidos con el bien de los clientes.', 'image' => 'Navarra.jpg', 'address' => 'Macacona', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 6, 'description' => 'En Grupo Monge somos una corporación de capital costarricense que se dedica a la venta al detalle de electrodomésticos y muebles en Centroamérica y Sudamérica.', 'image' => 'Monge.png', 'address' => 'Esparza Centro', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 7, 'description' => 'Las Mejores Pizzas.', 'image' => 'Pizza_Express.jpg', 'address' => 'Esparza Centro', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 8, 'description' => 'El Outlet de Esparza, con los mejores descuentos y artículos exclusivos. Descubre el lujo de comprar a precios irresistibles', 'image' => 'USA_Outlet.jpg', 'address' => 'Esparza Centro', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 9, 'description' => 'Los pasteles de Esparza.', 'image' => 'PastelesMorados.png', 'address' => 'Esparza Centro', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 10, 'description' => 'Feria del Agricultor.', 'image' => 'FeriaEsparza.png', 'address' => 'Macacona', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 11, 'description' => 'Panaderia Y Repostería.', 'image' => 'PanaderiaAndy.png', 'address' => 'Espiritu Santo', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 12, 'description' => 'Comida Criolla 100% a la leña.', 'image' => 'TortilleriaLaEsparzana.png', 'address' => 'Macacona', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 13, 'description' => 'Balneario y Restaurante El Pavo Real.', 'image' => 'BalnearioPavoReal.png', 'address' => 'Macacona', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 14, 'description' => 'La mejor cafetería de Esparza.', 'image' => 'Garabatos_cafetería.png', 'address' => 'Esparza Centro', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 15, 'description' => 'En Yulys Fashion Boutique, te ofrecemos una amplia selección de moda para todas las ocasiones. Desde estilos casuales y elegantes hasta las últimas tendencias.', 'image' => 'Yulys_Boutique.jpg', 'address' => 'Esparza Centro', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 16, 'description' => 'En Tienda Y Zapateria Moda Sport, nos especializamos en calzado deportivo diseñado para mejorar tu rendimiento. Ofrecemos una variedad de zapatillas de alta calidad para correr, entrenar, y practicar tus deportes favoritos.', 'image' => 'Moda_Sport.jpg', 'address' => 'Esparza Centro', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 17, 'description' => 'Excelencia a su servicio en Laptops y Equipo Desktop.', 'image' => 'Compucenter.jpg', 'address' => 'Esparza Centro', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 18, 'description' => 'El Anfiteatro La Concha Acústica es un espacio al aire libre diseñado para ofrecer experiencias inolvidables. Con su arquitectura es el lugar perfecto para disfrutar de conciertos, obras de teatro, y eventos culturales en un entorno único.', 'image' => 'Anfiteatro.jpg', 'address' => 'Puntarenas', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 19, 'description' => 'catarata pelton', 'image' => 'CatarataPelton.png', 'address' => 'Espiritu Santo', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 20, 'description' => 'Parque Ignacio Pérez Zamora es un lugar ideal para visitar.', 'image' => 'ParqueIgnacioPerez.png', 'address' => 'Esparza Centro', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 21, 'description' => 'EXPO FERIA DEL AGUACATE ESPARZA', 'image' => 'FeriaAguacate.png', 'address' => 'San Jerónimo', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 22, 'description' => 'Centro Agrícola Cantonal de Esparza', 'image' => 'centroagricola.jpg', 'address' => 'Esparza Centro', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 23, 'description' => 'El Parque Marino del Pacífico es una organización interinstitucional, liderada por el Ministerio de Ambiente, Energía y Telecomunicaciones (MINAET).', 'image' => 'acuario.jpg', 'address' => 'Puntarenas', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 24, 'description' => 'Con más de 30 años de experiencia en spa y 20 años de servicio profesional y confiable en Costa Rica, Serenity Spa ofrece tratamientos de spa excepcionales y memorables.', 'image' => 'spa.jpeg', 'address' => 'Puntarenas', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 25, 'description' => 'Comida mexicana, carnes de primera e ingredientes frescos frente al mar en el Paseo de los Turistas', 'image' => 'La_Takeria.jpg', 'address' => 'Puntarenas', 'average_rating' => 0, 'approximate_price' => 1500]);
        Post_place::create(['company_id' => 26, 'description' => 'Ven y disfruta de una amplia variedad de cafés, tés, bebidas calientes y frías, junto con una selección de pasteles, bocadillos y postres.', 'image' => 'cafe_lounge.jpg', 'address' => 'Esparza Centro', 'average_rating' => 0, 'approximate_price' => 1500]);
    }
}
