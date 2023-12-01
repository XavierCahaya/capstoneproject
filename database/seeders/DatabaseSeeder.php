<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Promo;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        Category::create([
            'name' => 'Minuman',
        ]);

        Category::create([
            'name' => 'Makanan',
        ]);

        Category::create([
            'name' => 'Snack',
        ]);

        $promoData = [
            [
                'title' => 'Banner',
                'image' => 'Banner.png',
                'status' => '0',
            ],
            [
                'title' => 'Promo1',
                'image' => 'Promo1.png',
                'status' => '0',
            ],
            
        ];
    
        foreach ($promoData as $promo) {
            $imagePath = public_path('images/promo/' . $promo['image']);
    
            if (File::exists($imagePath)) {
                Promo::create([
                    'title' => $promo['title'],
                    'image' => $promo['image'],
                    'status' => $promo['status'],
                ]);
            } else {
                echo "File gambar tidak ditemukan: {$promo['image']}\n";
            }
        }

        $productData = [
            [
                'category_id' => '2',
                'name' => 'Mie Jebew Ori',
                'description' => 'Mie Jebew Original Taste',
                'price' => '8000',
                'image' => 'mie_jebew.webp',
                'status' =>  'aktif',
            ],
            [
                'category_id' => '2',
                'name' => 'Mie Jebew Komplit',
                'description' => 'Mie Jebew Komplit Taste',
                'price' => '10000',
                'image' => 'mie_jebew_komplit.webp',
                'status' =>  'aktif',
            ],
            [
                'category_id' => '2',
                'name' => 'I-Katszu',
                'description' => 'I-Katzsu taste',
                'price' => '8000',
                'image' => 'i-katszu.png',
                'status' =>  'aktif',
            ],
            [
                'category_id' => '3',
                'name' => 'Spicy Wonton',
                'description' => 'Spicy Wonton Taste',
                'price' => '8000',
                'image' => 'spicy_wonton.webp',
                'status' =>  'aktif',
            ],
            [
                'category_id' => '3',
                'name' => 'Wonton Crishpy',
                'description' => 'Wonton Crishpy Taste',
                'price' => '8000',
                'image' => 'wonton_crishpy.jpg',
                'status' =>  'aktif',
            ],
            [
                'category_id' => '1',
                'name' => 'Mojito Mangga',
                'description' => 'Mojito Taste',
                'price' => '5000',
                'image' => 'mojito_mangga.webp',
                'status' =>  'aktif',
            ],
            [
                'category_id' => '1',
                'name' => 'Mojito Melon',
                'description' => 'Mojito Taste',
                'price' => '5000',
                'image' => 'mojito_melon.webp',
                'status' =>  'aktif',
            ],
            [
                'category_id' => '1',
                'name' => 'Mojito Jeruk',
                'description' => 'Mojito Taste',
                'price' => '5000',
                'image' => 'mojito_jeruk.webp',
                'status' =>  'aktif',
            ],
            [
                'category_id' => '1',
                'name' => 'Mojito Leci',
                'description' => 'Mojito Taste',
                'price' => '5000',
                'image' => 'mojito_leci.webp',
                'status' =>  'aktif',
            ],
            [
                'category_id' => '1',
                'name' => 'Mojito Stawberry',
                'description' => 'Mojito Taste',
                'price' => '5000',
                'image' => 'mojito_strawberry.webp',
                'status' =>  'aktif',
            ],
            [
                'category_id' => '1',
                'name' => 'Es Lemon Tea',
                'description' => 'Es Lemon Tea Taste',
                'price' => '3000',
                'image' => 'es-lemon-tea.jpg',
                'status' =>  'aktif',
            ],
            [
                'category_id' => '1',
                'name' => 'Es Jeruk',
                'description' => 'Es Jeruk Taste',
                'price' => '3000',
                'image' => 'es-jeruk.jpg',
                'status' =>  'aktif',
            ],
            [
                'category_id' => '1',
                'name' => 'Air Mineral Gelas',
                'description' => 'Air Mineral Gelas Taste',
                'price' => '1000',
                'image' => 'air_mineral.jpg',
                'status' =>  'aktif',
            ],
        ];
    
        foreach ($productData as $product) {
            $imagePath = public_path('images/product/' . $product['image']);
    
            if (File::exists($imagePath)) {
                Product::create([
                    'category_id' => $product['category_id'],
                    'name' => $product['name'],
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'image' => $product['image'],
                    'status' =>  $product['status'],
                ]);
            } else {
                echo "File gambar tidak ditemukan: {$product['image']}\n";
            }
        }
    }
}
