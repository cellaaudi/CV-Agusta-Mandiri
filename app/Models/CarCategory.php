<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCategory extends Model
{
    use HasFactory;

    public function car()
    {
        return $this->hasMany("App\Models\Car", "car_category_id");
    }
}
