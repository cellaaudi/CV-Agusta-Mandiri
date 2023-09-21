<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function mission()
    {
        return $this->hasMany("App\Models\Mission", "company_id");
    }

    public function benefit()
    {
        return $this->hasMany("App\Models\Benefit", "company_id");
    }
}
