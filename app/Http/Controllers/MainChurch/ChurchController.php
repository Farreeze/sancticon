<?php

namespace App\Http\Controllers\MainChurch;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainChurch\AddChurchRequest;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChurchController extends Controller
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
        return view('MainChurch.add-church-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddChurchRequest $request)
    {
        $church_data = $request->validated();
        User::create($church_data);

        $church_name = $church_data['church_name'];

        ActivityLog::create([
            'user_id' => Auth::id(),
            'desc' => "Added $church_name as a church",
        ]);

        return back()->with('message', 'Church added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $church = User::findOrFail($id);

        return view('MainChurch.church-profile', ['church' => $church]);
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
        $church = User::findOrFail($id);

        $church_name = $church->church_name;

        $church->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'desc' => "Deleted $church_name as a church.",
        ]);

        return response()->json(['message' => 'church deleted']);
    }
}
