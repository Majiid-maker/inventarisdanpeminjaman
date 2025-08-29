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
            'status'        => 'diproses',
            'catatan'       => 'belum ada catatan',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Booking berhasil disimpan!',
            'data'    => $booking
        ]);
    }

    // List booking user
     
    public function index(Request $request)
{
    $query = RoomBooking::with('room')
        ->where('user_id', Auth::id());
    
    // Filter berdasarkan status jika ada
    if ($request->has('status') && $request->status != 'Semua' && $request->status != '') {
        $query->where('status', $request->status);
    }
    
    $bookings = $query->orderBy('tanggal', 'desc')
        ->paginate(9); 

    // Hitung jumlah booking per status
    $counts = RoomBooking::select('status', \DB::raw('count(*) as total'))
        ->where('user_id', Auth::id())
        ->groupBy('status')
        ->pluck('total', 'status')
        ->toArray();
        
    $total = RoomBooking::where('user_id', Auth::id())->count();

    return view('content.user.bookingsindex', compact('bookings', 'counts', 'total'));
}


// Detail booking
public function show($id)
{
    $booking = RoomBooking::with('room', 'user')->findOrFail($id);
 
    return view('content.user.bookingsshow', compact('booking'));
}


}
