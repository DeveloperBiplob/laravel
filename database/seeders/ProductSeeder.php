<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Product::create([
        //     'title' => 'This is our Product Title ' . rand(1, 10),
        //     'slug' => 'This-is-Slug-' . rand(1, 10),
        //     'quantity' => rand(1, 20),
        //     'status' => true,
        //     'price' => rand(10, 50),
        //     'view' => rand(20, 100),
        //     'description' => 'This is our description ' . rand(1, 10),
        // ]);

        // Loop use kore data make 
        for($i = 0; $i <= 10; $i++){

            Product::create([
                'title' => 'This is our Product Title ' . rand(1, 10),
                'slug' => 'This-is-Slug-' . rand(1, 10),
                'quantity' => rand(1, 20),
                'status' => true,
                'price' => rand(10, 50),
                'view' => rand(20, 100),
                'description' => 'This is our description ' . rand(1, 10),
            ]);
    
        }
    }
}
