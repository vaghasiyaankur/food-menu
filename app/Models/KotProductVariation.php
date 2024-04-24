<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotProductVariation extends Model
{
    use HasFactory;

    protected $table = 'kot_product_variations';

    protected $guarded = ['id']; 

    public function kotProducts()
    {
        return $this->belongsTo(KotProduct::class, 'kot_product_id');
    }

    public function variation()
    {
        return $this->belongsTo(Variation::class, 'variation_id');
    }
}
