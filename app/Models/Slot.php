<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    public function appointment()
    {
        return $this->belongsTo("App\Models\Appointment", "appointment_id");
    }
}
