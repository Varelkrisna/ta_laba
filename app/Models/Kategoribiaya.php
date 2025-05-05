<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cosctbiaya;

class Kategoribiaya extends Model
{
    use HasFactory;
    protected $table = 'kategoribiaya';
    protected $fillable = [
        'nama_kategoribiaya'
    ];
    public function subkategori(){
        return $this->hasMany(Cosctbiaya::class, 'id_kategoribiaya', 'id');
    }
}
