<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('amount', 'price')->withTimestamps();
    }

    public function getTotalAmount()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->pivot->amount;
        }
        return $sum;
    }

    public function getTotalCost()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->productCost();
        }
        return $sum;
    }
}
