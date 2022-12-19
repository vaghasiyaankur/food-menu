<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryLanguage extends Model
{
    use HasFactory;

    protected $table = 'sub_category_languages';
    protected $guarded = ['id'];

    public function subCategorylanguage()
    {
        return $this->belongsTo(Language::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
