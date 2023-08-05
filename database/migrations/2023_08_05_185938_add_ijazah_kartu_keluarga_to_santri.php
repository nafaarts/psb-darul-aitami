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
        Schema::table('santri', function (Blueprint $table) {
            $table->string('ijazah')->nullable()->after('status_daftar_ulang');
            $table->string('kartu_keluarga')->nullable()->after('ijazah');
            $table->string('ukuran_baju_olahraga')->nullable()->after('kartu_keluarga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('santri', function (Blueprint $table) {
            $table->dropColumn(['ijazah', 'kartu_keluarga', 'ukuran_baju_olahraga']);
        });
    }
};
