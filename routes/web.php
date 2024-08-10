<?php

use App\Http\Controllers\MainChurch\ChurchController;
use App\Http\Controllers\MainChurch\EventController;
use App\Http\Controllers\MainChurch\MainChurchSacramentalReservationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubChurch\SubChurchEventController;
use App\Http\Controllers\SubChurch\SubChurchSacramentalReservationController;
use App\Http\Controllers\User\ReservationController;
use App\Http\Controllers\User\UserEventController;
use App\Models\SacramentalReservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if($user->main_church)
    {
        $churches = User::where('sub_church', 1)->get();
        return view('dashboard', ['churches' => $churches]);
    }

    // if($user->main_church)
    // {
    //     $churches = User::where('sub_church', 1)->get();
    //     return view('dashboard', ['churches' => $churches]);
    // }

    if($user->user)
    {
        $sacramental_reservations = SacramentalReservation::where('user_id', $user->id)
                ->orderBy('updated_at', 'desc')
                ->get();
        return view('dashboard', ['sacramental_reservations' => $sacramental_reservations]);
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
        Route::patch('/event-finished/{id}', [EventController::class, 'finishEvent'])->name('finish-event');
        Route::delete('/delete-event/{id}', [EventController::class, 'destroy'])->name('delete-event');
        //sacramental reservation requests
        Route::get('main-church/sacramental-reservation-requests', [MainChurchSacramentalReservationController::class, 'index'])->name('mainchurch-sr-requests.show');
        Route::patch('/main-church/sacramental-reservation-request/action/{id}', [MainChurchSacramentalReservationController::class, 'update'])->name('sr_request.action');
    });

    Route::middleware(['sub-church'])->group(function(){
        Route::get('/sub-church/sacramental-reservations', [SubChurchSacramentalReservationController::class, 'index'])->name('subchurch-sacramental-reservation.show');
        Route::patch('/sub-church/action/{id}', [SubChurchSacramentalReservationController::class, 'update'])->name('subchurch-sr-request.action');
        Route::get('/sub-church/events', [SubChurchEventController::class, 'index'])->name('subchurch-events.show');
    });

    Route::middleware(['user'])->group(function(){
        Route::get('/sacramental-reservation-form', [ReservationController::class, 'create'])->name('sacramental-reservation-form.show');
        Route::post('/add-reservation', [ReservationController::class, 'store'])->name('add-sacramental-reservation');
        Route::delete('/delete-reservation/{id}', [ReservationController::class, 'destroy'])->name('cancel-reservation');

        Route::get('/user/events', [UserEventController::class, 'index'])->name('user-events.show');
    });

});

require __DIR__.'/auth.php';

//TEMPORARY ROUTES

Route::get('/csrf-token', function () {
    return csrf_token();
});
