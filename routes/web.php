<?php
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Super\SuperController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Request\UserAuthVerifyRequest;

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
    Route::get('/profile',[UserController::class, 'index'])->name('profile');   
    Route::get('/rooms/forms/{id}', [UserController::class, 'form'])->name('rooms.form'); 
});
