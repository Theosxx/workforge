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
        Schema::create('tb_lowongan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('posisi');
            $table->integer('gaji_minimal');
            $table->integer('gaji_maksimal');
            $table->string('lokasi');
            $table->text('foto');
            $table->string('tipe_pekerjaan');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_lowongan');
    }
};
