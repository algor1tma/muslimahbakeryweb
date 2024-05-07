<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('dashbord');
    }

    public function penjualan(){
        return view('penjualan');
    }
    public function laporan(){
        return view('laporan');
    }
    public function dataadmin(){
        return view('dataadmin');
    }
    public function produk(){
        return view('produk');
    }
    public function transaksi(){
        return view('transaksi');
    }
}
