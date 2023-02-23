<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barangs = Barang::all();
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
        //
        $validatedData= $request->validate([
            'nama_barang' => 'required',
            'tgl' => 'required',
            'harga_awal' => 'required',
            'image' => 'image|file',
            'deskripsi_barang' => 'required'
        ]);
        // Barang::create([
        //     "nama_barang" => $request->nama_barang,
        //     "tgl" => $request->tgl,
        //     "harga_awal" => $request->harga_awal,
        //     "deskripsi_barang" => $request->deskripsi_barang
        // ]);
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('barang-images');
        }
        Barang::create($validatedData);
        return redirect()->route('barang.index')->with('success', 'Data Barang Berhasil Ditambahakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $Barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $Barang)
    {
        //
        $barangs =Barang::find($Barang->id);
        // dd($Barang);
        return view('barang.show', compact('barangs'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $Barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $Barang)
    {
        //
        $barangs = Barang::find($Barang->id);
        return view('barang.edit', compact('barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $Barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $Barang)
    {

        $request->validate([
            'nama_barang' => 'required',
            'tgl' => 'required',
            'harga_awal' => 'required',
            'image' => 'image|file',
            'deskripsi_barang' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('barang-images');
        }

        $barangs = Barang::find($Barang->id);
        $barangs->nama_barang = $request->nama_barang;
        $barangs->tgl = $request->tgl;
        $barangs->harga_awal = $request->harga_awal;
        $barangs->image = $request->image;
        $barangs->deskripsi_barang = $request->deskripsi_barang;
        $barangs->update();

        return redirect()->route('/barang')->with('editsuccess', 'Data Barang Berhasil Diedit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $Barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $Barang)
    {
        $barangs = Barang::find($Barang->id);
        $barangs->delete();
        return redirect()->route('barang.index')->with('deletesuccess', 'Data Barang Berhasil Dihapus');
    }
}
