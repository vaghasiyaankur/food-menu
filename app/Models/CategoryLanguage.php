<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Language;

class CategoryLanguage extends Model
{
    use HasFactory;

    protected $table = 'category_languages';

    protected $guarded = ['id']; 

    public function langauge()
    {
        return $this->belongsTo(Language::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
