<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $store = Store::inRandomOrder()->first();
        return [
            'name' => $this->faker->name(),
            'image' => '/test/img/photo ('.rand(1,6).').jpg',
            'store_id' => $store->id,
        ];
    }
}
