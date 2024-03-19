<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $table = 'restaurants';

    public static function boot() {
        parent::boot();

        self::deleting(function($restaurants) {
            $restaurants->restaurantManager()->each(function($rest_manage) {
                $rest_manage->delete();
            });
        });
    }

    public function restaurantManager()
    {
        return $this->hasMany(RestaurantManager::class, 'restaurant_id');
    }

}
