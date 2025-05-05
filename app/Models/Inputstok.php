<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subkategori;
use App\Models\Stokopname;

class Inputstok extends Model
{
    use HasFactory;
    protected $table = 'inputstoks';

    protected $fillable = [
        'id_subkategori',
        'nama_produk',
        'stok',
        'harga_jual',
        'harga_beli',
    ];

    public function subkategori(){
        return $this->belongsTo(Subkategori::class, 'id_subkategori', 'id');
    }
    public function stokopmames()
    {
        return $this->hasMany(Stokopname::class, 'id_inputstok');
    }
}
