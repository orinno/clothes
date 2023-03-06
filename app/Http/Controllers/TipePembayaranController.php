<?php

namespace App\Http\Controllers;

use App\Models\TipePembayaran;
use Illuminate\Http\Request;

class TipePembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tipe_pembayaran.index', [
            'tipe_pembayaran' => TipePembayaran::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        TipePembayaran::create($request->all());

        return redirect()->route('tipe_pembayaran.index')->with('success', 'Tipe Pembayaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipePembayaran $tipe_pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipePembayaran $tipe_pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipePembayaran $tipe_pembayaran)
    {
        $tipe_pembayaran->update($request->all());
        return redirect()->route('tipe_pembayaran.index')->with('success', 'Tipe pembayaran berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipePembayaran $tipe_pembayaran)
    {
        $tipe_pembayaran->delete();

        return redirect()->route('tipe_pembayaran.index')->with('success', 'Tipe Pembayaran berhasil dihapus');
    }
}
