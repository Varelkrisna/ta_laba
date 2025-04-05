<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inputstok extends Model
{
    use HasFactory;
    protected $table = 'inputstoks';

    protected $fillable = [
    'id',
    'kategori',
    'sub_kategori',
    'nama_produk',
    'stok',
    'harga_jual',
    'harga_beli',
    ];
}
