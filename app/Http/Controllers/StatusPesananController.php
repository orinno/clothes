<?php

namespace App\Http\Controllers;

use App\Models\StatusPesanan;
use Illuminate\Http\Request;

class StatusPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('status_pesanan.index', [
            'status_pesanan' => StatusPesanan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        StatusPesanan::create($request->all());

        return redirect()->route('status_pesanan.index')->with('success', 'Status Pesanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(StatusPesanan $status_pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatusPesanan $status_pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StatusPesanan $status_pesanan)
    {
        $status_pesanan->update($request->all());
        return redirect()->route('status_pesanan.index')->with('success', 'Status Pesanan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatusPesanan $status_pesanan)
    {
        $status_pesanan->delete();

        return redirect()->route('status_pesanan.index')->with('success', 'Status Pesanan berhasil dihapus');
    }
}
