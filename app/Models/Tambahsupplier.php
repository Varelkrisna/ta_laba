<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tambahsupplier extends Model
{
    use HasFactory;
    protected $table = 'tambahsupplier';
    protected $fillable = [
        'supplier',
        'pic_supplier',
        'alamat',
        'no_hp'
    ];
}
