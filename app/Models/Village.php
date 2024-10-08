<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    public function district()
    {
        return $this->belongsTo(District::class, "district_id");
    }

    public function property()
    {
        return $this->hasMany(Property::class, "village_id");
    }
}
