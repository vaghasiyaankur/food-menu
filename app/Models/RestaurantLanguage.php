<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantLanguage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function Restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }

    public function categoryRestaurantLanguages()
    {
        return $this->hasMany(CategoryRestaurantLanguage::class, 'restaurant_language_id');
    }

    public function subCategoryRestaurantLanguages()
    {
        return $this->hasMany(SubcategoryRestaurantLanguage::class, 'restaurant_language_id');
    }

    public function productRestaurantLanguages()
    {
        return $this->hasMany(ProductRestaurantLanguage::class, 'restaurant_language_id');
    }
}
