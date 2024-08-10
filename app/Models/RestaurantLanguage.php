<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantLanguage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function boot() {
        parent::boot();

        self::deleting(function($restaurants_lang) {
            $restaurants_lang->categoryRestaurantLanguages()->each(function($cat_restro_lang) {
                $cat_restro_lang->delete();
            });
            $restaurants_lang->subCategoryRestaurantLanguages()->each(function($subcat_restro_lang) {
                $subcat_restro_lang->delete();
            });
            $restaurants_lang->productRestaurantLanguages()->each(function($product_restaurant_lang) {
                $product_restaurant_lang->delete();
            });
            $restaurants_lang->ingredientRestaurantLanguages()->each(function($ingredient_restro_lang) {
                $ingredient_restro_lang->delete();
            });
            $restaurants_lang->variationRestaurantLanguages()->each(function($variation_restro_lang) {
                $variation_restro_lang->delete();
            });
            $restaurants_lang->comboRestaurantLanguages()->each(function($combo_restro_lang) {
                $combo_restro_lang->delete();
            });
        });
    }

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

    public function ingredientRestaurantLanguages()
    {
        return $this->hasMany(IngredientRestaurantLanguage::class, 'restaurant_language_id');
    }

    public function variationRestaurantLanguages()
    {
        return $this->hasMany(VariationRestaurantLanguage::class, 'restaurant_language_id');
    }

    public function comboRestaurantLanguages()
    {
        return $this->hasMany(ProductRestaurantLanguage::class, 'restaurant_language_id');
    }
}
