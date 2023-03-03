<?php

use App\Http\Controllers\KaryawanController;

Route::controller(KaryawanController::class)->group(function () {

    Route::group([
        "prefix" => "karyawan",
    ], function () {

        Route::get("/", "index")->name("karyawan.index");
        Route::post("/", "store")->name("karyawan.store");
        Route::get("/{karyawan}", "show")->name("karyawan.show");
        Route::put("/{karyawan}", "update")->name("karyawan.update");
        Route::delete("/{karyawan}", "destroy")->name("karyawan.destroy");

    });
});
