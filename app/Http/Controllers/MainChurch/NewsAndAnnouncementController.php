<?php

namespace App\Http\Controllers\MainChurch;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainChurch\AddNewsAndAnnouncementRequest;
use App\Models\NewsAndAnnouncement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsAndAnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsAndAnnouncements = NewsAndAnnouncement::all();
        return view('MainChurch.news-and-announcements', ['newsAndAnnouncements' => $newsAndAnnouncements]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('MainChurch.news-and-announcements-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNewsAndAnnouncementRequest $request)
    {

        try{

            $request_data = $request->validated();
            NewsAndAnnouncement::create($request_data);
            return back()->with('message', 'Event added successfully!');

        }catch (\Exception $e) {
            Log::error('Error storing news and announcement: ' . $e->getMessage());
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = NewsAndAnnouncement::find($id);
        $row->delete();
        return back()->with('message', 'Successfully Deleted');
    }
}