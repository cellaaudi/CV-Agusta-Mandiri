<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    public function address()
    {
        return $this->hasMany("App\Models\Address", "address_id")->withTrashed();
    }

    public function district()
    {
        return $this->belongsTo("App\Models\District", "district_id");
    }
}
