<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\StatusPesanan;
use App\Http\Controllers\Controller;

class LaporanTransaksiController extends Controller
{
    public function index(Request $request){
        $transaksi = Transaksi::all();

        if($request->input('dari_tgl') && $request->input('sampai_tgl')){
            $daritgl = $request->input('dari_tgl');
            $sampaitgl = $request->input('sampai_tgl');
            $transaksi = Transaksi::whereBetween('tanggal_masuk', [$daritgl, $sampaitgl])->get();
        }

        return view('laporan_transaksi.index', compact('transaksi'));
    }
}
