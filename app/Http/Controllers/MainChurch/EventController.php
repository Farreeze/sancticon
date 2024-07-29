<?php

namespace App\Http\Controllers\MainChurch;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainChurch\AddEventRequest;
use App\Models\ChurchEvent;
use App\Models\LibSacrament;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = ChurchEvent::where('status', 1)
        ->orderBy('created_at', 'desc')
        ->get();
        $finished_events = ChurchEvent::where('status', 0)
        ->orderBy('updated_at', 'desc')
        ->get();
        return view('MainChurch.events', ['events' => $events, 'finished_events' => $finished_events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sacraments = LibSacrament::all();
        return view('MainChurch.add-event-form', ['sacraments' => $sacraments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddEventRequest $request)
    {
        try {
            $event_data = $request->validated();
            ChurchEvent::create($event_data);
            return back()->with('message', 'Event added successfully!');
        }catch (\Exception $e) {
            return response()->json(['message' => 'something went wrong', 'error' => $e->getMessage()], 500);
        }
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

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = ChurchEvent::findOrFail($id);

        $event->delete();

        return back()->with('delete', 'Event Deleted');
    }

    //custome functions

    public function finishEvent(String $id)
    {
        $event = ChurchEvent::findOrFail($id);

        $event->status = 0;

        $event->save();

        return back()->with('message', 'Event Finished');
    }
}
