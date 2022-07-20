<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pemeriksaan',10);
            $table->foreignId('antrian_id');
            $table->foreignId('pasien_id');
            $table->foreignId('dokter_id');
            $table->integer('tekanan_darah');
            $table->integer('suhu_badan');
            $table->string('keluhan',50);
            $table->enum('status_pemeriksaan',array('selesai','belum'));
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
};
