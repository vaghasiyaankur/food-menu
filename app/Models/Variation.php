<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    protected $table = 'variations';

    protected $guarded = ['id'];
    
    public static function boot() {
        parent::boot();

        self::deleting(function($category) {
            $category->variationRestaurantLanguages()->each(function($order) {
                $order->delete();
            });
            $category->productVariations()->each(function($kot_hold) {
                $kot_hold->delete();
            });
            $category->kotProductVariations()->each(function($kot_hold) {
                $kot_hold->delete();
            });
        });
    }

    public function variationRestaurantLanguages()
    {
        return $this->hasMany(VariationRestaurantLanguage::class, 'variation_id');
    }

    public function variationRestaurantLanguagesFirst()
    {
        return $this->hasOne(VariationRestaurantLanguage::class, 'variation_id');
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
