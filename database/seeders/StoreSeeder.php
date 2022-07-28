<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Store;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sellers = User::role('Seller')->get();
        
        $sellers->each(function($seller){
            Store::factory()
            ->has(Category::factory()->count(10))
            ->has(Unit::factory()->count(3))
            ->create([
                'user_id' => $seller->id
            ]);
        });
        // Store::factory()->count(100)->create();

    }
}
