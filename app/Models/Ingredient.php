<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients';

    protected $guarded = ['id']; 

    public static function boot() {
        parent::boot();

        self::deleting(function($ingredient) {
            $ingredient->ingredientRestaurantLanguages()->each(function($ingredient_lang) {
                $ingredient_lang->delete();
            });

            $ingredient->productIngredients()->each(function($product_ingredient) {
                $product_ingredient->delete();
            });

            $ingredient->kotProductIngredients()->each(function($kot_product_ingredient) {
                $kot_product_ingredient->delete();
            });
        });
    }

    public function ingredientRestaurantLanguages()
    {
        return $this->hasMany(IngredientRestaurantLanguage::class, 'ingredient_id');
    }

    public function productIngredients()
    {
        return $this->hasMany(ProductIngredient::class, 'ingredient_id');
    }

    public function kotProductIngredients()
    {
        return $this->hasMany(KotProductIngredient::class, 'ingredient_id');
    }
}
