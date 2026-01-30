<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class payment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'rental_id',
        'total_sewa',
        'total_denda',
        'total_bayar',
        'metode',
        'status',
        'tanggal_bayar',
        'bukti_bayar',
    ];

    protected $dates = ['tanggal_bayar'];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
