<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_alat',
        'deskripsi',
        'image',
    ];

    // 1 produk punya banyak varian
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
