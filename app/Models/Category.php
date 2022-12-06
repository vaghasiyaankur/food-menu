<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public static function boot() {
        parent::boot();

        self::deleting(function($category) {
            $category->subCategory()->each(function($sub_category) {
                $sub_category->delete();
            });
        });
    }

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }
}
