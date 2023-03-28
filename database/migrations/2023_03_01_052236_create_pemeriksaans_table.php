<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->bigIncrements('no_pemeriksaan');
            $table->string('pasien_id');
            $table->string('dokter_id');
            $table->string('keluhan');
            $table->string('diagnosa');
            $table->string('tindakan');
            $table->string('berat_badan');
            $table->string('tensi_diastolik');
            $table->string('tensi_sistolik');
            // $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
            // $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
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
        Schema::dropIfExists('pemeriksaans');
    }
}
