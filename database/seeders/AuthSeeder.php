<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'view store-type']);
        Permission::create(['name' => 'create store-type']);
        Permission::create(['name' => 'edit store-type']);
        Permission::create(['name' => 'view store']);
        Permission::create(['name' => 'create store']);
        Permission::create(['name' => 'edit store']);
        Permission::create(['name' => 'view product']);
        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'edit product']);

        Permission::create(['name' => 'view category']);
        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'edit category']);
        Permission::create(['name' => 'view unit']);
        Permission::create(['name' => 'create unit']);
        Permission::create(['name' => 'edit unit']);
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name'=>'view purchase order']);
        Permission::create(['name'=>'view all purchase orders']);
        Permission::create(['name'=>'set prchase order status']);



        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo(Permission::all());
        $seller = Role::create(['name' => 'Seller']);
        $seller->givePermissionTo([
            'view store',
            'create store', 'edit store', 'view product', 'edit product', 'create product',
            'view category', 'edit category', 'create category',
            'view unit', 'edit unit', 'create unit','view purchase order'
        ]);

       
    }
}
