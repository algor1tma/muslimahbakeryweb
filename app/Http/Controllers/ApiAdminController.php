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

class ApiAdminController extends Controller
{
    

    public function index()
    {
        $totalHarga = DB::table('laporans')->sum('total_harga');
        $jumlahLaporan = DB::table('laporans')->count();
        $jumlahUser = DB::table('users')->count();
        $pesanans = Pesanan::with('user')->get();

        $data = DB::table('laporans')
            ->select(DB::raw('DATE_FORMAT(tanggal_pesanan, "%M") as month'), DB::raw('COUNT(*) as jumlahTransaksi'))
            ->groupBy(DB::raw('YEAR(tanggal_pesanan)'), DB::raw('MONTH(tanggal_pesanan)'),'tanggal_pesanan')
            ->get();

        $userData = DB::table('users')
            ->select(DB::raw('DATE_FORMAT(created_at, "%M") as month'), DB::raw('COUNT(*) as jumlahUser'))
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'),'created_at')
            ->get();

        $mergedData = [];
        foreach ($data as $item) {
            $month = \DateTime::createFromFormat('F', $item->month)->format('m');
            $mergedData[$month] = [
                'jumlahTransaksi' => $item->jumlahTransaksi,
                'jumlahUser' => 0,
            ];
        }

        foreach ($userData as $item) {
            $month = \DateTime::createFromFormat('F', $item->month)->format('m');
            if (array_key_exists($month, $mergedData)) {
                $mergedData[$month]['jumlahUser'] = $item->jumlahUser;
            } else {
                $mergedData[$month] = [
                    'jumlahTransaksi' => 0,
                    'jumlahUser' => $item->jumlahUser,
                ];
            }
        }

        ksort($mergedData);

        $chartData = [];
        foreach ($mergedData as $month => $values) {
            $chartData[] = [
                'month' => date('F', mktime(0, 0, 0, $month, 1)),
                'jumlahTransaksi' => $values['jumlahTransaksi'],
                'jumlahUser' => $values['jumlahUser'],
            ];
        }

        return response()->json([
            'totalHarga' => $totalHarga,
            'jumlahLaporan' => $jumlahLaporan,
            'jumlahUser' => $jumlahUser,
            'chartData' => $chartData,
            'pesanans' => $pesanans
        ]);
    }

    public function user()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function edituser(User $user)
    {
        return response()->json($user);
    }

    public function tambahuser()
    {
        return response()->json(['message' => 'Add user form data here']);
    }

    public function storeuser(UserRequest $request)
    {
        $validatedData = $request->validated();
        User::create($validatedData);
        return response()->json(['message' => 'User created successfully']);
    }

    public function updateuser(UpdateUserRequest $request, User $user)
    {
        $validatedData = $request->validated();
        $user->update($validatedData);
        return response()->json(['message' => 'User updated successfully']);
    }

    public function deleteuser(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }

    public function showLaporan()
    {
        $laporans = Laporan::with('user', 'admin')->get();
        return response()->json($laporans);
    }

    public function dataadmin()
    {
        $admins = Admin::all();
        return response()->json($admins);
    }

    public function editadmin(Admin $admin)
    {
        return response()->json($admin);
    }

    public function tambahadmin()
    {
        return response()->json(['message' => 'Add admin form data here']);
    }

    public function store(AdminRequest $request)
    {
        $validatedData = $request->validated();
        Admin::create($validatedData);
        return response()->json(['message' => 'Admin created successfully']);
    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $validatedData = $request->validated();
        $admin->update($validatedData);
        return response()->json(['message' => 'Admin updated successfully']);
    }

    public function delete(Admin $admin)
    {
        $admin->delete();
        return response()->json(['message' => 'Admin deleted successfully']);
    }

    public function produk()
    {
        $produks = Produk::with('kategori')->get();
        return response()->json($produks);
    }

    public function editproduk(Produk $produk)
    {
        $kategoris = Kategori::all();
        return response()->json(['produk' => $produk, 'kategoris' => $kategoris]);
    }

    public function tambahproduk()
    {
        $kategoris = Kategori::all();
        return response()->json(['kategoris' => $kategoris]);
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

        return response()->json(['message' => 'Produk created successfully']);
    }

    public function updateproduk(UpdateProdukRequest $request, Produk $produk)
    {
        $validated = $request->validated();

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambarPath = 'assets/img/' . $gambarName;

            $gambar->move(public_path('assets/img'), $gambarName);

            $validated['gambar'] = $gambarPath;

            if ($produk->gambar) {
                $oldGambarPath = public_path($produk->gambar);
                if (file_exists($oldGambarPath)) {
                    unlink($oldGambarPath);
                }
            }
        }

        $produk->update($validated);

        return response()->json(['message' => 'Produk updated successfully']);
    }

    public function deleteproduk(Produk $produk)
    {
        $produk->delete();
        return response()->json(['message' => 'Produk deleted successfully']);
    }

    public function kategori()
    {
        $kategoris = DB::table('kategoris')->get();
        return response()->json($kategoris);
    }

    public function editkategori(Kategori $kategori)
    {
        return response()->json($kategori);
    }

    public function tambahkategori()
    {
        return response()->json(['message' => 'Add kategori form data here']);
    }

    public function storekategori(KategoriRequest $request)
    {
        $validatedData = $request->validated();
        Kategori::create($validatedData);
        return response()->json(['message' => 'Kategori created successfully']);
    }

    public function updatekategori(UpdateKategoriRequest $request, Kategori $kategori)
    {
        $validatedData = $request->validated();
        $kategori->update($validatedData);
        return response()->json(['message' => 'Kategori updated successfully']);
    }

    public function deletekategori(Kategori $kategori)
    {
        $kategori->delete();
        return response()->json(['message' => 'Kategori deleted successfully']);
    }

    public function pesanan()
    {
        $pesanans = Pesanan::with('user')->get();
        return response()->json($pesanans);
    }

    public function detailpesanan(Pesanan $pesanan)
    {
        $user = $pesanan->user;
        $pesanan_details = PesananDetail::with('produk')->where('pesanan_id', $pesanan->id)->get();
        $total = $pesanan_details->sum(function($psndtl) {
            return $psndtl->qty * $psndtl->produk->harga;
        });

        $pesanan->total_harga = $total;
        $pesanan->save();

        Log::info('Total harga diperbarui:', ['pesanan_id' => $pesanan->id, 'total_harga' => $total]);

        return response()->json(['pesanan' => $pesanan, 'user' => $user, 'pesanan_details' => $pesanan_details, 'total' => $total]);
    }

    public function markAsPaid($id)
    {
        $pesanan = Pesanan::find($id);

        if ($pesanan) {
            $admin = Admin::find(1);

            if ($admin) {
                Laporan::create([
                    'user_id' => $pesanan->user_id,
                    'status' => 'lunas',
                    'tanggal_pesanan' => $pesanan->created_at,
                    'nama' => $pesanan->user->name,
                    'admin_id' => $admin->id,
                    'total_harga' => $pesanan->total_harga
                ]);

                $pesanan->delete();

                return response()->json(['message' => 'Pesanan marked as paid and moved to laporan successfully']);
            } else {
                return response()->json(['error' => 'Admin with ID 1 not found'], 404);
            }
        }

        return response()->json(['error' => 'Pesanan not found'], 404);
    }

    public function deletepesanan(Pesanan $pesanan)
    {
        $pesanan->delete();
        return response()->json(['message' => 'Pesanan deleted successfully']);
    }

    public function profile()
    {
        return response()->json(['message' => 'Profile data here']);
    }
}
