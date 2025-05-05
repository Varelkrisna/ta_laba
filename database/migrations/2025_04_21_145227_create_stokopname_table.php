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
            $table->foreignId('id_inputstok')->references('id')->on('inputstoks')->onDelete('cascade');
            $table->date('tanggal_opname');
            $table->integer('stok_akhir');
            $table->String('keterangan')->nullable();
            $table->integer('total')->default(0); // Tambahkan kolom total dengan nilai default 0
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
