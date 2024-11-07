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
        //membuat tbl_barang pada database
        Schema::create('tbl_barang', function (Blueprint $table) {
            $table->bigIncrements('id_barang'); //integer dan primarikey dan auto increment
            $table->string('gambar'); //varchar
            $table->string('nama_barang');
            $table->string('merk');
            $table->integer('stok'); //integer
            $table->integer('harga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_barang');
    }
};
