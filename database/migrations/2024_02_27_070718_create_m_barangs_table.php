<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // Praktikum 2.2 Pembuatan file migrasi dengan relasi
    public function up(): void
    {
        Schema::create('m_barangs', function (Blueprint $table) {
            $table->id('barang_id');
            $table->unsignedBigInteger('kategori_id')->index();//indexing untuk ForeignKey
            $table->String('barang_kode', 10)->unique; //unique unutk memastikan tidak ada username yang sama
            $table->String('barang_nama', 100);
            $table->integer('harga_beli');
            $table->integer('harga_jual');

            $table->timestamps();

            //mendefinisikan  foreign key pada kolom level_id mengacu pada kolom level_id di tabel m_level
            $table->foreign('kategori_id')->references('kategori_id')->on('m_kategori');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_barangs');
    }
};
