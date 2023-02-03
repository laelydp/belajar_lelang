<?php

namespace App\Http\Controllers;

use App\Models\TabelBarang;
use Illuminate\Http\Request;

class TabelBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barangs = TabelBarang::all();
        return view('barang.index', compact('barangs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view ('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_barang' => 'required',
            'tgl' => 'required',
            'harga_awal' => 'required',
            'deskripsi_barang' => 'required'
        ]);
        TabelBarang::create([
            "nama_barang" => $request->nama_barang,
            "tgl" => $request->tgl,
            "harga_awal" => $request->harga_awal,
            "deskripsi_barang" => $request->deskripsi_barang
        ]);
        
        return redirect('/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TabelBarang  $tabelBarang
     * @return \Illuminate\Http\Response
     */
    public function show(TabelBarang $tabelBarang)
    {
        //
        $barangs =TabelBarang::find($tabelBarang->id);
        return view('barang.show', compact('barangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TabelBarang  $tabelBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(TabelBarang $tabelBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TabelBarang  $tabelBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TabelBarang $tabelBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TabelBarang  $tabelBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(TabelBarang $tabelBarang)
    {
        $barangs = TabelBarang::find($tabelBarang->id);
        $barangs->delete();
        return redirect ('/barang');
    }
}
