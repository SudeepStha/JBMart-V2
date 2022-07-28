<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function store(){
        return $this->user->store();
    }
    
    public function purchase_items(){
        return $this->hasMany(PurchaseItem::class);
    }

    const STATUS_PENDING = 'Pending';
    const STATUS_DELIVERED = 'Delivered';
    const STATUS_CANCELLED = 'Cancelled';
    const STATUS = ['Pending', 'Delivered', 'Cancelled'];
    
}
