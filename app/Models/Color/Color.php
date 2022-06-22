<?php

namespace App\Models\Color;

use App\Models\Product\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property string $color
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
