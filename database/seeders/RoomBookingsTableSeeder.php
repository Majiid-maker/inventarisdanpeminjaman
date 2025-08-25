<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomBookingsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('room_bookings')->insert([
            [
                'id' => 1,
                'user_id' => 2,
                'room_id' => 1,
                'kepentingan' => 'Presentasi Tugas Akhir',
                'tanggal' => '2025-08-10',
                'waktu_mulai' => '09:00:00',
                'waktu_selesai' => '11:00:00',
                'status' => 'pending',
                'catatan' => 'pending',
                'created_at' => '2025-08-08 05:53:47',
                'updated_at' => '2025-08-08 05:53:47',
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'room_id' => 2,
                'kepentingan' => 'Praktikum Algoritma',
                'tanggal' => '2025-08-11',
                'waktu_mulai' => '13:00:00',
                'waktu_selesai' => '15:00:00',
                'status' => 'disetujui',
                'catatan' => 'pending',
                'created_at' => '2025-08-08 05:53:47',
                'updated_at' => '2025-08-08 05:53:47',
            ],
        ]);
    }
}
