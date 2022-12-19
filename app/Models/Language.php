<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Content;
use App\Models\CategoryLanguage;
use App\Models\SubCategoryLanguage;

class Language extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function boot() {
        parent::boot();

        self::deleting(function($language) {
            $language->contents()->each(function($content) {
                $content->delete();
            });
            $language->categoryLanguages()->each(function($categoryLang) {
                $categoryLang->delete();
            });
            $language->subCategoryLanguages()->each(function($subcategoryLang) {
                $subcategoryLang->delete();
            });
            $language->productLanguages()->each(function($productLang) {
                $productLang->delete();
            });
        });
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function categoryLanguages()
    {
        return $this->hasMany(CategoryLanguage::class);
    }

    public function subCategoryLanguages()
    {
        return $this->hasMany(SubCategoryLanguage::class);
    }

    public function productLanguages()
    {
        return $this->hasMany(ProductLanguage::class);
    }
}
