<?php

namespace App\Http\Controllers\MainChurch;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\SacramentalReservation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainChurchCertificateController extends Controller
{

    public function GenerateCertificate($id)
    {
        $data = SacramentalReservation::findOrFail($id);

        $requester = $data->custom_name;

        ActivityLog::create([
            'user_id' => Auth::id(),
            'desc' => "Downloaded $requester's certificate.",
        ]);

        if($data->sacrament->desc == "BAPTISM")
        {
            $pdf = Pdf::loadView('PdfFormat.baptism_certificate', ['data' => $data]);

            return $pdf->download('baptism_certificate.pdf');
        }else if($data->sacrament->desc == "MATRIMONY")
        {
            $pdf = Pdf::loadView('PdfFormat.matrimony_certificate', ['data' => $data]);

            return $pdf->download('matrimony_certificate.pdf');
        }else
        {
            $pdf = Pdf::loadView('PdfFormat.custom_certificate', ['data' => $data]);

            return $pdf->download('certificate.pdf');
        }

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = SacramentalReservation::where('user_id', Auth::user()->id)
                ->where('status', 2)
                ->orderBy('updated_at', 'desc')
                ->get();

        return view('MainChurch.mainchurch-certificates', ['events'=>$events]);
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
