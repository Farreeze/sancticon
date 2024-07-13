<?php

use App\Http\Controllers\MainChurch\ChurchController;
use App\Http\Controllers\MainChurch\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//TEMPORARY ROUTES

Route::get('/csrf-token', function () {
    return csrf_token();
});
//MainChurch Temporary Routes
Route::post('/add-church', [ChurchController::class, 'store'])->name('add-church');
Route::delete('/delete-church/{id}', [ChurchController::class, 'destroy'])->name('delete-church');
Route::post('/add-event', [EventController::class, 'store'])->name('add-event');

//user Temporary Routes
Route::post('/add-reservation', [ReservationController::class, 'store'])->name('add-sacramental-reservation');
