<?php

namespace App\Models\Category;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title
 */

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }

}
