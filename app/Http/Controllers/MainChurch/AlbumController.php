<?php

namespace App\Http\Controllers\MainChurch;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainChurch\AddAlbumRequest;
use App\Models\ChurchAlbum;
use App\Models\Gallery;
use Illuminate\Http\Request;

class AlbumController extends Controller
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
        return view('MainChurch.add-album-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddAlbumRequest $request)
    {
        $valid_req = $request->validated();

        ChurchAlbum::create($valid_req);

        return back()->with('message', 'Album Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $album = ChurchAlbum::findOrFail($id);

        $photos = Gallery::where('album_id', $album->id)
                ->orderBy('created_at', 'desc')->get();

        return view('MainChurch.mainchurch-album', ['album'=>$album, 'photos'=>$photos]);
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
        $album = ChurchAlbum::findOrFail($id);

        $album->delete();

        return redirect()->route('mainchurch-gallery.show')->with('delete-message', 'Album Deleted Successfully');
    }

    public function confirmDelete($id)
    {
        $album = ChurchAlbum::findOrFail($id);

        return view('MainChurch.confirm-deletion-album', ['album'=>$album]);
    }
}
