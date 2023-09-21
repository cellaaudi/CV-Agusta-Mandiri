<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeCategory extends Model
{
    use HasFactory;

    public function trade()
    {
        return $this->hasMany("App\Models\Trade", "trade_category_id");
    }
}
