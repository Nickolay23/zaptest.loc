<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PartManufacturer
 *
 * @property int $id
 * @property string $part_manufacturer
 * @property string|null $description
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|PartManufacturer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartManufacturer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartManufacturer query()
 * @method static \Illuminate\Database\Eloquent\Builder|PartManufacturer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartManufacturer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartManufacturer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartManufacturer whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartManufacturer wherePartManufacturer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartManufacturer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PartManufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'part_manufacturer',
        'description',
        'image',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
