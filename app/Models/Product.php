<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['sub_category_id'];

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
}
