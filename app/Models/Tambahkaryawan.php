<?php

namespace App\Models;
use App\Models\Gajikaryawan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tambahkaryawan extends Model
{
    use HasFactory;
    protected $table = 'tambahkaryawan';
    protected $fillable = [
        'nama',
        'gaji',

    ];
    public function gajikaryawan()
    {
        return $this->hasMany(Gajikaryawan::class, 'id_karyawan');
    }
}
