<?php

use App\Model\m_level;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // Migration - Praktikum 2.2 - Pembuatan file migrasi dengan relasi
    public function up(): void
    {
        Schema::create('useri', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('username', 20)->unique();
            $table->string('nama', 100);
            $table->string('password');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('useri');
    }
};
