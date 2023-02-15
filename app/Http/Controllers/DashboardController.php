<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    //
    public function dashboard(){
        return view('dashboard.dashboard');
    }
    public function admin(){
        return view('dashboard.admin');
    }
    public function petugas(){
        return view('dashboard.petugas');
    }
    // public function masyarakat(){
    //     return view('dashboard.masyarakat');
    // }
}
