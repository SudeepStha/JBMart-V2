<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function store_type()
    {
        return $this->belongsTo(StoreType::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // CMS 
    public function abouts()
    {
        return $this->hasMany(About::class);
    }
    public function terms_of_users()
    {
        return $this->hasMany(Terms_of_User::class);
    }
    public function privacy_policies()
    {
        return $this->hasMany(PrivacyAndPolicy::class);
    }
    public function shippingpolicies()
    {
        return $this->hasMany(ShippingPolicy::class);
    }
    public function return_policies()
    {
        return $this->hasMany(ReturnPolicy::class);
    }


    // Order
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
