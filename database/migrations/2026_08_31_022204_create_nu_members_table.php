<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_create_nu_members_table.php
public function up()
{
    Schema::create('nu_members', function (Blueprint $table) {
        $table->id();
        $table->string('nik', 16)->unique();
        $table->string('full_name');
        $table->string('phone');
        $table->enum('gender', ['L', 'P']);
        $table->text('address');
        $table->string('member_card_no')->nullable()->unique();
        $table->enum('status', ['pending_payment', 'active'])->default('pending_payment');
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
