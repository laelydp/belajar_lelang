<?php

namespace App\Http\Controllers;

use App\Models\HistoryLelang;
use App\Models\Lelang;
use App\Models\Barang;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HistoryLelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $historyLelangs = HistoryLelang::orderBy('harga', 'desc')->get();
        return view('lelang.datapenawaran', compact('historyLelangs'));
    }
    public function cetakhistory()
    {
        //
        $cetakhistoryLelangs = HistoryLelang::orderBy('harga', 'desc')->get();
        return view('lelang.cetakhistory', compact('cetakhistoryLelangs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(HistoryLelang $historyLelang, Lelang $lelang)
    {
        //
        $lelangs = Lelang::find($lelang->id);
        $historyLelangs = HistoryLelang::orderBy('harga', 'desc')->get()->where('lelang_id',$lelang->id);
        return view('masyarakat.penawaran', compact('lelangs', 'historyLelangs'));
    }
    // public function storecomments(Lelang $lelang,Request $request)
    // {
    //     //
    //     $request->validate([
    //         'komentar' => 'required',
    //     ]);

    //     $komentar = new Comment;
    //     $komentar->nama = Auth::user()->name;
    //     $komentar->komentar = $request->komentar;
    //     $komentar->lelang_id = $lelang->id;
    //     $komentar->users_id = Auth::user()->id;
    //     $komentar->save();



    //     return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Lelang $lelang, Barang $barang)
    {
        //
        $request->validate([
            'harga'   => 'required|numeric',
        ],
        [
            'harga.required'  => "Harga penawaran harus diisi",
            'harga.numeric'  => "Harga penawaran harus berupa angka",

        ]);

        $historyLelang = new Historylelang();

        $historyLelang->lelang_id = $lelang->id;
        $historyLelang->nama_barang = $lelang->barang->nama_barang;
        $historyLelang->users_id = Auth::user()->id;
        $historyLelang->harga = $request->harga;
        $historyLelang->status = 'pending';

        $historyLelang->save();

        return redirect()->route('dashboard.masyarakat', $lelang->id)->with('success', 'Anda berhasil menawar barang ini');
    }
    public function setPemenang(Lelang $lelang, $id)
    {
        // Mengambil data history lelang berdasarkan id
        $historyLelang = HistoryLelang::findOrFail($id);

        // Mengubah status pada history lelang menjadi 'pemenang'
        $historyLelang->status = 'pemenang';
        $historyLelang->save();

        // Mengambil data lelang berdasarkan history lelang
        $lelang = $historyLelang->lelang;

        // Mengubah status pada lelang menjadi 'ditutup'
        $lelang->status = 'tutup';
        $lelang->pemenang = $historyLelang->user->name;
        $lelang->harga_akhir = $historyLelang->harga;
        $lelang->save();

        return redirect()->back()->with('success', 'Pemenang berhasil dipilih!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoryLelang  $historyLelang
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryLelang $historyLelang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoryLelang  $historyLelang
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoryLelang $historyLelang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoryLelang  $historyLelang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoryLelang $historyLelang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoryLelang  $historyLelang
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoryLelang $historyLelang)
    {
        //
        $historyLelang->delete();
        return redirect()->route('datapenawar.index');
    }
}
?>
