<?php

namespace App\Http\Controllers;

use App\Models\User;
Use App\Models\Barang;
Use App\Models\Lelang;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    //
    public function admin(){
        $barangs = DB::table('barangs')->count();
        $lelangs = DB::table('lelangs')->count();
        $users = DB::table('users')->where('level','petugas')->count();
        $user = DB::table('users')->where('level','masyarakat')->count();
        return view('dashboard.admin')->with(['totalbarang'=>$barangs,'totallelang'=>$lelangs,'totaluser'=>$users,'total_masyarakat'=>$user]);

    }
    public function petugas(){
        $barangs = DB::table('barangs')->count();
        $lelangs = DB::table('lelangs')->count();
        $users = DB::table('users')->where('level','masyarakat')->count();
        return view('dashboard.petugas')->with(['totalbarang'=>$barangs,'totallelang'=>$lelangs,'totaluser'=>$users]);
    }
    public function masyarakat(){
        $lelangs = Lelang::all();
        return view('dashboard.masyarakat', compact('lelangs'));
    }
}
