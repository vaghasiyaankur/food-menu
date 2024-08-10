<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Language;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';
    protected $fillable = ['category_id'];

    public static function boot() {
        parent::boot();

        self::deleting(function($category) {
            $category->products()->each(function($product) {
                $product->delete();
            });
            $category->subCategoryLanguage()->each(function($sub_category_lang) {
                $sub_category_lang->delete();
            });
            $category->subCategoryRestaurantLanguages()->each(function($sub_category_lang) {
                $sub_category_lang->delete();
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategoryLanguage()
    {
        return $this->hasMany(SubCategoryLanguage::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'sub_category_id');
    }

    public function subCategoryRestaurantLanguages()
    {
        return $this->hasMany(SubcategoryRestaurantLanguage::class, 'sub_category_id');
    }

    public function subCategoryRestaurantLanguagesFirst()
    {
        return $this->hasOne(SubcategoryRestaurantLanguage::class, 'sub_category_id')->orderBy('id');
    }
}
