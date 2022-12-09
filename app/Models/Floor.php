<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;


class Floor extends Model
{
    use HasFactory;

    protected $table = 'floors';

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
