<?php

namespace App\Http\Controllers\MainChurch;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainChurch\AddEventRequest;
use App\Http\Requests\MainChurch\UpdateEventRequest;
use App\Models\ActivityLog;
use App\Models\ChurchEvent;
use App\Models\LibChurch;
use App\Models\LibSacrament;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $locations = LibChurch::all();
        $sacraments = LibSacrament::all();
        return view('MainChurch.add-event-form', ['sacraments' => $sacraments, 'locations'=>$locations]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddEventRequest $request)
    {
        try {
            $event_data = $request->validated();
            ChurchEvent::create($event_data);

            ActivityLog::create([
                'user_id' => Auth::id(),
                'desc' => "Added $request->title event",
            ]);

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
        $event = ChurchEvent::where('id', $id)->first();
        $locations = LibChurch::all();
        $sacraments = LibSacrament::all();

        return view('MainChurch.edit-event-form', ['event'=>$event, 'sacraments'=>$sacraments, 'locations'=>$locations]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, string $id)
    {
        $validatedReq = $request->validated();

        $event = ChurchEvent::findOrFail($id);
        $event->update($validatedReq);

        return back()->with('update-message', 'Event Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = ChurchEvent::findOrFail($id);

        $event_title = $event->title;

        $event->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'desc' => "Cancelled $event_title event.",
        ]);

        return back()->with('delete', 'Event Deleted');
    }

    //custome functions

    public function finishEvent(String $id)
    {
        $event = ChurchEvent::findOrFail($id);

        $event->status = 0;

        $event->save();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'desc' => "Finished $event->title event.",
        ]);

        return back()->with('message', 'Event Finished');
    }
}
