<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Table;

class Color extends Model
{
    use HasFactory;


    public function tables()
    {
        return $this->hasMany(Table::class);
    }
}
