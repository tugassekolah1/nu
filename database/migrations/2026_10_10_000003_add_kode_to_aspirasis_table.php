<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('aspirasis', function (Blueprint $table) {
            $table->string('kode', 20)->nullable()->after('id');
        });

        // Isi nomor pelacakan untuk data lama
        foreach (DB::table('aspirasis')->whereNull('kode')->get(['id']) as $row) {
            do {
                $kode = 'ASP-'.strtoupper(Str::random(8));
            } while (DB::table('aspirasis')->where('kode', $kode)->exists());

            DB::table('aspirasis')->where('id', $row->id)->update(['kode' => $kode]);
        }

        Schema::table('aspirasis', function (Blueprint $table) {
            $table->string('kode', 20)->nullable(false)->unique()->change();
        });
    }

    public function down(): void
    {
        Schema::table('aspirasis', function (Blueprint $table) {
            $table->dropColumn('kode');
        });
    }
};
