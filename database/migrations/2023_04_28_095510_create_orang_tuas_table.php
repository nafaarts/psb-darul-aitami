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
        Schema::create('orang_tua', function (Blueprint $table) {
            $table->id();
            $table->foreignId('santri_id')->constrained('santri')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('agama');
            $table->string('alamat');
            // $table->string('jalan');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('no_hp');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->enum('pendidikan_ayah', ['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']);
            $table->enum('pendidikan_ibu', ['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']);
            $table->string('penghasilan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orang_tua');
    }
};
