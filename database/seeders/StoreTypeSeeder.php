<?php

namespace Database\Seeders;

use App\Models\StoreType;
use App\Models\User;
use Illuminate\Database\Seeder;

class StoreTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::role('Admin')->first();
        
        StoreType::create([
            'name' => 'Restaurant',
            'image' => '/test/img/restaurant.jpg',
            'user_id' => $admin->id
        ]);

        StoreType::create([
            'name' => 'Hotel',
            'image' => '/test/img/hotel.jpg',
            'user_id' => $admin->id
        ]);

        StoreType::create([
            'name' => 'Bakery',
            'image' => '/test/img/bakery.jpg',
            'user_id' => $admin->id
        ]);
    }
}
