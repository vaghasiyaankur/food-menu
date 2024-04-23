<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = ['id'];

    public static function boot() {
        parent::boot();

        self::deleting(function($product) {
            $product->productLanguage()->each(function($product_lang) {
                $product_lang->delete();
            });
        });
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function productLanguage()
    {
        return $this->hasMany(ProductLanguage::class);
    }

    public function productRestaurantLanguages()
    {
        return $this->hasMany(ProductRestaurantLanguage::class, 'product_id');
    }

    public function productVariations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id');
    }

    public function productIngredients()
    {
        return $this->hasMany(ProductIngredient::class, 'product_id');
    }

    public function comboProducts()
    {
        return $this->hasMany(ComboProduct::class, 'product_id');
    }

    public function kotProduct()
    {
        return $this->hasMany(KotProduct::class, 'product_id');
    }
}
