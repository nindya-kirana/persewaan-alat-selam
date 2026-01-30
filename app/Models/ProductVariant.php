<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'size',
        'harga_per_hari',
        'stok_total',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function rentalItems()
    {
        return $this->hasMany(RentalItem::class, 'variant_id');
    }

    public function stockLogs()
    {
        return $this->hasMany(StockLog::class, 'variant_id');
    }
}
