<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->string("id_absensi");
            $table->string("id_siswa");
            $table->string("id_jadwal_mapel");
            $table->string("kehadiran");
            $table->string("keterangan");
            $table->string("waktu_absen");
            $table->date("tanggal_absen");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
