<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\StoreType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $seller = User::role('Seller')->inRandomOrder()->first();
        $store_type = StoreType::inRandomOrder()->first();
        $img =  '/test/img/photo ('.rand(1,6).').jpg'; /// '/test/img/photo (1).jpg'
        return [
            'store_name' => $this->faker->company(),
            'store_type_id' => $store_type->id,
            'address' => $this->faker->address(),
            'minimum_order' => rand(100,5000),
            'store_description' => $this->faker->realText(),
            'logo' => $img,
            'featured_image' => $img,
            'sunday' => "10:00 AM - 6:00PM",
            'monday' => "10:00 AM - 6:00PM",
            'tuesday' => "10:00 AM - 6:00PM",
            'wednesday' => "10:00 AM - 6:00PM",
            'thursday' => "10:00 AM - 6:00PM",
            'friday' => "10:00 AM - 6:00PM",
            'saturday' => "CLOSED!!! Dont Come.",
            'user_id' => $seller->id,
        ];
    }
}
