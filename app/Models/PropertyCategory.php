<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class PropertyCategory extends Model
{
    use HasFactory;

    protected $table = "prop_categories";
    protected $guarded = ['id'];

    public function property()
    {
        return $this->hasMany(Property::class, "prop_category_id");
    }
}
