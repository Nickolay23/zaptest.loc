<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'description',
        'image',
    ];

    public function carmodels()
    {
        return $this->belongsToMany(Carmodel::class)->withTimestamps();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
