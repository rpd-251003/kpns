<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users_data', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique(); // Memastikan hanya ada satu baris per pengguna
            $table->string('nama_lengkap');
            $table->date('tanggal_lahir');
            $table->string('nomor_ktp');
            $table->string('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten_kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('nomor_wa')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('nomor_bank')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_data');
    }
};
