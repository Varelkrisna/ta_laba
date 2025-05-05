<?php

namespace App\Models;
use App\Models\Tambahkaryawan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gajikaryawan extends Model
{
    use HasFactory;
    protected $table = 'gajikaryawan';

    protected $fillable = [
        'id',
        'id_karyawan',
        'tanggal_gaji',
        'gaji_bulanini',
        'total',

    ];

    public function tambahkaryawan()
    {
        return $this->belongsTo(Tambahkaryawan::class, 'id_karyawan');
    }
}
