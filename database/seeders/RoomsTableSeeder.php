<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rooms')->insert([
            [
                'id' => 1,
                'nama_ruang' => 'Laboratorium Data Mining',
                'lokasi' => 'Gedung H Lantai 3',
                'deskripsi' => 'Ruang seminar untuk kegiatan akademik',
                'kapasitas' => 20,
                'gambar' => 'datamining.jpg',
                'created_at' => '2025-08-08 05:52:16',
                'updated_at' => '2025-08-08 05:52:16',
            ],
            [
                'id' => 2,
                'nama_ruang' => 'Laboratorium Multimedia',
                'lokasi' => 'Gedung D Lantai 2',
                'deskripsi' => 'Laboratorium komputer untuk praktikum',
                'kapasitas' => 40,
                'gambar' => 'labmultimed.jpg',
                'created_at' => '2025-08-08 05:52:16',
                'updated_at' => '2025-08-08 05:52:16',
            ],
            [
                'id' => 3,
                'nama_ruang' => 'Laboratorium RPL',
                'lokasi' => 'Lab Rekayasa Perangkat Lunak',
                'deskripsi' => 'Lab Praktik',
                'kapasitas' => 40,
                'gambar' => 'ruanglabkom.png',
                'created_at' => '2025-08-08 05:52:16',
                'updated_at' => '2025-08-08 05:52:16',
            ],
        ]);
    }
}
