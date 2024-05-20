<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\KategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use App\Models\Admin;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashbord');
    }

    public function user()
    {
        $users = User::all();
        return view('user', compact('users'));
    }

    public function edituser(User $user)
    {
        return view('edituser', compact('user'));
    }

    public function tambahuser()
    {
        return view('tambahuser');
    }

    public function storeuser(UserRequest $request)
    {
        $validatedData = $request->validated();
        User::create($validatedData);
        return redirect()->route('user');
    }

    public function updateuser(UpdateUserRequest $request, User $user)
    {
        $validatedData = $request->validated();
        $user->update($validatedData);
        return redirect()->route('user');
    }

    public function deleteuser(User $user)
    {
        $user->delete();
        return redirect()->route('user');
    }

    public function laporan()
    {
        return view('laporan');
    }

    public function dataadmin()
    {
        $admins = Admin::all();
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
        return redirect()->route('dataadmin');
    }

    public function produk()
    {
        
        return view('produk');
    }

    public function kategori()
    {
            $kategoris = DB::table('kategoris')->get();
            return view('kategori', compact('kategoris'));
    }

    public function editkategori(Kategori $kategori)
        {
            return view('editkategori', compact('kategori'));
        }

    public function tambahkategori()
        {
            return view('tambahkategori');
        }

    public function storekategori(KategoriRequest $request)
        {
            $validatedData = $request->validated();
            Kategori::create($validatedData);
            return redirect()->route('kategori');
        }

    public function updatekategori(UpdateKategoriRequest $request, Kategori $kategori)
        {
            $validatedData = $request->validated();
            $kategori->update($validatedData);
            return redirect()->route('kategori');
        }

    public function deletekategori(Kategori $kategori)
        {
            $kategori->delete();
            return redirect()->route('kategori');
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
