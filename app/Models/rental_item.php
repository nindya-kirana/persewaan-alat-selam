<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rental_item extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_id',
        'variant_id',
        'qty',
        'subtotal',
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
}
