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
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ttd');
            $table->string('nomor_surat');
            $table->string('nama_mhs');
            $table->bigInteger('npm');
            $table->enum('prodi', ['Informatika', 'Sistem Informasi']);
            $table->string('nama_dospem');
            $table->string('judul_skripsi');
            $table->string('jenis_surat')->default('Surat Tugas');
            $table->string('file_path')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_tugas');
    }
};
