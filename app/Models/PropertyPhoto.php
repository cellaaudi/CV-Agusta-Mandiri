<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyPhoto extends Model
{
    use HasFactory;
    public function property()
    {
        return $this->hasMany("App\Models\Property", "prop_photo_id");
    }
}
