<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComboLanguage extends Model
{
    use HasFactory;

    protected $table = 'combo_languages';

    protected $guarded = ['id'];
}
