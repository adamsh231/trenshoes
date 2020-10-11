<?php

namespace Database\Factories;

use App\Models\Picture;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class PictureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Picture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $color = Color::pluck('id')->toArray();
        $product = Product::pluck('id')->toArray();
        return [
            'color_id' => $this->faker->randomElement($color),
            'product_id' => $this->faker->randomElement($product),
            'path' => $this->faker->text(20),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
