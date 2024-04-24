<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotProductIngredient extends Model
{
    use HasFactory;

    protected $table = 'kot_product_ingredients';

    protected $guarded = ['id']; 

    public function kotProducts()
    {
        return $this->belongsTo(KotProduct::class, 'kot_product_id');
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredient_id');
    }
}
