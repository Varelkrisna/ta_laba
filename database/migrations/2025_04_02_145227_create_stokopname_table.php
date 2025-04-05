<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokopnameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stokopname', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_opname');
            $table->string('nama_produk');
            $table->integer('stok');
            $table->integer('stok_akhir');
            $table->String('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stokopname');
    }
}
