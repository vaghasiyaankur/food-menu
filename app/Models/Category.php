<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryLanguage;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $guarded = ['id'];

    public static function boot() {
        parent::boot();

        self::deleting(function($category) {
            $category->categoryLanguages()->each(function($category_lang) {
                $category_lang->delete();
            });
        });
    }

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function categoryLanguages()
    {
        return $this->hasMany(CategoryLanguage::class);
    }
}
