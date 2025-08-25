<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomBooking;
use Illuminate\Support\Facades\Auth;

class RoomBookingController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'room_id'       => 'required|exists:rooms,id',
        'kepentingan'   => 'required|string',
        'tanggal'       => 'required|date',
        'waktu_mulai'   => 'required|date_format:H:i',
        'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
    ]);

    $booking = RoomBooking::create([
        'user_id'       => Auth::id(),
        'room_id'       => $request->room_id,
        'kepentingan'   => $request->kepentingan,
        'tanggal'       => $request->tanggal,
        'waktu_mulai'   => $request->waktu_mulai,
        'waktu_selesai' => $request->waktu_selesai,
        'status'        => 'pending',
        'catatan'       => 'pending',
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Booking berhasil disimpan!',
        'data'    => $booking
    ]);
}


}
