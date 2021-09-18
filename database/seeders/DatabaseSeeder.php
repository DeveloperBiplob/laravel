<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //--------- Factory Call ---------//
        // \App\Models\Product::factory(10)->create();


        // Seeder call--------//
        $this->call([
            UserSeeder::class,
            ProfileSeeder::class
        ]);



        //--------- Seeder Call ---------//

        // ekhane define kore dile " php artisan db:seed --class=ProductSeeder " ai vabe call korte hobe na.
        // ata call korlei hobe " php artisan db:seed"
        // $this->call([
        //     ProductSeeder::class
        // ]);


    }
}
