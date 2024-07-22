<?php

use App\Http\Controllers\MainChurch\ChurchController;
use App\Http\Controllers\MainChurch\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ReservationController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    if($user->main_church)
    {
        $churches = User::where('sub_church', 1)->get();
        return view('dashboard', ['churches' => $churches]);
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['main-church'])->group(function(){
        //churches
        Route::get('/add-church-form', [ChurchController::class, 'create'])->name('add-church-form.show');
        Route::post('/add-church', [ChurchController::class, 'store'])->name('add-church');
        Route::delete('/delete-church/{id}', [ChurchController::class, 'destroy'])->name('delete-church');
        Route::get('/church-profile/{id}', [ChurchController::class, 'show'])->name('church-profile.show');
        //events
        Route::get('/events', [EventController::class, 'index'])->name('church-events.show');
        Route::get('/add-event-form', [EventController::class, 'create'])->name('add-event-form.show');
        Route::post('/add-event', [EventController::class, 'store'])->name('add-event');
    });

    Route::middleware(['sub-church'])->group(function(){

    });

    Route::middleware(['user'])->group(function(){
        Route::post('/add-reservation', [ReservationController::class, 'store'])->name('add-sacramental-reservation');
        Route::delete('/delete-reservation/{id}', [ReservationController::class, 'destroy'])->name('cancel-reservation');
    });

});

require __DIR__.'/auth.php';

//TEMPORARY ROUTES

Route::get('/csrf-token', function () {
    return csrf_token();
});
