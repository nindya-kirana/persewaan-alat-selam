<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class stock_log extends Model
{
    use HasFactory;

    protected $fillable = [
        'variant_id',
        'tanggal',
        'qty_disewa',
    ];

    protected $dates = ['tanggal'];

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
}

