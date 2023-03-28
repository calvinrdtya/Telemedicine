<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            // $table->id();
            $table->bigIncrements('pasien_id');
            $table->string('nama_pasien');
            $table->string('alamat_pasien');
            $table->string('tgl_datang');
            $table->string('nama_obat');
            $table->string('no_telp');
            $table->string('keluhan_pasien');
            $table->unsignedBigInteger('dokter_id');
            // $table->unsignedBigInteger('pasien_id');
            // $table->unsignedBigInteger('obat_id');
            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
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
        Schema::dropIfExists('pasiens');
    }
}
