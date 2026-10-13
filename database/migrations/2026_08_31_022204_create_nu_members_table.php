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
        Schema::create('nu_members', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('full_name');
            $table->string('phone');
            $table->enum('gender', ['L', 'P']);
            $table->string('organisasi', 50)->nullable()->after('gender');
            $table->string('label_organisasi')->nullable()->after('organisasi');
            $table->text('address');
            $table->string('photo')->nullable()->after('address');
            $table->string('member_card_no')->nullable()->unique();
            $table->enum('status', ['pending_payment', 'active'])->default('pending_payment');

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

            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nu_members');
    }
};
