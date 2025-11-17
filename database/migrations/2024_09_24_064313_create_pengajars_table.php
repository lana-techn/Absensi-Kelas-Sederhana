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
        Schema::create('pengajars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guru_id'); // Ubah menjadi integer agar sesuai dengan nip di tabel gurus
            $table->foreign('guru_id', 'pengajars_guru_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade'); // Tidak ada masalah di sini
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajars');
    }
};
