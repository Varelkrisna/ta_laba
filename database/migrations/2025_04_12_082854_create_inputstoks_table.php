<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputstoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputstoks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_subkategori')->references('id')->on('subkategori');
            $table->string('nama_produk');
            $table->integer('stok');
            $table->integer('harga_jual');
            $table->integer('harga_beli');
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
        Schema::dropIfExists('inputstoks');
    }
}
