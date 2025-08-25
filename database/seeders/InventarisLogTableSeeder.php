<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarisLogTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('inventaris_log')->insert([
            ['inventaris_id' => 1,  'waktu' => '2025-03-01', 'jumlah' => 5,  'kondisi' => '4 PC Baik, 1 PC Bermasalah dengan Driver Display', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 2,  'waktu' => '2025-03-01', 'jumlah' => 5,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 3,  'waktu' => '2025-03-01', 'jumlah' => 5,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 4,  'waktu' => '2025-03-01', 'jumlah' => 5,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 5,  'waktu' => '2025-03-01', 'jumlah' => 5,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 6,  'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 7,  'waktu' => '2025-03-01', 'jumlah' => 6,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 8,  'waktu' => '2025-03-01', 'jumlah' => 8,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 9,  'waktu' => '2025-03-01', 'jumlah' => 15, 'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 10, 'waktu' => '2025-03-01', 'jumlah' => 7,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 11, 'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Tidak Berfungsi', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 12, 'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 13, 'waktu' => '2025-03-01', 'jumlah' => 2,  'kondisi' => 'Baik', 'keterangan' => 'Menempel di dinding', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 14, 'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 15, 'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 16, 'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Tidak Berfungsi', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 17, 'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 18, 'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Baik', 'keterangan' => 'Banner tidak dipajang', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 19, 'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Baik', 'keterangan' => 'Banner tidak dipajang', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 20, 'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Baik', 'keterangan' => 'Banner tidak dipajang', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 21, 'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Baik', 'keterangan' => 'Banner tidak dipajang', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 22, 'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 23, 'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 24, 'waktu' => '2025-03-01', 'jumlah' => 2,  'kondisi' => 'Baik', 'keterangan' => '2 Lemari Terkunci', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 25, 'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 26, 'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Baik', 'keterangan' => 'Tertutup Lemari', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 27, 'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 28, 'waktu' => '2025-03-01', 'jumlah' => 14, 'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 29, 'waktu' => '2025-03-01', 'jumlah' => 4,  'kondisi' => 'Baik', 'keterangan' => '3 Poster dipajang di dinding, 1 poster di lemari', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 30, 'waktu' => '2025-03-01', 'jumlah' => 12, 'kondisi' => '11 Baik, 1 Mati', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 31, 'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
            ['inventaris_id' => 32, 'waktu' => '2025-03-01', 'jumlah' => 1,  'kondisi' => 'Baik', 'keterangan' => '-', 'created_at' => '2025-03-26 00:00:00', 'updated_at' => '2025-03-26 00:00:00'],
        ]);
    }
}
