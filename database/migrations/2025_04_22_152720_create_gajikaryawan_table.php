<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajikaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gajikaryawan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_karyawan')->references('id')->on('tambahkaryawan')->onDelete('cascade');
            $table->date('tanggal_gaji');
            $table->integer('gaji_bulanini');
            $table->integer('total');
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
        Schema::dropIfExists('gajikaryawan');
    }
}
