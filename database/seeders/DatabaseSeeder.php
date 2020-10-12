<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Brand::factory(5)->create();
        \App\Models\Product::factory(20)->create();
        \App\Models\Color::factory(10)->create();
        \App\Models\Size::factory(6)->create();
        \App\Models\Picture::factory(50)->create();
        \App\Models\Stock::factory(15)->create();
    }
}
