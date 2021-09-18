<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <=10; $i++){
            User::create([
                'name'=> Str::random(5),
                'email' => "biplob{$i}@gmail.com",
                'password'=> bcrypt('password')
    
            ]);
        }
    }
}
