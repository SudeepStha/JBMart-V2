<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $units = ['KG', "Plate", "Gram", "Kello Gremme", "Liter", "PCS"];
        $store = Store::inRandomOrder()->first();
        return [
            'name' => $units[array_rand($units)],
            'store_id' => $store->id,
        ];
    }
}
