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
        Schema::create('santri', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('no_daftar');
            $table->string('nisn');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->integer('anak_ke');
            $table->integer('dari_bersaudara');
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O']);
            $table->float('tinggi_badan');
            $table->float('berat_badan');
            $table->enum('buta_warna', ['TOTAL', 'PARSIAL', 'TIDAK']);
            $table->enum('status_anak', ['YATIM', 'PIATU', 'YATIM PIATU', 'TIDAK']);
            $table->boolean('status_pembayaran')->default(false);
            $table->boolean('status_lulus')->default(false);
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santri');
    }
};