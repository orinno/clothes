<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipePembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tipepembayaran::create([
            'nama' => 'Transfer BANK'
        ]);
        Tipepembayaran::create([
            'nama' => 'Transfer E-Wallet'
        ]);
        Tipepembayaran::create([
            'nama' => 'CASH'
        ]);
    }
}
