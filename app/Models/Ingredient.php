<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients';

    protected $guarded = ['id']; 

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
