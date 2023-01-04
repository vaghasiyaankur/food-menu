<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Color;
use App\Models\Order;


class Table extends Model
{
    use HasFactory;

    protected $table = 'tables';

    protected $guarded = ['id'];

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

}
