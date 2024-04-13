<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRestaurantLanguage extends Model
{
    use HasFactory;

    protected $table = 'product_restaurant_languages';

    protected $guarded = ['id']; 

    public function restaurantLanguage()
    {
        return $this->belongsTo(RestaurantLanguage::class, 'restaurant_language_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
