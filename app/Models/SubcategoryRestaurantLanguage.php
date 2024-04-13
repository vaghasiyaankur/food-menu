<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubcategoryRestaurantLanguage extends Model
{
    use HasFactory;

    protected $table = 'subcategory_restaurant_languages';

    protected $guarded = ['id']; 

    public function restaurantLanguage()
    {
        return $this->belongsTo(RestaurantLanguage::class, 'restaurant_language_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
}
