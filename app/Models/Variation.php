<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    protected $table = 'variations';

    protected $guarded = ['id']; 

    public function variationRestaurantLanguages()
    {
        return $this->hasMany(VariationRestaurantLanguage::class, 'variation_id');
    }

    public function productVariations()
    {
        return $this->hasMany(ProductVariation::class, 'variation_id');
    }

    public function kotProductVariations()
    {
        return $this->hasMany(KotProductVariation::class, 'ingredient_id');
    }
}
