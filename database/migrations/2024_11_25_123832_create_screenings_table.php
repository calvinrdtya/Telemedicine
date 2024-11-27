<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScreeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screenings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->string('nama_dokter');
            $table->string('spesialiasi_dokter');
            $table->date('tgl_perjanjian');
            $table->time('waktu_perjanjian');
            $table->foreignId('pasien_id')->constrained('users')->onDelete('cascade'); // Assuming pasien is a user
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
        Schema::dropIfExists('screenings');
    }
}
