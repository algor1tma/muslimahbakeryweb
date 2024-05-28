<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'tanggal_pesanan',
        'nama',
        'admin_id',
        'total_harga'
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan model Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
