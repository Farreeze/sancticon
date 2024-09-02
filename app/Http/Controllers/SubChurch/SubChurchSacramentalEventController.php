<?php

namespace App\Http\Controllers\SubChurch;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AddReservationRequest;
use App\Models\LibSacrament;
use App\Models\SacramentalReservation;
use App\Models\User;
use Illuminate\Http\Request;

class SubChurchSacramentalEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sacramental_events = SacramentalReservation::where('status', 1)->get();
        return view('SubChurch.subchurch-sacramental-events', ['sacramental_events' => $sacramental_events]);
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

        return view('SubChurch.subchurch-sacramental-event-form', ['sacraments' => $sacraments, 'churches' => $churches]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddReservationRequest $request)
    {
        $reservation_data = $request->validated();

        $reservation_data['subchurch_approve'] = 1;

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
        $sacramental_event = SacramentalReservation::findOrFail($id);

        $sacramental_event->delete();

        return back()->with('sub-church-cancel-reservation', 'Reservation Cancelled');
    }
}
