<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('news');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tabel news sudah digantikan oleh beritas. Rollback tidak
        // membuat ulang tabel; gunakan forward fix bila dibutuhkan.
    }
};
