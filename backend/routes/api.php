<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Hotel\HotelController;
use App\Http\Controllers\Api\V1\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum', 'json'])->group(function () {
    Route::get('/user', UserController::class)->name('user');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::get('/hotels', HotelController::class)->name('hotels');

Route::post('/login', [AuthController::class, 'login'])->name('login');
