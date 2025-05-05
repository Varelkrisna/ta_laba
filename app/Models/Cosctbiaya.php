<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategoribiaya;

class Cosctbiaya extends Model
{
    use HasFactory;
    protected $table = 'cosctbiaya';
    protected $fillable = [
        'id_kategoribiaya',
        'tanggal_bayar',
        'nominal',
    ];
    public function tambahkategori(){
        return $this->belongsTo(Kategoribiaya::class, 'id_kategoribiaya', 'id');
    }
}
