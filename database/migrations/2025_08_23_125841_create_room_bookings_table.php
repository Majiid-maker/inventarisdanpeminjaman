<?php
// database/migrations/2025_08_07_000003_create_room_bookings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('room_id')->constrained('rooms')->cascadeOnDelete();
            $table->text('kepentingan');
            $table->date('tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->enum('status', ['pending', 'disetujui', 'ditolak', 'revisi','selesai'])->default('pending');
            $table->text('catatan');
            $table->timestamps();

            $table->index(['room_id', 'tanggal']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('room_bookings');
    }
};
