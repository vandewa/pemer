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
        Schema::create('perjanjians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenis_dokumen_id');
            $table->enum('status', ['Pengajuan', 'Diterima', 'Diproses', 'Selesai']);
            $table->string('no_surat');
            $table->string('tgl_permohonan');
            $table->string('no_pemkot')->nullable();//di admin
            $table->text('judul');
            $table->string('obyek');
            $table->longText('ruang_lingkup');
            $table->string('path_surat_permohonan');
            $table->string('path_surat_kak');
            $table->string('path_surat_perjanjian_kerja')->nullable(); //di admin
            $table->date('tanggal_mulai')->nullable();//di admin
            $table->date('tanggal_selesai')->nullable();//di admin
            $table->string('pemohon_id');
            $table->timestamps();
            $table->foreign('jenis_dokumen_id')->references('id')->on('jenis_dokumens')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perjanjians');
    }
};
