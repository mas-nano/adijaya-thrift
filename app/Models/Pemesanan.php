<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function pembeli()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function penjual()
    {
        return $this->belongsTo(User::class, 'penjual_id');
    }
}
