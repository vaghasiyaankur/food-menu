<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotProduct extends Model
{
    use HasFactory;

    protected $table = 'kot_products';

    protected $guarded = ['id']; 

    public static function boot() {
        parent::boot();

        self::deleting(function($kot_product) {
            $kot_product->kotProductIngredients()->each(function($kot_product_ingredient) {
                $kot_product_ingredient->delete();
            });

            $kot_product->kotProductVariation()->each(function($kot_product_variation) {
                $kot_product_variation->delete();
            });
        });
    }

    public function kot()
    {
        return $this->belongsTo(Kot::class, 'kot_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function kotProductIngredients()
    {
        return $this->hasMany(KotProductIngredient::class, 'kot_product_id');
    }

    public function kotProductVariation()
    {
        return $this->hasOne(KotProductVariation::class, 'kot_product_id');
    }
}
