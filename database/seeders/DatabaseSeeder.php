<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

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
            'password' => bcrypt('admin')
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

        Product::create([
            'name' => 'Mie Jebew Ori',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, consequatur.',
            'price' => 8000,
            'category_id' => 2
        ]);

        Product::create([
            'name' => 'Mie Jebew Komplit',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, consequatur.',
            'price' => 10000,
            'category_id' => 2
        ]);

        Product::create([
            'name' => 'Es Mojito Mangga',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, consequatur.',
            'price' => 5000,
            'category_id' => 1
        ]);

        Product::create([
            'name' => 'Es Mojito Melon',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, consequatur.',
            'price' => 5000,
            'category_id' => 1
        ]);

        Product::create([
            'name' => 'Es Mojito Jeruk',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, consequatur.',
            'price' => 5000,
            'category_id' => 1
        ]);

        Product::create([
            'name' => 'Es Mojito Anggur',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, consequatur.',
            'price' => 5000,
            'category_id' => 1
        ]);

    }
}
