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
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Laporan;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    // public function index()
    // {
    //     $totalHarga = Pesanan::sum('total_harga');
    //     $totalLaporan = Laporan::count();
    //     $totalUsers = User::count();

    //     return view('dashbord', compact('totalHarga', 'totalLaporan', 'totalUsers'));
    //     // return view('dashbord');
    // }
    public function index()
{
    // Mengambil total harga dari tabel pesanans
    $totalHarga = DB::table('laporans')->sum('total_harga');

    // Menghitung jumlah laporan dari tabel laporans
    $jumlahLaporan = DB::table('laporans')->count();

    // Menghitung jumlah user dari tabel users
    $jumlahUser = DB::table('users')->count();

    $pesanans = Pesanan::with('user')->get();

    // Mengambil jumlah transaksi dan jumlah user berdasarkan bulan
    $data = DB::table('laporans')
        ->select(DB::raw('DATE_FORMAT(tanggal_pesanan, "%M") as month'), DB::raw('COUNT(*) as jumlahTransaksi'))
        ->groupBy(DB::raw('YEAR(tanggal_pesanan)'), DB::raw('MONTH(tanggal_pesanan)'),'tanggal_pesanan')
        ->get();

    $userData = DB::table('users')
        ->select(DB::raw('DATE_FORMAT(created_at, "%M") as month'), DB::raw('COUNT(*) as jumlahUser'))
        ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'),'created_at')
        ->get();

    // Merging data transaksi dan data user berdasarkan bulan
    $mergedData = [];
    foreach ($data as $item) {
        $month = \DateTime::createFromFormat('F', $item->month)->format('m');
        $mergedData[$month] = [
            'jumlahTransaksi' => $item->jumlahTransaksi,
            'jumlahUser' => 0, // Inisialisasi jumlah user untuk bulan yang tidak memiliki data
        ];
    }

    foreach ($userData as $item) {
        $month = \DateTime::createFromFormat('F', $item->month)->format('m');
        if (array_key_exists($month, $mergedData)) {
            $mergedData[$month]['jumlahUser'] = $item->jumlahUser;
        } else {
            $mergedData[$month] = [
                'jumlahTransaksi' => 0, // Inisialisasi jumlah transaksi untuk bulan yang tidak memiliki data
                'jumlahUser' => $item->jumlahUser,
            ];
        }
    }

    // Sorting data berdasarkan bulan
    ksort($mergedData);

    // Mengonversi data menjadi array untuk digunakan di view
    $chartData = [];
    foreach ($mergedData as $month => $values) {
        $chartData[] = [
            'month' => date('F', mktime(0, 0, 0, $month, 1)),
            'jumlahTransaksi' => $values['jumlahTransaksi'],
            'jumlahUser' => $values['jumlahUser'],
        ];
    }

    return view('dashbord', compact('totalHarga', 'jumlahLaporan', 'jumlahUser', 'chartData', 'pesanans'));
}


    // public function index()
    // {
    //     $totalHarga = Pesanan::sum('total_harga');
    //     $totalLaporan = Laporan::count();
    //     $totalUsers = User::count();

    //     return view('dashboard', compact('totalHarga', 'totalLaporan', 'totalUsers'));
    // }

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






    public function showLaporan()
    {
        $laporans = Laporan::with('user', 'admin')->get();
        return view('laporan', compact('laporans'));
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
        // Mengambil semua produk beserta relasi kategorinya
        $produks = Produk::with('kategori')->get();
        return view('produk', compact('produks'));
    }

    public function editproduk(Produk $produk)
    {
        $kategoris = Kategori::all();
        return view('editproduk', compact('produk','kategoris'));
    }

    public function tambahproduk()
{
    $kategoris = Kategori::all();
    return view('tambahproduk', compact('kategoris'));
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






    // public function pesanan()
    // {
    //     return view('pesanan');
    // }
    public function pesanan()
    {
        $pesanans = Pesanan::with('user')->get();
        return view('pesanan', compact('pesanans'));
    }

    public function detailpesanan(Pesanan $pesanan)
    {
        $user = $pesanan->user;
        // Mengambil detail pesanan beserta relasi produk
        $pesanan_details = PesananDetail::with('produk')->where('pesanan_id', $pesanan->id)->get();
    
        // Hitung total harga
        $total = $pesanan_details->sum(function($psndtl) {
            return $psndtl->qty * $psndtl->produk->harga;
        });
    
        // Simpan total ke tabel pesanans
        $pesanan->total_harga = $total;
        $pesanan->save();
    
        // Tambahkan log untuk debugging
        Log::info('Total harga diperbarui:', ['pesanan_id' => $pesanan->id, 'total_harga' => $total]);
    
        return view('detailpesanan', compact('pesanan', 'user', 'pesanan_details', 'total'));
    }

    // public function markAsPaid($id)
    // {
    //     // Ambil data pesanan
    //     $pesanan = Pesanan::find($id);
    
    //     if ($pesanan) {
    //         // Pindahkan data pesanan ke tabel laporan
    //         $laporan = new Laporan();
    //         $laporan->user_id = $pesanan->user_id;
    //         $laporan->tanggal_pesanan = $pesanan->created_at;
    //         $laporan->nama = $pesanan->user->name;
    //         $laporan->total_harga = $pesanan->total_harga;
    //         $laporan->save();
    
    //         // Ubah status pesanan menjadi 'Lunas'
    //         $pesanan->status = 'Lunas';
    //         $pesanan->save();
    
    //         return redirect()->route('pesanan.index')->with('success', 'Pesanan telah ditandai sebagai lunas dan dipindahkan ke laporan.');
    //     }
    
    //     return redirect()->route('pesanan.index')->with('error', 'Pesanan tidak ditemukan.');
    // }

    public function markAsPaid($id)
    {
        // Ambil data pesanan
        $pesanan = Pesanan::find($id);
    
        if ($pesanan) {
            // Temukan admin dengan ID 1
            $admin = Admin::find(1);
    
            if ($admin) {
                // Pindahkan data pesanan ke tabel laporan
                Laporan::create([
                    'user_id' => $pesanan->user_id,
                    'status' => 'lunas',
                    'tanggal_pesanan' => $pesanan->created_at,
                    'nama' => $pesanan->user->name,
                    'admin_id' => $admin->id, // Gunakan ID admin yang ditemukan
                    'total_harga' => $pesanan->total_harga
                ]);
    
                // Hapus data pesanan dari tabel pesanan
                $pesanan->delete();
    
                return redirect()->route('pesanan')->with('success', 'Pesanan telah ditandai sebagai lunas dan dipindahkan ke laporan.');
            } else {
                return redirect()->route('pesanan')->with('error', 'Admin dengan ID 1 tidak ditemukan.');
            }
        }
    
        return redirect()->route('pesanan')->with('error', 'Pesanan tidak ditemukan.');
    }
    
    
    


    
    



    
    // public function tambahpesanan()
    // {
    //     return view('tambahpesanan');
    // }
    
    // public function storepesanan(PesananRequest $request)
    // {
    //     $validatedData = $request->validated();
    //     Pesanan::create($validatedData);
    //     return redirect()->route('pesanan')->with('success', 'Pesanan created successfully.');
    // }
    
    // public function updatepesanan(UpdatePesananRequest $request, Pesanan $pesanan)
    // {
    //     $validatedData = $request->validated();
    //     $pesanan->update($validatedData);
    //     return redirect()->route('pesanan')->with('success', 'Pesanan updated successfully.');
    // }
    
    public function deletepesanan(Pesanan $pesanan)
    {
        $pesanan->delete();
        return redirect()->route('pesanan')->with('success', 'Pesanan deleted successfully.');
    }





    public function profile()
    {
        return view('profile');
    }
}
