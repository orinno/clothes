<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('konsumen.index', [
            'konsumen' => Konsumen::all()
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
        $konsumen = new Konsumen();

        // random kode konsumen KNSMN..
        $kode_konsumen = 'KNSMN' . rand(1000, 9999);
        $konsumen->kode_konsumen = $kode_konsumen;
        $konsumen->nama = $request->input('nama');
        $konsumen->email = $request->input('email');
        $konsumen->alamat = $request->input('alamat');
        $konsumen->telephone = $request->input('telephone');

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $name = time().rand(1,50).'.'.$foto->getClientOriginalName();
            $path = public_path('/images');
            $img = Image::make($foto->path());
            $img->resize(300, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path.'/'.$name);
            $konsumen->foto = $name;
        }

        if($konsumen){
            $konsumen->save();
            return redirect()->route('konsumen.index')->with('success', 'Konsumen berhasil ditambahkan');
        } else {
            return redirect()->route('konsumen.index')->with('error', 'Konsumen berhasil ditambahkan');
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Konsumen $konsumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konsumen $konsumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $k = Konsumen::findOrFail($id);
        $nama = $k->nama;
        $k->nama = $request->input('nama');
        $k->email = $request->input('email');
        $k->alamat = $request->input('alamat');
        $k->telephone = $request->input('telephone');
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $name = time().rand(1,50).'.'.$foto->getClientOriginalExtension();
            $path = public_path('/images');
            $img = Image::make($foto->path());
            $img->resize(300, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path.'/'.$name);
            $pict = $name;
            if($pict != null) # kalo sudah ada profile dan mau update, function delete old pic
            {
                $path = public_path('/images');
                File::delete($path.'/'.$k->foto);
            }
            $k->foto = $pict;
        }
        $k->save();
        return redirect('/dashboard/konsumen')->with('status', 'Data Berhasil Diubah!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konsumen $konsumen)
    {
        //delete image in public_path 
        if($konsumen->foto != null) # kalo sudah ada profile dan mau update, function delete old pic
            {
                $path = public_path('/images');
                File::delete($path.'/'.$konsumen->foto);
            }
        $konsumen->delete();

        return redirect()->route('konsumen.index')->with('success', 'Data konsumen berhasil dihapus');
    }
}
