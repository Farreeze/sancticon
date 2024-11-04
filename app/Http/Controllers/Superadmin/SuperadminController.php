<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superadmin\RestoreUserRequest;
use App\Http\Requests\Superadmin\SAUpdateProfileRequest;
use App\Http\Requests\Superadmin\SearchRequest;
use App\Models\SuperadminActivityLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
        $user = User::where('id', $id)->first();

        return view('Superadmin.user-profile', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();

        return view('Superadmin.edit-user-profile', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SAUpdateProfileRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->validated());

        return redirect()->route('user-profile.show', $user->id);
    }

    public function confirmDelete(string $id)
    {
        $user = User::findOrFail($id);

        return view('Superadmin.confirm-deletion', ['user'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        SuperadminActivityLog::create([
            'user_id' => Auth::id(),
            'desc' => "Deleted",
            'name' => trim("{$user->first_name} {$user->middle_name} {$user->last_name} {$user->suffix}")
        ]);

        return redirect()->route('dashboard')->with(['superadmindelete'=>'Successfully deleted']);
    }

    public function search(SearchRequest $request)
    {
        // Validate the request data
        $validReq = $request->validated();

        // Get the search input from the request
        $searchInput = $validReq['text']; // Use array access instead of object access

        // Search for users where the input matches first_name, last_name, or email
        $users = User::where('user', 1)
            ->where(function($query) use ($searchInput) {
                $query->where('first_name', 'like', "%{$searchInput}%")
                      ->orWhere('last_name', 'like', "%{$searchInput}%")
                      ->orWhere('email', 'like', "%{$searchInput}%");
            })
            ->paginate(15);

        // Return the view with the paginated users
        return view('dashboard', ['users' => $users]);
    }

    public function viewActivityLog(){
        $activities = SuperadminActivityLog::orderBy('created_at', 'desc')->get();

        return view('Superadmin.superadmin-activity-log', ['activities'=>$activities]);
    }

    public function viewDeletedUsers(){
        $users = User::onlyTrashed()->paginate(20);;

        return view('Superadmin.deleted-users', ['users'=>$users]);
    }

    public function restoreUser($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        $user->restore();

        return back()->with(['message'=>'User has been restored']);
    }

}
