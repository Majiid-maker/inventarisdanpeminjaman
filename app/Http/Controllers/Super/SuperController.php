<?php

namespace App\Http\Controllers\Super;
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

class SuperController extends Controller
{
    public function index() 
    {
        $totaluser = User::count();
        $totalroom = Room::count();
        $totalbook = RoomBooking::count();
        $notif = RoomBooking::where('status','diproses')->count();
        $totalinventaris = Inventaris::count(); 
        $user = Auth::user(); 
        $bookings = RoomBooking::with('room','user')
            ->orderByDesc('id')
            ->paginate(10, ['*'], 'bookings_page')
            ->appends(request()->except('bookings_page'));
        $users = User::paginate(5, ['*'], 'users_page')
        ->appends(request()->except('users_page'));
        
        $inventaris = Inventaris::paginate(5, ['*'], 'inventaris_page')
        ->appends(request()->except('inventaris_page'));

        return view('content.super.dashboard', compact('user','inventaris','users','notif','bookings','totaluser','totalroom','totalbook','totalinventaris')); 
    }

    public function user() 
    { 
        $notif = RoomBooking::where('status','diproses')->count(); 
        $user = Auth::user();  
        $users = User::paginate(10, ['*'], 'users_page')
        ->appends(request()->except('users_page')); 

        return view('content.super.user', compact('user','users','notif')); 
    }
    public function rooms() 
    { 
        $notif = RoomBooking::where('status','diproses')->count(); 
        $user = Auth::user();  
        $rooms = Room::paginate(10, ['*'], 'Rooms_page')
        ->appends(request()->except('Rooms_page')); 

        return view('content.super.room', compact('user','rooms','notif')); 
    }

    public function roombookings() 
{ 
    $notif = RoomBooking::where('status','diproses')->count();
    $user = Auth::user(); 
    
    // Query dengan filter status
    $status = request('status');
    $bookings = RoomBooking::with('room','user')
        ->when($status, function($query, $status) {
            return $query->where('status', $status);
        })
        ->orderBy('tanggal', 'desc')
        ->paginate(10, ['*'], 'bookings_page')
        ->appends(request()->except('bookings_page')); 

    return view('content.super.roombookings', compact('user','notif','bookings')); 
}


    public function inventaris() 
    { 
        $notif = RoomBooking::where('status','diproses')->count();
        $user = Auth::user(); 
        $inventaris = Inventaris::paginate(10, ['*'], 'inventaris_page')
        ->appends(request()->except('inventaris_page'));

        return view('content.super.inventaris', compact('user','inventaris','notif')); 
    }
    
    public function inventarislog() 
    { 
        $notif = RoomBooking::where('status','diproses')->count();
        $user = Auth::user(); 
        $bookings = Inventarislog::with('inventaris')
            ->orderByDesc('id')
            ->paginate(10, ['*'], 'logs_page')
            ->appends(request()->except('logs_page')); 

        return view('content.super.inventarislog', compact('user','notif','bookings')); 
    }
}
