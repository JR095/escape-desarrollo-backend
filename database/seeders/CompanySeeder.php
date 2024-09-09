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
        Company::create(['name' => 'Soda Maria','phone_number' => '123-456-7890','category_id' => 1,'email' => 'info.sodamaria@gmail.com','description' => 'Un restaurante tradicional con comida casera.','canton_id' => 1,'district_id' => 1,'address' => 'https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9','followers_count' => 150,'image' => 'image1.jpeg']);
        Company::create(['name' => 'Cafetería El Buen Café', 'phone_number' => '234-567-8901', 'category_id' => 1, 'email' => 'contactobuen-cafe@gmail.com', 'description' => 'Café con un ambiente acogedor y excelente café.', 'canton_id' => 1, 'district_id' => 2, 'address' => 'https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9', 'followers_count' => 200,'image' => 'image1.jpeg']);
        Company::create(['name' => 'Tienda de Ropa Fashion Trend', 'phone_number' => '345-678-9012', 'category_id' => 2, 'email' => 'info@fashiontrend.com', 'description' => 'Ropa a la moda para todas las edades.', 'canton_id' => 2, 'district_id' => 1, 'address' => 'https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9', 'followers_count' => 500,'image' => 'image2.jpeg']);
        Company::create(['name' => 'Museo de Arte Contemporáneo', 'phone_number' => '456-789-0123', 'category_id' => 5, 'email' => 'info@museoarte.com', 'description' => 'Museo con exposiciones de arte moderno y contemporáneo.', 'canton_id' => 3, 'district_id' => 3, 'address' => 'https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9', 'followers_count' => 300,'image' => 'image3.jpeg']);
        Company::create(['name' => 'Gimnasio FitLife', 'phone_number' => '567-890-1234', 'category_id' => 6, 'email' => 'contacto@fitlife.com', 'description' => 'Gimnasio con equipos modernos y entrenadores profesionales.', 'canton_id' => 2, 'district_id' => 2, 'address' => 'https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9', 'followers_count' => 350,'image' => 'image4.jpeg']);
        Company::create(['name' => 'Librería La Palabra', 'phone_number' => '678-901-2345', 'category_id' => 2, 'email' => 'info@librerialapalabra.com', 'description' => 'Librería con una gran selección de libros y material de lectura.', 'canton_id' => 1, 'district_id' => 1, 'address' => 'https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9', 'followers_count' => 250,'image' => 'image5.jpeg']);
        Company::create(['name' => 'Centro de Belleza Belleza Natural', 'phone_number' => '789-012-3456', 'category_id' => 6, 'email' => 'contacto@bellezanatural.com', 'description' => 'Servicios de belleza y cuidado personal en un ambiente relajante.', 'canton_id' => 3, 'district_id' => 3, 'address' => 'https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9', 'followers_count' => 400,'image' => 'image7.jpeg']);
        Company::create(['name' => 'Farmacia Salud Total', 'phone_number' => '890-123-4567', 'category_id' => 2, 'email' => 'info@farmaciasaludtotal.com', 'description' => 'Farmacia con una amplia gama de productos de salud y bienestar.', 'canton_id' => 2, 'district_id' => 1, 'address' => 'https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9', 'followers_count' => 220,'image' => 'image8.jpg']);
        Company::create(['name' => 'Centro de Entretenimiento Diversión Total', 'phone_number' => '012-345-6789', 'category_id' => 4, 'email' => 'info@diversiontotal.com', 'description' => 'Centro de entretenimiento con actividades para toda la familia.', 'canton_id' => 3, 'district_id' => 2, 'address' => 'https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9', 'followers_count' => 500,'image' => 'image9.jpg']);
        Company::create(['name' => 'Panadería Dulces Deliciosos', 'phone_number' => '123-456-7891', 'category_id' => 2, 'email' => 'contacto@dulcesdeliciosos.com', 'description' => 'Panadería con una variedad de panes y pasteles recién horneados.', 'canton_id' => 2, 'district_id' => 3, 'address' => 'https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9', 'followers_count' => 300,'image' => 'image11.jpeg']);
        Company::create(['name' => 'Piscinas Verano Azul', 'phone_number' => '678-901-2346', 'category_id' => 3, 'email' => 'contacto@veranoazul.com', 'description' => 'Piscinas para disfrutar del verano y relajarse.', 'canton_id' => 3, 'district_id' => 2, 'address' => 'https://maps.app.goo.gl/3JJ8mUc7X9i6Hgvb9', 'followers_count' => 250,'image' => 'image10.jpg']);
    }
}