<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPemeriksaanFieldsToScreeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('screenings', function (Blueprint $table) {
            $table->enum('jenis_pemeriksaan', ['tes_darah', 'xray', 'ct_scan'])->nullable();
            $table->string('hasil_pemeriksaan')->nullable();
            $table->string('image_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('screenings', function (Blueprint $table) {
            $table->dropColumn(['jenis_pemeriksaan', 'hasil_pemeriksaan', 'image_path']);
        });
    }
}
