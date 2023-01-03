<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Customer;
use App\Models\Table;
use App\Models\FloorShiftHistory;
use App\Models\TableShiftHistory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $guarded = ['id'];

    use SoftDeletes;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function floorShiftHistory()
    {
        return $this->hasMany(FloorShiftHistory::class);
    }

    public function tableShiftHistory()
    {
        return $this->hasMany(TableShiftHistory::class);
    }
}
