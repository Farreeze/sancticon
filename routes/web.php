<?php

use App\Http\Controllers\MainChurch\ChurchController;
use App\Http\Controllers\MainChurch\EventController;
use App\Http\Controllers\MainChurch\MainChurchSacramentalReservationController;
use App\Http\Controllers\MainChurch\NewsAndAnnouncementController;
use App\Http\Controllers\MainChurch\PriestController;
use App\Http\Controllers\MainChurch\SacramentalEventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubChurch\SubChurchEventController;
use App\Http\Controllers\SubChurch\SubChurchNewsAndAnnouncementController;
use App\Http\Controllers\SubChurch\SubChurchPriestController;
use App\Http\Controllers\SubChurch\SubChurchSacramentalEventController;
use App\Http\Controllers\SubChurch\SubChurchSacramentalReservationController;
use App\Http\Controllers\User\ReservationController;
use App\Http\Controllers\User\UserCertificateController;
use App\Http\Controllers\User\UserEventController;
use App\Http\Controllers\User\UserNewsAndAnnouncementsController;
use App\Http\Controllers\User\UserPriestController;
use App\Models\Priest;
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

    if($user->sub_church)
    {
        $sacramental_reservations = SacramentalReservation::where('user_id', $user->id)
                ->whereNull('status')
                ->where('subchurch_approve', 1)
                ->get();

        return view('dashboard', ['sacramental_reservations' => $sacramental_reservations]);
    }

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

        //priests
        Route::get('/priests', [PriestController::class, 'index'])->name('priests.show');
        Route::get('/add-priest-form', [PriestController::class, 'create'])->name('add-priest-form.show');
        Route::post('/add-priest-submit', [PriestController::class, 'store'])->name('add-priest.submit');
        Route::get('/priest/{id}', [PriestController::class, 'show'])->name('priest-profile.show');
        Route::get('/priest-edit/{id}', [PriestController::class, 'edit'])->name('edit-priest.show');
        Route::patch('/priest-update/{id}', [PriestController::class, 'update'])->name('priest.update');
        Route::delete('/priest-delete/{id}', [PriestController::class, 'destroy'])->name('priest.delete');

        //events
        Route::get('/events', [EventController::class, 'index'])->name('church-events.show');
        Route::get('/add-event-form', [EventController::class, 'create'])->name('add-event-form.show');
        Route::post('/add-event', [EventController::class, 'store'])->name('add-event');
        Route::patch('/event-finished/{id}', [EventController::class, 'finishEvent'])->name('finish-event');
        Route::delete('/delete-event/{id}', [EventController::class, 'destroy'])->name('delete-event');

        //new and announcements
        Route::get('/news-and-announcements', [NewsAndAnnouncementController::class, 'index'])->name('news-and-announcements.show');
        Route::get('/news-and-announcements-form', [NewsAndAnnouncementController::class, 'create'])->name('news-and-announcements-form.show');
        Route::post('/add-news-and-announcements', [NewsAndAnnouncementController::class, 'store'])->name('news-and-announcements-form.add');
        Route::delete('/delete-news-and-announcements/{id}', [NewsAndAnnouncementController::class, 'destroy'])->name('news-and-announcements-form.delete');

        //sacramental reservation requests
        Route::get('main-church/sacramental-reservation-requests', [MainChurchSacramentalReservationController::class, 'index'])->name('mainchurch-sr-requests.show');
        Route::patch('/main-church/sacramental-reservation-request/action/{id}', [MainChurchSacramentalReservationController::class, 'update'])->name('sr_request.action');

        //sacramental  events
        Route::get('/sacramental-events', [SacramentalEventController::class, 'index'])->name('sacramental-events.show');
        Route::get('/sacramental-events-form', [SacramentalEventController::class, 'create'])->name('sacramental-events-form.show');
        Route::post('/sacramental-events-add', [SacramentalEventController::class, 'store'])->name('sacramental-events-form.submit');
    });

    Route::middleware(['sub-church'])->group(function(){
        Route::get('/sub-church/sacramental-reservations', [SubChurchSacramentalReservationController::class, 'index'])->name('subchurch-sacramental-reservation.show');
        Route::patch('/sub-church/action/{id}', [SubChurchSacramentalReservationController::class, 'update'])->name('subchurch-sr-request.action');
        Route::get('/sub-church/events', [SubChurchEventController::class, 'index'])->name('subchurch-events.show');

        //custom request
        Route::delete('/sub-church/cancel/{id}', [SubChurchSacramentalEventController::class, 'destroy'])->name('sub-church-sacramental-reservation.delete');

        //priests
        Route::get('/sub-church/priests', [SubChurchPriestController::class, 'index'])->name('subchurch-priests.show');

        //news and announcements
        Route::get('/sub-church/news-and-announcements', [SubChurchNewsAndAnnouncementController::class, 'index'])->name('subchurch-news-and-announcements.show');

        //sacramental events
        Route::get('/sub-church-sacramental-events', [SubChurchSacramentalEventController::class, 'index'])->name('sub-church-sacramental-events.show');
        Route::get('/sub-church-sacramental-event-form', [SubChurchSacramentalEventController::class, 'create'])->name('sub-church-sacramental-event-form.show');
        Route::post('/sub-church-sacramental-event-submit', [SubChurchSacramentalEventController::class, 'store'])->name('sub-church-sacramental-event-form.submit');
    });

    Route::middleware(['user'])->group(function(){
        Route::get('/sacramental-reservation-form', [ReservationController::class, 'create'])->name('sacramental-reservation-form.show');
        Route::post('/add-reservation', [ReservationController::class, 'store'])->name('add-sacramental-reservation');
        Route::delete('/delete-reservation/{id}', [ReservationController::class, 'destroy'])->name('cancel-reservation');

        Route::get('/user/events', [UserEventController::class, 'index'])->name('user-events.show');

        //priests
        Route::get('/user/priests', [UserPriestController::class, 'index'])->name('user-priests.show');

        //news and announcements
        Route::get('/user/news-and-announcements', [UserNewsAndAnnouncementsController::class, 'index'])->name('user-news-and-announcements.show');

        //certificates
        Route::get('/user/certificates', [UserCertificateController::class, 'index'])->name('user-certificate.show');

        //PDF GENERATION
        Route::get('/generate/certificate/{id}', [UserCertificateController::class, 'GenerateCertificate'])->name('certificate.generate');
    });

});

require __DIR__.'/auth.php';

//TEMPORARY ROUTES

Route::get('/csrf-token', function () {
    return csrf_token();
});
