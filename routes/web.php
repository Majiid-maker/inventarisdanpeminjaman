<?php
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Super\SuperController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\Request\UserAuthVerifyRequest;
use App\Http\Controllers\RoomBookingController;


Route::get('/', [UserController::class, 'index'])->name('rooms.index');
Route::get('/rooms/{id}', [UserController::class, 'show'])->name('rooms.show');
Route::get('/login',[AuthController::class, 'index'])->name('login')->middleware('guest');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login',[AuthController::class, 'verify'])->name('auth.verify');
Route::group(['middleware'=>'auth:super'], function () {
    Route::get('/super/home',[SuperController::class, 'index'])->name('super.dashboard');
});
Route::group(['middleware'=>'auth:admin'], function () {
    Route::get('/admin/home',[DashboardController::class, 'index'])->name('admin.dashboard');
});
Route::group(['middleware'=>'auth:user'], function () {
    Route::get('/profile',[UserController::class, 'profile'])->name('profile');   
    Route::get('/history',[UserController::class, 'history'])->name('history');   
    Route::get('/rooms/forms/{id}', [UserController::class, 'form'])->name('rooms.form');
    Route::post('/booking', [RoomBookingController::class, 'store'])->name('booking');   
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::post('/user/change-password', [UserController::class, 'changePassword'])->name('changePassword');
    Route::get('/history', [RoomBookingController::class, 'index'])->name('history');
    Route::get('/history/{id}', [RoomBookingController::class, 'show'])->name('booking.show');
});
