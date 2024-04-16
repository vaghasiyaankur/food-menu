<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationRestaurantLanguage extends Model
{
    use HasFactory;

    protected $table = 'variation_restaurant_languages';

    protected $guarded = ['id']; 

    public function restaurantLanguage()
    {
        return $this->belongsTo(RestaurantLanguage::class, 'restaurant_language_id');
    }

    public function variation()
    {
        return $this->belongsTo(Variation::class, 'variation_id');
    }
}
