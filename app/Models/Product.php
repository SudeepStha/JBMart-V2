<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
