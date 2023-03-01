<?php

namespace Database\Seeders;

use App\Models\StatusPesanan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusPesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusPesanan::create([
            'nama' => 'BARU'
        ]);
        StatusPesanan::create([
            'nama' => 'DIPROSES'
        ]);
        StatusPesanan::create([
            'nama' => 'SELESAI'
        ]);
        StatusPesanan::create([
            'nama' => 'DIAMBIL'
        ]);
        StatusPesanan::create([
            'nama' => 'BATAL'
        ]);
    }
}
