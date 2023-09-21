<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function appointment()
    {
        return $this->belongsToMany("App\Models\Appointment", "car_carts", "car_product_id", "appointment_id");
    }
}
