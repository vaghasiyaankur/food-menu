<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Table;


class Floor extends Model
{
    use HasFactory;

    protected $table = 'floors';

    public function tables()
    {
        return $this->hasMany(Table::class);
    }
}
