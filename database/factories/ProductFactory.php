<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Brand;
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
        $brand = Brand::pluck('id')->toArray();

        return [
            'brand_id' => $this->faker->randomElement($brand),
            'name' => $this->faker->name,
            'sku' => $this->faker->randomDigitNot(5),
            'price' => $this->faker->randomNumber(7),
            'description' => $this->faker->text(200),
            'is_displayed' => $this->faker->numberBetween(0, 1),
            'start_promo' => now(),
            'end_promo' => now(),
            'promo_price' => $this->faker->randomNumber(6),
            'gender' => 'male',
            'material_upper' => $this->faker->text(20),
            'material_outer_sole' => $this->faker->text(20),
            'care_label' => $this->faker->text(200),
            'measurements' => $this->faker->text(200),
        ];
    }
}
