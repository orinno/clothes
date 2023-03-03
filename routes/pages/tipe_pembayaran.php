<?php

use App\Http\Controllers\TipePembayaranController;

Route::controller(TipePembayaranController::class)->group(function () {

    Route::group([
        "prefix" => "tipe_pembayaran",
    ], function () {

        Route::get("/", "index")->name("tipe_pembayaran.index");
        Route::post("/", "store")->name("tipe_pembayaran.store");
        Route::get("/{tipe_pembayaran}", "show")->name("tipe_pembayaran.show");
        Route::put("/{tipe_pembayaran}", "update")->name("tipe_pembayaran.update");
        Route::delete("/{tipe_pembayaran}", "destroy")->name("tipe_pembayaran.destroy");

    });
});
