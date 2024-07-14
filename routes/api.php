<?php

use App\Http\Controllers\MainChurch\ChurchController;
use App\Http\Controllers\MainChurch\EventController;
use App\Http\Controllers\User\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('main-church')->group(function () {
    Route::post('add-church', [ChurchController::class, 'store']);
    Route::delete('delete-church/{id}', [ChurchController::class, 'destroy']);
    Route::post('add-event', [EventController::class, 'store']);
});

Route::prefix('parishioner')->group(function () {
    Route::post('add-reservation', [ReservationController::class, 'store']);
    Route::delete('delete-reservation/{id}', [ReservationController::class, 'destroy']);
});
