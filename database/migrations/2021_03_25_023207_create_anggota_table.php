<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anggota');
            $table->string('no_ktp');
            $table->string('no_telp');
            $table->text('alamat');
            $table->string('email')->unique();
            $table->integer('kategori_id');
            $table->integer('kecamatan_id');
            $table->string('nama_usaha')->nullable();
            $table->text('alamat_usaha')->nullable();
            $table->string('email_usaha')->nullable();
            $table->string('foto_anggota')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}
