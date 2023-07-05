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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenis_dokumen_id');
            $table->enum('status', ['Pengajuan', 'Ditinjau', 'Diproses', 'Selesai', 'Ditolak']);
            $table->string('no_surat');
            $table->string('tgl_permohonan');
            $table->text('judul');
            $table->string('obyek');
            $table->longText('ruang_lingkup');
            $table->string('path_surat_permohonan');
            $table->string('path_studi_kak');
            $table->string('pemohon_id');
            $table->foreign('jenis_dokumen_id')->references('id')->on('jenis_dokumens')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
