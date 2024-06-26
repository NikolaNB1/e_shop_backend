<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static function scopeSearchByName($query, $name)
    {
        return $query->where('brand', 'like', '%' . $name . '%')
            ->orWhere('model', 'like', '%' . $name . '%')
            ->orWhere('description', 'like', '%' . $name . '%');
    }
}
