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
}
