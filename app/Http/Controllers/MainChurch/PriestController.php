<?php

namespace App\Http\Controllers\MainChurch;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainChurch\AddPriestRequest;
use App\Http\Requests\MainChurch\UpdatePriestRequest;
use App\Models\ActivityLog;
use App\Models\LibPriestTitle;
use App\Models\libSuffixName;
use App\Models\Priest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PriestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priests = Priest::all();
        return view('MainChurch.priests', ['priests'=>$priests]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $priest_titles = LibPriestTitle::all();
        $suffix_names = libSuffixName::all();
        $churches = User::where('sub_church', 1)
                ->orWhere('main_church', 1)
                ->get();

        return view('MainChurch.add-priest-form', ['suffix_names'=>$suffix_names, 'churches'=>$churches, 'priest_titles'=>$priest_titles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddPriestRequest $request)
    {
        try {
            $validated_req = $request->validated();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $path = 'priests_photo/';
                $file->move(public_path($path), $filename);

                // Store the relative path
                $validated_req['photo_id'] = $path . $filename;
            }

            Priest::create($validated_req);

            $priest_name = trim($validated_req['first_name'] . ' ' . ($validated_req['middle_name'] ?? '') . ' ' . $validated_req['last_name']);

            ActivityLog::create([
                'user_id' => Auth::id(),
                'desc' => "Added $priest_name as a priest.",
            ]);

            return back()->with('store-message', 'Priest Added Successfully');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $priest = Priest::find($id);

        return view('MainChurch.priest-profile', ['priest'=>$priest]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $priest = Priest::find($id);
        $priest_titles = LibPriestTitle::all();
        $suffix_names = libSuffixName::all();
        $churches = User::where('sub_church', 1)
                ->orWhere('main_church', 1)
                ->get();

        return view('MainChurch.edit-priest-form', ['priest'=>$priest, 'suffix_names'=>$suffix_names, 'churches'=>$churches, 'priest_titles'=>$priest_titles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePriestRequest $request, string $id)
    {
        try {
            $validated_req = $request->validated();
            $priest = Priest::findOrFail($id);

            $priest_name = trim($priest->first_name . ' ' . ($priest->middle_name ?? '') . ' ' . $priest->last_name);
            $priest->update($validated_req);

            ActivityLog::create([
                'user_id' => Auth::id(),
                'desc' => "Updated $priest_name's profile details.",
            ]);

            return back()->with('update-message', 'Priest Updated Successfully');
        } catch (\Exception $e) {
            Log::error('Update failed: ' . $e->getMessage());

            // Return a JSON response with the error message
            return response()->json([
                'error' => 'An error occurred while updating the priest profile.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $priest = Priest::findOrFail($id);

        $priest_name = trim($priest->first_name . ' ' . ($priest->middle_name ?? '') . ' ' . $priest->last_name);

        $priest->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'desc' => "Removed $priest_name as a priest.",
        ]);

        return redirect()->route('priests.show')->with('delete-message', 'Removed Successfully.');
    }
}
