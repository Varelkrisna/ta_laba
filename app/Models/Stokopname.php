<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inputstok;

class Stokopname extends Model
{
    use HasFactory;
    protected $table = 'stokopname';

    protected $fillable = [
        'id',
        'id_inputstok',
        'tanggal_opname',
        'stok_akhir',
        'keterangan',
        'total',
    ];

    public function inputStok()
    {
        return $this->belongsTo(Inputstok::class, 'id_inputstok');
    }
}
