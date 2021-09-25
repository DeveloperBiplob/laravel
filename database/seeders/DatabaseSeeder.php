<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Machanic;
use App\Models\Owner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            // UserSeeder::class,
            // ProfileSeeder::class,
            // PostSeeder::class
        ]);



        //--------- Seeder Call ---------//

        // ekhane define kore dile " php artisan db:seed --class=ProductSeeder " ai vabe call korte hobe na.
        // ata call korlei hobe " php artisan db:seed"
        // $this->call([
        //     ProductSeeder::class
        // ]);

        // $mac = ['Biplob', 'Jabery', 'Bipu', 'Imran'];
        // for($i = 0; $i <= $mac; $i ++){
        //     Machanic::create([
        //         'name' => $mac[$i]
        //     ]);
        // }

        // $cars = ['BMW', 'MARCHETIG', 'YAHAMAHA', 'NNN'];
        // for($i = 0; $i <= $cars; $i ++){
        //     Car::create([
        //         'machanic_id' => $i,
        //         'name' => $cars[$i]
        //     ]);
        // }

        // $own = ['korim', 'rakib', 'sobuj', 'manik'];
        // for($i = 0; $i <= $own; $i ++){
        //     Owner::create([
        //         'car_id' => $i,
        //         'name' => $own[$i]
        //     ]);
        // }

        for($i = 1; $i <=10; $i++){
            Machanic::create([
            'name' => Str::random(3)
            ]);

            Car::create([
            'name' => Str::random(3),
            'machanic_id' => $i
            ]);

            Owner::create([
            'name' => Str::random(3),
            'car_id' => $i
            ]);
        }

    }
}
