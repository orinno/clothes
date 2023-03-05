<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    use HasFactory;

    protected $table = 'konsumen';

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_konsumen');
    }
}
