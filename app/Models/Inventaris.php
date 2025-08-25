<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'nama_barang',
        'spesifikasi',
        'deskripsi',
    ];

    // Relasi ke Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Relasi ke InventarisLog
    public function logs()
    {
        return $this->hasMany(InventarisLog::class);
    }
}
