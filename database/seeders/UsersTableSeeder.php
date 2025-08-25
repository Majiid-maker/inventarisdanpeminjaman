<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Super',
                'email' => 'super@example.com',
                'role' => 'super',
                'nim_npp' => '0682.0123.4567',
                'prodi' => 'D3 Teknik Informatika',
                'fakultas' => 'Fakultas Ilmu Komputer',
                'no_hp' => '0812345678',
                'password' => bcrypt('super'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'role' => 'admin',
                'nim_npp' => '0682.0123.4567',
                'prodi' => 'D3 Teknik Informatika',
                'fakultas' => 'Fakultas Ilmu Komputer',
                'no_hp' => '0812345678',
                'password' => bcrypt('admin'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Users',
                'email' => 'user@example.com',
                'role' => 'user',
                'nim_npp' => '0682.0123.4567',
                'prodi' => 'D3 Teknik Informatika',
                'fakultas' => 'Fakultas Ilmu Komputer',
                'no_hp' => '0812345678',
                'password' => bcrypt('user'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
