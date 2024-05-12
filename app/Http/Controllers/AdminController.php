<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashbord');
    }

    public function penjualan()
    {
        return view('penjualan');
    }

    public function laporan()
    {
        return view('laporan');
    }

    public function dataadmin()
    {
        $admins = DB::table('admins')->get();
        return view('dataadmin', compact('admins'));
    }

    public function editadmin(Admin $admin)
    {
        return view('editadmin', compact('admin'));
    }

    public function tambahadmin()
    {
        return view('tambahadmin');
    }

    public function store(AdminRequest $request)
    {
        $validatedData = $request->validated();
        Admin::create($validatedData);
        return redirect()->route('dataadmin');
    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $validatedData = $request->validated();
        $admin->update($validatedData);
        return redirect()->route('dataadmin');
    }
    public function delete(Admin $admin)
    {
        $admin->delete();
        return redirect('/dataadmin');
    }

    public function produk()
    {
        return view('produk');
    }

    public function transaksi()
    {
        return view('transaksi');
    }

    public function profile()
    {
        return view('profile');
    }
}
