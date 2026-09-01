<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('penguruses', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('banom'); // ranting, ipnu, ippnu, fatayat, banser
            $table->string('label_banom'); // Ranting NU, PR IPNU, Satkoryon Banser, dll.
            $table->string('foto')->nullable(); // simpan path foto jika ada
            $table->integer('urutan')->default(0); // untuk mengatur susunan pengurus
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penguruses');
    }
};