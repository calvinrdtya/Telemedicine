<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDokterIdToScreeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('screenings', function (Blueprint $table) {
            $table->foreignId('dokter_id')->after('pasien_id')->constrained('users')->onDelete('cascade');
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
            $table->dropForeign(['dokter_id']);
            $table->dropColumn('dokter_id');
        });
    }
}
