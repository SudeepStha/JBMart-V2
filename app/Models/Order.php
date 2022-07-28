<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const ORDER_STATUS = ['Pending', 'Approved', 'Cancelled', 'Rejected'];
    const ORDER_PENDING = 'Pending';
    const ORDER_APPROVED = 'Approved';
    const ORDER_CANCELLED = 'Cancelled';
    const ORDER_REJECTED = 'Rejected';

    const DELIVERY_STATUS = ['Pending', 'Completed'];
    const DELEVERY_PENDING = 'Pending';
    const DELIVERY_COMPLETED = 'Completed';

    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function order_details(){
        return $this->hasMany(OrderDetails::class);
    }

    public function products(){
        return $this->hasManyThrough(Product::class,OrderDetails::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
