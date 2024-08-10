<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kot extends Model
{
    use HasFactory;

    protected $table = 'kots';

    protected $guarded = ['id']; 

    public static function boot() {
        parent::boot();

        self::deleting(function($kot) {
            $kot->kotProducts()->each(function($kot_product) {
                $kot_product->delete();
            });
        });
    }

    public function kotProducts()
    {
        return $this->hasMany(KotProduct::class, 'kot_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
