<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terms_of_User extends Model
{
    use HasFactory;
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
