<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'name',
        'category_id',
        'amount',
        'price',
        'description',
        'image',
        'sparepart_id',
        'part_manufacturer_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class);
    }

    public function part_manufacturer()
    {
        return $this->belongsTo(PartManufacturer::class);
    }
}
