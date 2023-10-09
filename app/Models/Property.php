<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;
use App\Models\PropertyCategory;
use App\Models\PropertyPhoto;

class Property extends Model
{
    use HasFactory;

    protected $table = "prop_products";
    protected $guarded = ['id'];

    public function appointment()
    {
        return $this->belongsToMany(Appointment::class, "prop_carts", "prop_product_id", "appointment_id");
    }

    public function property_category()
    {
        return $this->belongsTo(PropertyCategory::class, "prop_category_id")->withTrashed();
    }

    public function property_photo()
    {
        return $this->hasMany(PropertyPhoto::class, "prop_photo_id");
    }
}
