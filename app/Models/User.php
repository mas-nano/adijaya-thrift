<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $hidden = ['password'];

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function review()
    {
        return $this->hasMany(Review::class, 'penjual_id');
    }
    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_penjual');
    }
}
