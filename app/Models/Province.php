<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    public function regency()
    {
        return $this->hasMany("App\Models\Regency", "regency_id")->withTrashed();
    }
}
