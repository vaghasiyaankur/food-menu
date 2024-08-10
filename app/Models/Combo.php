<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    use HasFactory;

    protected $table = 'combos';

    protected $guarded = ['id'];

    public static function boot() {
        parent::boot();

        self::deleting(function($combo) {
            $combo->comboProducts()->each(function($combo_products) {
                $combo_products->delete();
            });
            $combo->comboRestaurantLanguages()->each(function($combo_lang) {
                $combo_lang->delete();
            });
        });
    }

    public function comboProducts()
    {
        return $this->hasMany(ComboProduct::class, 'combo_id');
    } 

    public function comboRestaurantLanguages()
    {
        return $this->hasMany(ComboRestaurantLanguage::class, 'combo_id');
    }
}
