<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCodeToken extends Model
{
    use HasFactory;
    protected $table = 'qr_code_tokens';
    protected $guarded = ['id'];
}
