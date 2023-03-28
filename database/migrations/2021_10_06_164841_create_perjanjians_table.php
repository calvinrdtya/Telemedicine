<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerjanjiansTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('perjanjians', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('nama_pasien');
      $table->string('nama_dokter');
      $table->string('spesialiasi_dokter');
      $table->string('tgl_perjanjian');
      $table->string('waktu_perjanjian');
      $table->unsignedBigInteger('pasien_id');
      $table->foreign('pasien_id')->references('id')->on('users')->onDelete('cascade');
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
    Schema::dropIfExists('perjanjians');
  }
}
