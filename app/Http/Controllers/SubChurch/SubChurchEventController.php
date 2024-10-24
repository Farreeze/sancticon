<?php

namespace App\Http\Controllers\SubChurch;

use App\Http\Controllers\Controller;
use App\Models\ChurchEvent;
use Illuminate\Http\Request;

class SubChurchEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = ChurchEvent::where('status', 1)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('SubChurch.subchurch-events', ['events' => $events]);
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
