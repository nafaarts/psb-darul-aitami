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
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('santri_id')->constrained('santri')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('nama_sekolah');
            $table->string('npsn_sekolah');
            $table->string('alamat_sekolah');
            $table->string('no_ijazah');
            $table->integer('tahun_ijazah');
            $table->float('nilai_rapor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan');
    }
};