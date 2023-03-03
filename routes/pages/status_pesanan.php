<?php

use App\Http\Controllers\StatusPesananController;

Route::controller(StatusPesananController::class)->group(function () {

    Route::group([
        "prefix" => "status_pesanan",
    ], function () {

        Route::get("/", "index")->name("status_pesanan.index");
        Route::post("/", "store")->name("status_pesanan.store");
        Route::get("/{status_pesanan}", "show")->name("status_pesanan.show");
        Route::put("/{status_pesanan}", "update")->name("status_pesanan.update");
        Route::delete("/{status_pesanan}", "destroy")->name("status_pesanan.destroy");

    });
});
