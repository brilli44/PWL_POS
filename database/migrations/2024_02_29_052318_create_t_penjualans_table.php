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
        Schema::create('t_penjualans', function (Blueprint $table) {
            $table->id('penjualan_id');
            $table->unsignedBigInteger('user_id')->index();//indexing untuk ForeignKey
            $table->String('pembeli', 50);
            $table->String('penjualan_kode', 20)->unique; //unique unutk memastikan tidak ada username yang sama
            $table->dateTime('penjualan_tanggal');
            $table->timestamps();

               //mendefinisikan  foreign key pada kolom level_id mengacu pada kolom level_id di tabel m_level
            $table->foreign('user_id')->references('user_id')->on('m_users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_penjualans');
    }
};
