<?php

namespace App\Http\Controllers\MainChurch;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainChurch\AddAdminRequest;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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
        //
        return view('MainChurch.add-admin-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddAdminRequest $request)
    {
        $validated_req = $request->validated();

        DB::transaction(function () use ($validated_req) {

            $user = User::create($validated_req);

            $admin_name = trim($validated_req['first_name'] . ' ' . ($validated_req['middle_name'] ?? '') . ' ' . $validated_req['last_name']);

            ActivityLog::create([
                'user_id' => Auth::id(),
                'desc' => "Added $admin_name as an admin.",
            ]);
        });

        return back()->with('message', 'Admin added successfully!');
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
