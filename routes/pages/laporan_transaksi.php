<?php

use App\Http\Controllers\LaporanTransaksiController;

Route::controller(LaporanTransaksiController::class)->group(function () {

    Route::group([
        "prefix" => "laporan_transaksi",
    ], function () {

        Route::get("/", "index")->name("laporan_transaksi.index");

    });
});
