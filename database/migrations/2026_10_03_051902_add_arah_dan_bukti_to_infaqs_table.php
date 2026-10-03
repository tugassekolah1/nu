<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('infaqs', function (Blueprint $table) {
            $table->enum('arah', ['masuk', 'keluar'])->default('masuk')->after('status');
            $table->string('kategori')->nullable()->after('arah');
            $table->string('penanggung_jawab')->nullable()->after('kategori');
            $table->string('bukti_path')->nullable()->after('penanggung_jawab');
        });
    }

    public function down(): void
    {
        Schema::table('infaqs', function (Blueprint $table) {
            $table->dropColumn(['arah', 'kategori', 'penanggung_jawab', 'bukti_path']);
        });
    }
};
