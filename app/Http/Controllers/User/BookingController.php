<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function booking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|string|max:255',
            'room_id' => 'required|string|max:255',
            'tanggal' => 'required|date|min:8|confirmed',
            'waktu_mulai' => 'required|time|max:50',
            'waktu_selesai' => 'required|time|max:100', 
            'kepentingan' => 'required|string|max:100', 
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'tanggal' => $request->tanggal,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'kepentingan' => $request->kepentingan, 
        ]);

        return redirect()->route('profile')->with('success', 'Booking berhasil! Silakan menunggu persetujuan.');
    }
}
