<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_ruang',
        'lokasi',
        'deskripsi',
        'kapasitas',
    ];

    // Relasi ke Inventaris
    public function inventaris()
    {
        return $this->hasMany(Inventaris::class);
    }

    // Relasi ke RoomBooking
    public function bookings()
    {
        return $this->hasMany(RoomBooking::class);
    }
}
