<?php

namespace App\Http\Controllers\User;
use App\Models\Room;
use App\Models\User;
use App\Models\RoomBooking;
use App\Models\Inventaris;
use App\Models\InventarisLog;
use Illuminate\View\view;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('content.user.dashboard', compact('rooms'));
    }

    public function profile()
    {
        $users = User::all();
        return view('content.user.profile', compact('users'));
    }

    // Halaman detail ruangan
    public function show(Request $request, $id)
    {
        $room = Room::with('inventaris')->findOrFail($id);

        $bulanSekarang = $request->get('bulan') ?? now()->format('m');

        $jadwal = RoomBooking::whereMonth('tanggal', $bulanSekarang)
            ->where('room_id', $room->id)
            ->orderBy('tanggal')
            ->get();

        $inventaris = Inventaris::where('room_id', $room->id)->get();

        $maretLogs = InventarisLog::whereMonth('waktu', 3)->whereYear('waktu', 2025)->get()->keyBy('inventaris_id');
        $agustusLogs = InventarisLog::whereMonth('waktu', 8)->whereYear('waktu', 2025)->get()->keyBy('inventaris_id');

        return view('content.user.show', compact(
            'room',
            'jadwal',
            'inventaris',
            'maretLogs',
            'agustusLogs',
            'bulanSekarang'
        ));
    }

    public function form(Request $request, $id)
    {
        $room = Room::with('inventaris')->findOrFail($id);
        return view('content.user.form', compact(
            'room'
        ));
    }
}
