<?php

namespace Database\Factories;

use App\Models\Stock;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $color = Color::pluck('id')->toArray();
        $product = Product::pluck('id')->toArray();
        $size = Size::pluck('id')->toArray();
        return [
            'size_id' => $this->faker->randomElement($size),
            'color_id' => $this->faker->randomElement($color),
            'product_id' => $this->faker->randomElement($product),
            'number' => $this->faker->unique()->randomNumber(2),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
