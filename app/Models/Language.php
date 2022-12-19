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
}
