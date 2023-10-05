<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisingPhoto extends Model
{
    use HasFactory;

    protected $table = 'adv_photos';
    protected $guarded = ['id'];

    public function advertising()
    {
        return $this->belongsTo("App\Models\Advertising", "adv_photo_id");
    }
}
