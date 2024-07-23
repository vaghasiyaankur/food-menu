<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $table = 'restaurants';

    protected $guarded = ['id'];
    
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

    public function user()
    {
        return $this->hasMany(User::class, 'restaurant_id');
    }

    public function RestaurantLanguages()
    {
        return $this->hasMany(RestaurantLanguage::class, 'language_id');
    }

    public function kotHolds()
    {
        return $this->hasMany(Restaurant::class, 'restaurant_id');
    }

    public function setting()
    {
        return $this->hasMany(Setting::class, 'restaurant_id');
    }

    public function branch()
    {
        return $this->hasMany(Branch::class);
    }

}
