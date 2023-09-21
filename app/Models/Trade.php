<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    public function appointment()
    {
        return $this->belongsTo("App\Models\Appointment", "appointment_id");
    }

    public function trade_category()
    {
        return $this->belongsTo("App\Models\TradeCategory", "trade_category_id")->withTrashed();
    }
}
