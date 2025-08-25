<?php
// database/migrations/2025_08_07_000005_create_inventaris_log_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('inventaris_log', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventaris_id')->constrained('inventaris')->cascadeOnDelete();
            $table->date('waktu');
            $table->integer('jumlah');
            $table->string('kondisi', 50);
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->index('inventaris_id', 'inventaris_log_inventaris_id_bulan_tahun_index');
        });
    }

    public function down(): void {
        Schema::dropIfExists('inventaris_log');
    }
};
