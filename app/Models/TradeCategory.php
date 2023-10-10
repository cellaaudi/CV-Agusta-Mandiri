<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trade;

class TradeCategory extends Model
{
    use HasFactory;

    protected $table = "trade_categories";
    protected $guarded = ['id'];

    public function trade()
    {
        return $this->hasMany(Trade::class, "trade_category_id");
    }
}
