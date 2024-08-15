<?php

namespace App\Http\Controllers\SubChurch;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubChurch\UpdateSacramentalReservationRequestRequest;
use App\Models\SacramentalReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubChurchSacramentalReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subchurch_id = Auth::user()->id;

        $sacramental_reservation_requests = SacramentalReservation::where('user_id', $subchurch_id)
                ->whereNull('subchurch_approve')
                ->get();

        $finished_sacramental_reservation_requests = SacramentalReservation::where('user_id', $subchurch_id)
                ->whereNotNull('subchurch_approve')
                ->orderBy('updated_at', 'desc')
                ->get();

        return view('SubChurch.subchurch-sacramental-reservation-requests', ['reservation_requests' => $sacramental_reservation_requests,
         'finished_reservation_requests' => $finished_sacramental_reservation_requests]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function update(UpdateSacramentalReservationRequestRequest $request, string $id)
    {
        $sr_request = SacramentalReservation::find($id);

        $action = $request->input('action');

        if($action == "approve")
        {
            $sr_request->subchurch_approve = 1;
        }else if($action == "reject")
        {
            $sr_request->subchurch_approve = 0;
        }

        $sr_request->save();

        if($action == "approve")
        {
            return back()->with(['update_message'=>'Request Approved!']);
        }else if($action == "reject")
        {
            return back()->with(['update_message'=>'Request Rejected']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
