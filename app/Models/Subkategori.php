<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inputstok;
use App\Models\Tambahkategori;
class Subkategori extends Model
{
    use HasFactory;
    protected $table = 'subkategori';
    protected $fillable = [
        'id_kategori',
        'sub_kategori'
    ];
    public function inputstok(){
        return $this->hasMany(Inputstok::class, 'id_subkategori', 'id');
    }
    public function tambahkategori(){
        return $this->belongsTo(Tambahkategori::class, 'id_kategori', 'id');
    }
}
