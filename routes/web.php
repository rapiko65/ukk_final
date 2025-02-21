<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterController as ControllersRegisterController;
use App\Http\Controllers\ResepsionisController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[MainController::class, 'index'])->name('home');
Route::get('/rooms',[MainController::class, 'Rooms'])->name('rooms');


Route::get('/register', [ControllersRegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register-prs', [ControllersRegisterController::class, 'register'])->name('register.prs');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login-prs', [LoginController::class, 'login'])->name('login.prs');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('admin-dashboard',function () {
//     return view('admin-dashboard.index');
// });

Route::prefix('dashboard-admin')->name('admin.')->group(function () {
    //dashboard
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    //user
    Route::get('users', [AdminController::class, 'ShowUser'])->name('users');
    Route::get('edit-user/{id}', [AdminController::class, 'EditUser'])->name('edit-user');
    Route::put('update-user/{id}', [AdminController::class, 'UpdateUser'])->name('update-user');
    Route::delete('delete-user/{id}',[AdminController::class, 'destroyUSer'])->name('destroy-user');

    //room
    Route::get('rooms', [AdminController::class, 'ShowRoom'])->name('rooms');
    Route::get('create-room-type', [AdminController::class, 'RoomTypeCreate'])->name('create-room-type');
    Route::post('store-room-type', [AdminController::class, 'RoomTypeStore'])->name('store-room-type');
    Route::delete('delete-room-type/{id}', [AdminController::class, 'DestroyRoomType'])->name('delete-room-type');
    Route::get('create-room',[AdminController::class, 'RoomsCreate'])->name('create-room');
    Route::post('store-room',[AdminController::class, 'RoomStore'])->name('store-room');

    //facilities
    Route::get('facilities', [AdminController::class, 'ShowFacilities'])->name('facilities');
    Route::get('create-facility', [AdminController::class, 'CreateFacilities'])->name('create-facility');
    Route::post('store-facility', [AdminController::class, 'StoreFacilities'])->name('store-facility');
    Route::delete('delete-facility/{id}', [AdminController::class, 'DestroyFacilities'])->name('delete-facility');
});

Route::prefix('dashboard-resepsionis')->name('resepsionis.')->group(function () {
    Route::get('dashboard', [ResepsionisController::class, 'dashboard'])->name('dashboard');
});



