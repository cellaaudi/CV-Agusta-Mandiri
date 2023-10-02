<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisingPhoto extends Model
{
    use HasFactory;
    public function advertising()
    {
        return $this->hasMany("App\Models\Advertising", "adv_photo_id");
    }
}
