<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>fake()->name(),
            'don_gia'=>fake()->numberBetween($min = 1500, $max = 6000),
            'so_luong'=>fake()->randomDigit(),
            'khuyen_mai'=>rand(5,10),
            'avatar_product'=>fake()->imageUrl(),
            'mo_ta'=>fake()->text(100),
            'id_danhmuc'=>rand(1,4),
            'kich_thuoc'=>rand(1,3)
        ];
    }
}
