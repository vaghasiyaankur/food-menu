<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientRestaurantLanguage extends Model
{
    use HasFactory;

    protected $table = 'ingredient_restaurant_languages';

    protected $guarded = ['id']; 

    public function restaurantLanguage()
    {
        return $this->belongsTo(RestaurantLanguage::class, 'restaurant_language_id');
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredient_id');
    }
}
