<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_create_beritas_table.php
public function up()
{
    Schema::create('beritas', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('slug')->unique();
        $table->text('isi');
        $table->string('gambar')->nullable();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->boolean('status')->default(true); // publish/draft
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
