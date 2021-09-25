<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\City;
use App\Models\Country;
use App\Models\Machanic;
use App\Models\Owner;
use App\Models\Shop;
use App\Models\Skill;
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
            UserSeeder::class,
            // ProfileSeeder::class,
            // PostSeeder::class
        ]);



        //--------- Seeder Call ---------//

        // ekhane define kore dile " php artisan db:seed --class=ProductSeeder " ai vabe call korte hobe na.
        // ata call korlei hobe " php artisan db:seed"
        // $this->call([
        //     ProductSeeder::class
        // ]);

        // for($i = 1; $i <=10; $i++){
        //     Machanic::create([
        //     'name' => Str::random(3)
        //     ]);

        //     Car::create([
        //     'name' => Str::random(3),
        //     'machanic_id' => $i
        //     ]);

        //     Owner::create([
        //     'name' => Str::random(3),
        //     'car_id' => $i
        //     ]);
        // }

        // Has-one-throuhg//

        // $mac = ['Biplob', 'Jabery', 'Bipu', 'Imran'];
        // for($i = 0; $i < count($mac); $i++){
        //     Machanic::create([
        //         'name' => $mac[$i],
        //     ]);
        // }

        // $cars = ['BMW', 'MARCHETIG', 'YAHAMAHA', 'NNN'];
        // for($i = 0; $i < count($cars); $i++){
        //     Car::create([
        //         'machanic_id' => $i+1,
        //         'name' => $cars[$i],
        //     ]);
        // }

        // $own = ['korim', 'rakib', 'sobuj', 'manik'];
        // for($i = 0; $i < count($own); $i++){
        //     Owner::create([
        //         'car_id' => $i+1,
        //         'name' => $own[$i],
        //     ]);
        // }



        // Has-many-throuhg//

        // $countries = ['Bangladesh', 'India', 'Pakisthan', 'Nepal', 'Austilia'];
        // $cities = ['Dhaka', 'Comilla', 'Ragshahi', 'Selete', 'Noakhali'];
        // $shops = ['Shopno', 'Modina', 'Evele', 'Daraz', 'EFood'];

        // for($i = 0; $i < count($countries); $i++){
        //     Country::create([
        //         'name' => $countries[$i],
        //     ]);
        // }

        // for($i = 0; $i < count($countries); $i++){
        //     City::create([
        //         'country_id' => rand(1, 5),
        //         'name' => $cities[$i],
        //     ]);
        // }

        // for($i = 0; $i < count($countries); $i++){
        //     Shop::create([
        //         'city_id' => rand(1, 5),
        //         'name' => $shops[$i],
        //     ]);
        // }


        $skills = ['PHP', 'LARAVEL', 'JAVASCRIPT', 'JQUERY', 'PHYTHON', 'RUBIS'];
        for($i = 0; $i < count($skills); $i++){
            Skill::create([
                'name' => $skills[$i],
            ]);
        }

    }
}
