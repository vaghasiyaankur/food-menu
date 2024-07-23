<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function ($branch) {
            if ($branch->logo) {
                $path = public_path()."/storage/$branch->logo";
                $result = File::exists($path);
                if($result)
                {
                    File::delete($path);
                }
            }
        });
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
