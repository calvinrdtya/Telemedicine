<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->string('nama_dokter');
            $table->unsignedBigInteger('nama_dokter');
            // $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
            $table->foreign('nama_dokter')->references('id')->on('dokters')->onDelete('cascade');
            $table->string('tanggal');
            $table->string('jam_buka');
            $table->string('jam_tutup');
            $table->string('note');
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
        Schema::dropIfExists('jadwals');
    }
}
