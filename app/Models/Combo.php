<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    use HasFactory;

    protected $table = 'combos';

    protected $guarded = ['id'];

    public function comboProducts()
    {
        return $this->hasMany(ComboProduct::class, 'combo_id');
    } 

    public function comboRestaurantLanguages()
    {
        return $this->hasMany(ComboRestaurantLanguage::class, 'combo_id');
    }
}
