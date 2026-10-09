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
        Schema::create('aspirasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('email')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('kategori', 50); // kegiatan, fasilitas, pelayanan, kaderisasi, lainnya
            $table->text('isi');
            $table->string('status', 20)->default('baru'); // baru, diproses, selesai, ditolak
            $table->text('tanggapan')->nullable();
            $table->timestamp('tanggapan_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirasis');
    }
};
