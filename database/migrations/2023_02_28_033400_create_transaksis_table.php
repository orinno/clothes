<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\Konsumen::class, 'id_konsumen');
            $table->foreignIdFor(App\Models\User::class, 'id_karyawan');

            $table->foreignIdFor(App\Models\Paket::class);
            $table->foreignIdFor(App\Models\TipePembayaran::class);
            $table->foreignIdFor(App\Models\StatusPesanan::class);

            $table->string('invoice');
            $table->integer('berat');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->date('tanggal_diambil')->nullable();
            $table->boolean('status_bayar')->default(false);
            $table->integer('diskon')->default(0);
            $table->integer('total_bayar');
            $table->string('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
