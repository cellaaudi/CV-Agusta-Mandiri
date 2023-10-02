<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisingPhoto extends Model
{
    use HasFactory;

    protected $table = 'adv_photos';
    protected $fillable = ['url', 'adv_product_id'];

    public function advertising()
    {
        return $this->hasMany("App\Models\Advertising", "adv_photo_id");
    }
}
