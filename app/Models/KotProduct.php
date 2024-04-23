<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotProduct extends Model
{
    use HasFactory;

    protected $table = 'kots';

    protected $guarded = ['id']; 

    public function kot()
    {
        return $this->belongsTo(Kot::class, 'kot_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
