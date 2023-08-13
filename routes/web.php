<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestHouseController;

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

Route::get('/',[GuestHouseController::class, 'index']);
Route::get('/room/{id}', [GuestHouseController::class, 'show']);

Route::get('/about', [HomeController::class, 'about']);
Route::get('/map', [HomeController::class, 'map']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);
Route::get('/reservations', [HomeController::class, 'reservations']);
Route::get('/payment', [HomeController::class, 'payment']);
Route::get('/wishlist', [HomeController::class, 'wishlist']);
Route::get('/guidelines', [HomeController::class, 'guidelines']);
Route::get('/rules', [HomeController::class, 'rules']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'store']);
