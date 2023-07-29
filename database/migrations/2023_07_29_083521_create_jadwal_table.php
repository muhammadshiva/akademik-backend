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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('id_dosen');
            $table->unsignedBigInteger('id_matakuliah');
            $table->string('jam_mulai', 10);
            $table->string('jam_selesai', 10);
            $table->timestamps();

            // Definisi foreign key constraints
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('id_dosen')->references('id')->on('dosen')->onDelete('cascade');
            $table->foreign('id_matakuliah')->references('id')->on('matakuliah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
};
