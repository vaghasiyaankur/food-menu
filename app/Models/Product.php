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

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function productLanguage()
    {
        return $this->hasMany(ProductLanguage::class);
    }
}
