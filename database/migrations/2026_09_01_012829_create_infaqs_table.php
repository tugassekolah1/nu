<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('infaqs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi')->unique();
            $table->string('nama_donatur')->default('Hamba Allah');
            $table->string('no_hp')->nullable();
            $table->bigInteger('nominal');
            $table->string('metode_pembayaran'); // transfer_bank, qris, tunai
            $table->enum('status', ['pending', 'lunas', 'dibatalkan'])->default('pending');
            $table->text('catatan')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('infaqs');
    }
};