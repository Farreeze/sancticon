<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AddReservationRequest;
use App\Models\LibSacrament;
use App\Models\SacramentalReservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sacraments = LibSacrament::all();

        $main_church_user = User::where('main_church', 1)->first();

        $churches = collect();

        if ($main_church_user) {
            $churches->push($main_church_user);
        }

        $sub_church_users = User::where('sub_church', 1)->get();

        $churches = $churches->merge($sub_church_users);

        return view('User.sacramental-reservation-form', ['sacraments' => $sacraments, 'churches' => $churches]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(AddReservationRequest $request)
    {
        $reservation_data = $request->validated();

        // Store files in the 'public' disk to ensure they are publicly accessible
        if ($request->hasFile('file_one')) {
            $reservation_data['file_one'] = $request->file('file_one')->store('reservations', 'public');
        }
        if ($request->hasFile('file_two')) {
            $reservation_data['file_two'] = $request->file('file_two')->store('reservations', 'public');
        }
        if ($request->hasFile('file_three')) {
            $reservation_data['file_three'] = $request->file('file_three')->store('reservations', 'public');
        }
        if ($request->hasFile('file_four')) {
            $reservation_data['file_four'] = $request->file('file_four')->store('reservations', 'public');
        }

        // Create the reservation record
        SacramentalReservation::create($reservation_data);

        return back()->with('add-reservation', 'Reservation Submitted');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = SacramentalReservation::findOrFail($id);

        $reservation->delete();

        return back()->with('delete-reservation', 'Reservation Cancelled');
    }
}
