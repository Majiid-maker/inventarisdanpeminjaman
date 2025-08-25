<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarisLog extends Model
{
    use HasFactory;

    protected $table = 'inventaris_log'; // karena Laravel defaultnya jamak

    protected $fillable = [
        'inventaris_id',
        'waktu',
        'jumlah',
        'kondisi',
        'keterangan',
    ];

    // Relasi ke Inventaris
    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class);
    }
}
