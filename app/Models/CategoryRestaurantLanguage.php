<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryRestaurantLanguage extends Model
{
    use HasFactory;

    protected $table = 'category_restaurant_languages';

    protected $guarded = ['id'];

    public function restaurantLanguage()
    {
        return $this->belongsTo(RestaurantLanguage::class, 'restaurant_language_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
