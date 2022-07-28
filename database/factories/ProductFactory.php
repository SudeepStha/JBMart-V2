<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $store = Store::inRandomOrder()->first();
        $category = Category::where('store_id', $store->id)->inRandomOrder()->first();
        $unit = Unit::where('store_id', $store->id)->inRandomOrder()->first();
        return [
            'name' => $this->faker->name(),
            'sku' => Str::random(10),
            'price' => rand(100, 100000),
            'final_price' => rand(100, 100000),
            'featured_image' =>  '/test/img/photo (' . rand(1, 6) . ').jpg',
            'category_id' => $category->id,
            'store_id' => $store->id,
            'unit_id' => $unit->id,
        ];
    }
}
