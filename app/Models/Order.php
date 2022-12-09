<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Floor;
use App\Models\Customer;
use App\Models\Table;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id']; 

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
