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

    public function address()
    {
        return $this->hasMany(Address::class, "address_id");
    }
}
