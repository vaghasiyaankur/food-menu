<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded = ['id']; 

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}