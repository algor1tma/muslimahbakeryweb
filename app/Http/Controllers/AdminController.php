<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\KategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use App\Http\Requests\ProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\Admin;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $produks = Produk::all();
        return view('produk', compact('produks'));
    }

    public function editproduk(Produk $produk)
    {
        return view('editproduk', compact('produk'));
    }

    public function tambahproduk()
    {
        return view('tambahproduk');
    }

    public function storeproduk(ProdukRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->storeAs('public/assets/img', $gambar->getClientOriginalName());
            $validatedData['gambar'] = str_replace('public/', '', $gambarPath);
        }
        Produk::create($validatedData);
        return redirect()->route('produk');
    }

    public function updateproduk(UpdateProdukRequest $request, Produk $produk)
{
    $validated = $request->validated();

    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $gambarName = time() . '_' . $gambar->getClientOriginalName();
        $gambarPath = 'assets/img/' . $gambarName;

        // Pindahkan file gambar ke direktori public/assets/img
        $gambar->move(public_path('assets/img'), $gambarName);

        // Ubah jalur gambar dalam data yang divalidasi
        $validated['gambar'] = $gambarPath;

        // Hapus gambar lama jika ada
        if ($produk->gambar) {
            $oldGambarPath = public_path($produk->gambar);
            if (file_exists($oldGambarPath)) {
                unlink($oldGambarPath);
            }
        }
    }

    $produk->update($validated);

    return redirect()->route('produk')->with('success', 'Produk berhasil diperbarui.');
}

    

//     public function updateproduk(UpdateProdukRequest $request, Produk $produk)
// {
//     $validated = $request->validated();
    
//     // Periksa apakah ada file gambar yang diunggah
//     if ($request->hasFile('gambar')) {
//         // Simpan gambar baru dan dapatkan jalur penyimpanannya
//         $gambar = $request->file('gambar')->store('public/assets/img');
//         // $gambar->storeAs('public/assets/img');
        
//         // // Ubah jalur gambar dalam data yang divalidasi
//         $validated['gambar'] = str_replace('public/assets/img/', '', $gambar);
//         // dd($validated['gambar']);

//         // Hapus gambar lama jika ada
//         Storage::delete($produk->gambar);
//     }

//     // Perbarui data produk dengan data yang divalidasi
//     $produk->update($validated);

//     return redirect()->route('produk')->with('success', 'Produk berhasil diperbarui.');
// }


    public function deleteproduk(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk');
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
