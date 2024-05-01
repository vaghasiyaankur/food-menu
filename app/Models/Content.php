<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Language;

class Content extends Model
{
    use HasFactory;

    protected $guarded = ['id']; 

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
