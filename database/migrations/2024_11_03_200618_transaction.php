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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('bank');
            $table->string('nama_lengkap');
            $table->string('no_rek');
            $table->string('nominal');
            $table->text('keterangan');
            $table->enum('status', ['diterima', 'terkirim', 'menunggu', 'gagal']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
