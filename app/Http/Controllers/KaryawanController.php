<?php

namespace App\Http\Controllers;


use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('karyawan.index', [
            'karyawan' => Karyawan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $konsumen = new Karyawan();
        $kode_karyawan = 'KRYWN' . rand(1000, 9999);
        $konsumen->kode_karyawan = $kode_karyawan;
        $konsumen->name = $request->input('name');
        $konsumen->email = $request->input('email');
        $pass = '123123123';
        $konsumen->password = bcrypt($pass);
        $konsumen->alamat = $request->input('alamat');
        $konsumen->telephone = $request->input('telephone');
        $konsumen->save();
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $karyawan->update($request->all());
        return redirect()->route('karyawan.index')->with('success', 'Data karyawa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus');
    }
}
