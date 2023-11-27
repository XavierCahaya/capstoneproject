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
    }
}
