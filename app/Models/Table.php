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

    public static function boot() {
        parent::boot();

        self::deleting(function($category) {
            $category->orders()->each(function($order) {
                $order->delete();
            });
            $category->kotHold()->each(function($kot_hold) {
                $kot_hold->delete();
            });
        });
    }

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

    public function kotHold()
    {
        return $this->hasOne(KotHold::class, 'table_id');
    }

}
