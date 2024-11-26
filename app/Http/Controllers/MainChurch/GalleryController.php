<?php

namespace App\Http\Controllers\MainChurch;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainChurch\AddGalleryRequest;
use App\Models\ActivityLog;
use App\Models\ChurchAlbum;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = ChurchAlbum::with(['photos' => function ($query) {
            $query->orderBy('created_at', 'asc'); // Get photos ordered by creation date
        }])->orderBy('created_at', 'desc')->get();

        return view('MainChurch.mainchurch-gallery', ['albums' => $albums]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $album = $id;
        return view('MainChurch.add-gallery-form', ['album_id'=>$album]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddGalleryRequest $request)
    {
        try {
            $validated_req = $request->validated();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $path = 'gallery_photo/';
                $file->move(public_path($path), $filename);

                // Store the relative path
                $validated_req['photo_id'] = $path . $filename;
            }

            Gallery::create($validated_req);

            ActivityLog::create([
                'user_id' => Auth::id(),
                'desc' => "Uploaded an image to the gallery.",
            ]);

            return back()->with('store-message', 'Photo Added Successfully');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
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
        $photo = Gallery::findOrFail($id);

        $photo->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'desc' => "Deleted an image from the gallery.",
        ]);

        return back()->with('delete-message', 'Deleted Successfully');
    }
}
