<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantLanguage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function Restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }
}
