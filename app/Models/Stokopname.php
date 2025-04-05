<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stokopname extends Model
{
    use HasFactory;
    protected $table = 'stokopname';
    
    protected $fillable = [
    'id',
    'tanggal_opname',
    'nama_produk',
    'stok',
    'stok_akhir',
    'keterangan',
    ];
}
