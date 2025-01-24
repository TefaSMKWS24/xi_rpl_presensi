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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string("id_siswa");
            $table->string("nisn");
            $table->string("nama");
            $table->string("tahun_masuk");
            $table->string("status_masuk");
            $table->string("jenis_kelamin");
            $table->string("alamat");
            $table->date("tanggal_lahir");
            $table->string("tempat_lahir");
            $table->string("no_telphone");
            $table->string("tahun_keluar");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
