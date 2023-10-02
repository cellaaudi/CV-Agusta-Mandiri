<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    use HasFactory;

    public function appointment()
    {
        return $this->belongsToMany("App\Models\Appointment", "adv_carts", "adv_product_id", "appointment_id");
    }
    public function advertising_photo()
    {
        return $this->belongsTo("App\Models\AdvertisingPhoto", "adv_photo_id")->withTrashed();
    }
}
