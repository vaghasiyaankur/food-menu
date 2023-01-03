<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Table;
use Illuminate\Support\Facades\Auth;

class Floor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tables()
    {
        return $this->hasMany(Table::class);
    }

    public function activetables()
    {
        return $this->tables()->where('status', 1)->whereUserId(Auth::id());
    }
}
