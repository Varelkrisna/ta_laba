<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subkategori;

class Tambahkategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = [
        'nama_kategori'
    ];
    public function subkategori(){
        return $this->hasMany(Subkategori::class, 'id_kategori', 'id');
    }

}
