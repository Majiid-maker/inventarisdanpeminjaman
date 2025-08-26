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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('content.user.dashboard', compact('rooms'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('content.user.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'nim_npp' => 'nullable|string|max:50',
            'prodi' => 'nullable|string|max:100',
            'fakultas' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function changePassword(Request $request)
{
    $request->validate([
        'password' => 'required|string|min:8|confirmed'
    ]);

    $user = Auth::user();
    $user->password = Hash::make($request->password);
    $user->save();

    return response()->json(['success' => true]);
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
