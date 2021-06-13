<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use  App\Http\Controllers\BusController;
use  App\Http\Controllers\TripsController;
use  App\Http\Controllers\BookController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin', function () {
    return view('admin/admin');
})->middleware(['isadmin']);

Route::get('user', function () {
    return view('user/user');
})->middleware(['auth']);
Route::get('profile/{user}', function (User $user) {
    return view('user/edit', compact('user'));
})->middleware(['auth']);
Route::put('profile/{user}', function (User $user, Request $request) {
    $user->update($request->all());
    return redirect('user')->withStatus('Update Successfully!');
})->middleware(['auth']);

Route::resource('buses', BusController::class);
Route::get('view_trips', [App\Http\Controllers\TripsController::class,'show']);

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('view_users', [App\Http\Controllers\UsersController::class,'show']);

Route::get('/bus_load', [BookController::class, 'bus_load'])->name('bus_load');
Route::get('/bus_seat_laod', [BookController::class, 'bus_seat_laod'])->name('bus_seat_laod');
Route::get('/seat_load', [BookController::class, 'seat_load'])->name('seat_load');

Route::post('/tiket_booking_save', [BookController::class, 'tiket_booking_save'])->name('tiket_booking_save');

Auth::routes();
