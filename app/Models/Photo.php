<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    public function car()
    {
        return $this->hasMany("App\Models\Car", "car_photo_id");
    }
    public function advertising()
    {
        return $this->hasMany("App\Models\Advertising", "adv_photo_id");
    }
    public function property()
    {
        return $this->hasMany("App\Models\Property", "prop_photo_id");
    }
}
