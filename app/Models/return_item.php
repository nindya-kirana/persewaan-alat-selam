<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class return_item extends Model
{
    use HasFactory;


    protected $fillable = [
        'rental_id',
        'tgl_kembali',
        'terlambat',
        'denda_per_hari',
        'total_denda',
    ];

    protected $dates = [
        'tgl_kembali',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    public function getTglRencanaKembaliAttribute()
    {
        return $this->rental?->tgl_kembali;
    }

    public function hitungTerlambat()
    {
        if (!$this->tgl_kembali || !$this->rental) {
            return 0;
        }

        $dueDate  = \Carbon\Carbon::parse($this->rental->tgl_kembali);
        $realDate = \Carbon\Carbon::parse($this->tgl_kembali);

        if ($realDate->lte($dueDate)) {
            return 0;
        }

        return $dueDate->diffInDays($realDate);
    }

    public function hitungTotalDenda()
    {
        $terlambat = $this->hitungTerlambat();
        return $terlambat * $this->denda_per_hari;
    }
}
