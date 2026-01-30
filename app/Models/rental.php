<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_booking',
        'customer_id',
        'tgl_sewa',
        'tgl_kembali',
        'total_bayar',
        'denda',
        'status',
        'payment_status',
    ];

    protected $dates = ['tgl_sewa', 'tgl_kembali'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(RentalItem::class);
    }

    public function returnItem()
    {
        return $this->hasOne(ReturnItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
