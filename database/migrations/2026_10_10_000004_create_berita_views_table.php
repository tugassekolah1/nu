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
        Schema::create('berita_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('berita_id')->constrained()->cascadeOnDelete();
            $table->date('tanggal');
            $table->unsignedBigInteger('jumlah')->default(0);
            $table->timestamps();

            // Satu baris per berita per hari (untuk rekap & grafik tren).
            $table->unique(['berita_id', 'tanggal']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_views');
    }
};
