<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InputstokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inputstoks')->insert([
            'kategori' => 'OLI',
            'sub_kategori' => 'Yamaha',
            'nama_produk' => 'Yamalube',
            'stok' => '45',
            'harga_jual' => '45.000',
            'harga_beli' => '40.000',
        ]);
    }
}
