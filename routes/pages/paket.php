<?php

use App\Http\Controllers\PaketController;

Route::controller(PaketController::class)->group(function () {

    Route::group([
        "prefix" => "paket",
    ], function () {

        Route::get("/", "index")->name("paket.index");
        Route::post("/", "store")->name("paket.store");
        Route::get("/{paket}", "show")->name("paket.show");
        Route::put("/{paket}", "update")->name("paket.update");
        Route::delete("/{paket}", "destroy")->name("paket.destroy");

    });
});
