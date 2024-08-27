<?php

namespace App\Http\Controllers\MainChurch;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainChurch\AddGalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Gallery::orderBy('created_at', 'desc')->get();
        return view('MainChurch.mainchurch-gallery', ['photos'=>$photos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('MainChurch.add-gallery-form');
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

        return back()->with('delete-message', 'Deleted Successfully');
    }
}
