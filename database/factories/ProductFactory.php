<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'slug' => $this->faker->sentence(5),
            'quantity' => rand(1, 20),
            'status' => true,
            'price' => rand(10, 50),
            'view' => rand(20, 100),
            'description' => $this->faker->text(20)
        ];
    }
}