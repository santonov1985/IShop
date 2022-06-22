<?php

namespace App\Models\Product;

use App\Models\Brand\Brand;
use App\Models\Category\Category;
use App\Models\Color\Color;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $title
 * @property string $model
 * @property string $description
 * @property string $preview_image
 * @property string $image
 * @property int $quantity
 * @property $price
 * @property boolean $in_stock
 * @property boolean $is_published
 * @property $characteristic
 * @property int $brand_id
 * @property int $category_id
 * @property array $colors_id
 *
 */
class Product extends Model
{
    use HasFactory;


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class)->withTimestamps();
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getTitleAttribute($value): string
    {
        return $this->attributes['title'] = Str::ucfirst($value);
    }

}
