<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use HasFactory;

    public function district()
    {
        return $this->hasMany("App\Models\District", "district_id")->withTrashed();
    }

    public function province()
    {
        return $this->belongsTo("App\Models\Province", "province_id");
    }
}
