<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SacramentalReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sacramental_events = SacramentalReservation::where('user_id', Auth::user()->id)
                ->where('status', 2)
                ->get();

        return view('User.user-certificates', ['sacramental_events'=>$sacramental_events]);
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
