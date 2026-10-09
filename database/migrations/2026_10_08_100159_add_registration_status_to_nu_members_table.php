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
        Schema::table('nu_members', function (Blueprint $table) {
            // Status permintaan pendaftaran: menunggu / diterima / ditolak.
            // Nullable agar data lama tetap kompatibel (diturunkan dari kolom status).
            $table->enum('registration_status', ['pending', 'accepted', 'rejected'])
                ->nullable()
                ->default(null)
                ->after('status')
                ->index();

            $table->text('rejection_reason')
                ->nullable()
                ->after('registration_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nu_members', function (Blueprint $table) {
            $table->dropColumn(['registration_status', 'rejection_reason']);
        });
    }
};
