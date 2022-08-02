<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Binhlua>
 */
class BinhluanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'noidung' => fake()->text(),
            'id_user' =>rand(1,10),
            'id_product' =>rand(41,45),
        ];
    }
}
