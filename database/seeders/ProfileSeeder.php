<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++){
            Profile::create([
                'user_id' => $i,
                'phone' => '01643381009',
                'address' => Str::random(3),
                'view' => rand(10, 100),
                'post_code' => $i % 2 == 0 ? rand(1, 3) : null
            ]);
        }
    }
}
