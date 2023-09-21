<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo("App\Models\Department", "department_id");
    }

    public function position()
    {
        return $this->belongsTo("App\Models\Position", "position_id");
    }
}
