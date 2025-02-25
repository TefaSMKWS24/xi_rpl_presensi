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
        Schema::create('jadwal_mapel', function (Blueprint $table) {
            $table->id();
            $table->string("id_jadwal_mapel");
            $table->string("id_guru");
            $table->string("id_mapel");
            $table->string("hari");
            $table->time("jam_mulai");
            $table->time("jam_berakhir");
            $table->string("id_kelas");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_mapel');
    }
};
