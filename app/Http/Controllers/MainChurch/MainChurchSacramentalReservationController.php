<?php

namespace App\Http\Controllers\MainChurch;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainChurch\MchurchSacramentalReservationRequestRequest;
use App\Models\SacramentalReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainChurchSacramentalReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mainchurch_id = Auth::user()->id;

        $sr_requests = SacramentalReservation::where(function($query) use ($mainchurch_id){
            $query->where('church_id', $mainchurch_id)
            ->whereNull('status');
        })
        ->orWhere(function($query){
            $query->where('subchurch_approve', 1)
            ->whereNull('status');
        })
        ->get();

        return view('MainChurch.mainchurch-sacramental-reservations', ['sr_requests' => $sr_requests]);
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
    public function update(MchurchSacramentalReservationRequestRequest $request, string $id)
    {
        $sr_request = SacramentalReservation::find($id);

        $action = $request->input('action');

        if($action == "approve")
        {
            $sr_request->status = 1;
        }else if($action == "reject")
        {
            $sr_request->status = 0;
        }

        $sr_request->save();

        if($action == "approve")
        {
            return back()->with(['update_message' => 'Request Approve!']);
        }else if($action == "reject")
        {
            return back()->with(['update_message' => 'Request Rejected']);
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
