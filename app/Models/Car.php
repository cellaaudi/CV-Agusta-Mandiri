<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = "car_products";
    protected $guarded = ['id'];

    public function appointment()
    {
        return $this->belongsToMany("App\Models\Appointment", "car_carts", "car_product_id", "appointment_id");
    }

    public function car_brand()
    {
        return $this->belongsTo("App\Models\CarBrand", "car_brand_id");
    }

    public function car_category()
    {
        return $this->belongsTo("App\Models\CarCategory", "car_category_id");
    }

    public function car_photo()
    {
        return $this->hasMany("App\Models\CarPhoto", "car_photo_id");
    }
}
