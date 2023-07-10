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
        Schema::create('publishes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jenis_dokumen_id');
            $table->integer('pengajuan_id');
            $table->string('no_pemkot');
            $table->string('path_surat_perjanjian_kerja');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('batas_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publishes');
    }
};
