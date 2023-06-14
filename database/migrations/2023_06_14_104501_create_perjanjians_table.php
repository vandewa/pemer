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
            $table->string('no_pemkot');
            $table->string('no_penyedia');
            $table->text('judul');
            $table->string('pihak_1');
            $table->string('pihak_2');
            $table->longText('tentang');
            $table->longText('ruang_lingkup');
            $table->date('tanggal_mulai');
            $table->longText('tanggal_selesai');
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
