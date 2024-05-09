<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpiData extends Model
{
    use HasFactory;

    protected $table = 'upi_data';

    protected $guarded = ['id'];
}
