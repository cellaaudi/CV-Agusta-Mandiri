<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public function appointment()
    {
        return $this->belongsToMany("App\Models\Appointment", "prop_carts", "prop_product_id", "appointment_id");
    }
    public function property_category()
    {
        return $this->belongsTo("App\Models\PropertyCategory", "prop_category_id")->withTrashed();
    }
    public function property_photo()
    {
        return $this->belongsTo("App\Models\PropertyPhoto", "prop_photo_id")->withTrashed();
    }
}
