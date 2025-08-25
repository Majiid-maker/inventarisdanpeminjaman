<?php
// database/migrations/2025_08_07_000002_create_rooms_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ruang', 100);
            $table->string('lokasi', 150);
            $table->text('deskripsi')->nullable();
            $table->integer('kapasitas');
            $table->string('gambar')->nullable(); // kolom baru
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('rooms');
    }
};
