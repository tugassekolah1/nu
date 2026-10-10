<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('nu_members', function (Blueprint $table) {
            $table->string('organisasi', 50)->nullable()->after('gender');
            $table->string('label_organisasi')->nullable()->after('organisasi');
        });
    }

    public function down(): void
    {
        Schema::table('nu_members', function (Blueprint $table) {
            $table->dropColumn(['organisasi', 'label_organisasi']);
        });
    }
};
