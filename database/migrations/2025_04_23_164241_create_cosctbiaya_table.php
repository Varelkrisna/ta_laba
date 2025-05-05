<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosctbiayaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosctbiaya', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategoribiaya')->references('id')->on('kategoribiaya')->onDelete('cascade');
            $table->date('tanggal_bayar');
            $table->integer('nominal');
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
        Schema::dropIfExists('cosctbiaya');
    }
}
