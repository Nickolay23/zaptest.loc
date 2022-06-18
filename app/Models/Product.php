<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

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

    public function productCost()
    {
        if(!is_null($this->pivot)){
            return $this->price * $this->pivot->amount;
        }
        else{
            return $this->price;
        }
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }
}
