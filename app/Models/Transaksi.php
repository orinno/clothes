<?php

namespace App\Models;

use App\Models\StatusPesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $guarded = ['id'];

    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function tipe_pembayaran()
    {
        return $this->belongsTo(TipePembayaran::class);
    }

    public function status_pesanan()
    {
        return $this->belongsTo(StatusPesanan::class);
    }
}
