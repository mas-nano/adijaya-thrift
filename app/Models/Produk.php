<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search']??false, function($query, $search){
            return $query->where('nama_produk', 'like', '%'.$search.'%');
        });
        $query->when($filters['daerah']??false, function($query, $daerah){
            return $query->whereHas('user', function($query) use ($daerah){
                $query->where('provinsi', $daerah);
            });
        });
        $query->when($filters['sort']??false, function($query, $sort){
            if($sort=='Terlama'){
                return $query->orderBy('created_at', 'asc');
            }else{
                return $query->orderBy('created_at', 'desc');
            }
        });
        $query->when($filters['kategori']??false, function($query, $kategori){
            return $query->where('kategori', $kategori);
        });
        $query->when($filters['promo']??false, function($query){
            return $query->whereNotNull('promo');
        });
        $query->when($filters['min']??false, function($query, $min){
            return $query->where('harga', '>=', intval($min));
        });
        $query->when($filters['max']??false, function($query, $max){
            return $query->where('harga', '<=', intval($max));
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_penjual');
    }
}
