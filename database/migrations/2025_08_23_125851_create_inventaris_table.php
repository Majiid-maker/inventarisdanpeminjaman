<?php
// database/migrations/2025_08_07_000004_create_inventaris_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained('rooms')->cascadeOnDelete();
            $table->string('nama_barang', 100);
            $table->text('spesifikasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();

            $table->index('room_id', 'idx_inventaris_room_id');
        });
    }

    public function down(): void {
        Schema::dropIfExists('inventaris');
    }
};
