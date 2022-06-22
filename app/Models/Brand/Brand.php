<?php

namespace App\Models\Brand;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $title
 */
class Brand extends Model
{
    use HasFactory;

    public function setTitleAttribute($value): string
    {
        return $this->attributes['title'] = Str::ucfirst($value);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
