<?php

namespace App\Http\Controllers\MainChurch;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainChurch\MchurchSacramentalReservationRequestRequest;
use App\Http\Requests\MainChurch\SrSearchRequest;
use App\Models\ActivityLog;
use App\Models\SacramentalReservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainChurchSacramentalReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mainchurch_users = User::where('main_church', 1)->pluck('id');

        $sr_requests = SacramentalReservation::where(function($query) use ($mainchurch_users){
            $query->whereIn('church_id', $mainchurch_users)
            ->whereNull('status');
        })
        ->orWhere(function($query){
            $query->where('subchurch_approve', 1)
            ->whereNull('status');
        })
        ->get();

        $approved_sr_requests = SacramentalReservation::where('status', 1)
                ->orderBy('updated_at', 'desc')
                ->get();

        $completed_sr_requests = SacramentalReservation::where('status', 2)
                ->orWhere('status', 3)
                ->orderBy('updated_at', 'desc')
                ->get();

        return view('MainChurch.mainchurch-sacramental-reservations', ['sr_requests' => $sr_requests,
    'approved_sr_requests' => $approved_sr_requests, 'completed_sr_requests' => $completed_sr_requests]);
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
    public function update(MchurchSacramentalReservationRequestRequest $request, string $id)
    {
        $sr_request = SacramentalReservation::find($id);

        if ($sr_request->custom_name){
            $requester = $sr_request->custom_name;
        }else{
            $requester = trim($sr_request->user->first_name . ' ' . ($sr_request->user->middle_name ?? '') . ' ' . $sr_request->user->last_name);
        }

        $action = $request->input('action');
        $feedback = $request->input('feedback');
        $priest_name = $request->input('priest_name');

        if($action == "approve")
        {
            $sr_request->status = 1;

            ActivityLog::create([
                'user_id' => Auth::id(),
                'desc' => "Approved $requester's sacramental reservation.",
            ]);

        }else if($action == "reject")
        {
            $sr_request->status = 0;
            $sr_request->feedback = $feedback;

            ActivityLog::create([
                'user_id' => Auth::id(),
                'remarks' => $feedback,
                'desc' => "Rejected $requester's sacramental reservation.",
            ]);

        }else if($action == "finish")
        {
            $sr_request->status = 2;
            $sr_request->priest_name = $priest_name;

            ActivityLog::create([
                'user_id' => Auth::id(),
                'desc' => "Finished $requester's sacramental reservation.",
            ]);

        }else if($action == "cancel")
        {
            $sr_request->status = 3;
            $sr_request->feedback = $feedback;

            ActivityLog::create([
                'user_id' => Auth::id(),
                'remarks' => $feedback,
                'desc' => "Cancelled $requester's sacramental reservation.",
            ]);

        }

        $sr_request->save();

        if($action == "approve")
        {
            return back()->with(['update_message' => 'Request Approve!']);
        }else if($action == "reject")
        {
            return back()->with(['update_message' => 'Request Rejected']);
        }else if($action == "finish")
        {
            return back()->with(['update_message' => 'Event Finished!']);
        }else if($action == "cancel")
        {
            return back()->with(['update_message' => 'Event Cancelled']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showSrRecords()
    {

        $completed_sr_requests = SacramentalReservation::where('status', 2)
                ->orWhere('status', 3)
                ->orderBy('updated_at', 'desc')
                ->get();

        return view('MainChurch.sacramental-events-record', ['sr_requests'=>$completed_sr_requests]);

    }

    public function search(SrSearchRequest $request)
    {

        $validReq = $request->validated();

        $searchInput = $validReq['text'];

        $completed_sr_requests = SacramentalReservation::whereIn('status', [2, 3])
        ->whereHas('user', function ($query) use ($searchInput) {
            $query->where('first_name', 'like', "%{$searchInput}%")
                ->orWhere('middle_name', 'like', "%{$searchInput}%")
                ->orWhere('last_name', 'like', "%{$searchInput}%");
        })
        ->orderBy('updated_at', 'desc')
        ->get();

        return view('MainChurch.sacramental-events-record', ['sr_requests' => $completed_sr_requests]);
    }
}
