<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotHold extends Model
{
    use HasFactory;

    protected $table = 'kot_holds';

    protected $guarded = ['id']; 

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }
}
