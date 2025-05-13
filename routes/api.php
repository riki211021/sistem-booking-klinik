<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController; 
use App\Http\Controllers\BookingController;

Route::middleware('api')->group(function () {
    // Routes Dokter
    Route::get('/dokter', [DokterController::class, 'index']);
    Route::get('/dokter/{id}', [DokterController::class, 'show']);
    Route::post('/dokter', [DokterController::class, 'store']);
    Route::put('/dokter/{id}', [DokterController::class, 'update']);
    Route::delete('/dokter/{id}', [DokterController::class, 'destroy']);

    // Routes Pasien
    Route::get('/pasien', [PasienController::class, 'index']);
    Route::get('/pasien/{id}', [PasienController::class, 'show']);
    Route::post('/pasien', [PasienController::class, 'store']);
    Route::put('/pasien/{id}', [PasienController::class, 'update']);
    Route::delete('/pasien/{id}', [PasienController::class, 'destroy']);

    // Routes Booking
    Route::get('/booking', [BookingController::class, 'index']);
    Route::get('/booking/{id}', [BookingController::class, 'show']);
    Route::post('/booking', [BookingController::class, 'store']);
    Route::put('/booking/{id}', [BookingController::class, 'update']);
    Route::delete('/booking/{id}', [BookingController::class, 'destroy']);
    Route::apiResource('booking', BookingController::class);

});


