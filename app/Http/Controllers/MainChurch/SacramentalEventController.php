<?php

namespace App\Http\Controllers\MainChurch;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AddReservationRequest;
use App\Models\ActivityLog;
use App\Models\LibSacrament;
use App\Models\SacramentalReservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SacramentalEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sacramental_events = SacramentalReservation::where('status', 1)->get();
        return view('MainChurch.sacramental-events', ['sacramental_events' => $sacramental_events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sacraments = LibSacrament::all();

        $churches = User::where('main_church', 1)
                ->orWhere('sub_church', 1)
                ->get();

        return view('MainChurch.sacramental-event-form', ['sacraments' => $sacraments, 'churches' => $churches]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddReservationRequest $request)
    {
        $reservation_data = $request->validated();

        $reservation_data['status'] = 1;

        $requester = $reservation_data['custom_name'];

        ActivityLog::create([
            'user_id' => Auth::id(),
            'desc' => "Added a sacramental reservation for $requester.",
        ]);

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
        //
    }
}
