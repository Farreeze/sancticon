<?php

namespace App\Http\Controllers;

use App\Models\ChurchAlbum;
use App\Models\ChurchEvent;
use App\Models\Gallery;
use App\Models\NewsAndAnnouncement;
use App\Models\Priest;
use App\Models\SacramentRequirement;
use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function ShowPriests()
    {
        $priests = Priest::all();
        return view('guest-priests', ['priests'=>$priests]);
    }

    public function ShowEvents()
    {
        $events = ChurchEvent::where('status', 1)->get();

        return view('guest-events', ['events'=>$events]);
    }

    public function ShowNewsAndAnnouncements()
    {
        $newsAndAnnouncements = NewsAndAnnouncement::all();
        return view('guest-news-and-announcements', ['newsAndAnnouncements'=>$newsAndAnnouncements]);
    }

    public function ShowGallery()
    {
        $albums = ChurchAlbum::with(['photos' => function ($query) {
            $query->orderBy('created_at', 'asc'); // Get photos ordered by creation date
        }])->orderBy('created_at', 'desc')->get();

        return view('guest-gallery', ['albums' => $albums]);
    }

    public function showAlbum(string $id)
    {
        $album = ChurchAlbum::findOrFail($id);

        $photos = Gallery::where('album_id', $album->id)
                ->orderBy('created_at', 'desc')->get();

        return view('guest-album', ['album'=>$album, 'photos'=>$photos]);
    }

    public function ShowSacraments()
    {
        return view('guest-sacraments');
    }

    public function ShowAboutUs()
    {
        return view('guest-about-us');
    }

    public function ShowContactUs()
    {
        $churches = User::where('sub_church', 1)
                ->orWhere('main_church', 1)
                ->get();

        return view('guest-contact-us', ['churches'=>$churches]);
    }

    function viewSacramentReq($id){
        $sacrament_req = SacramentRequirement::findOrFail($id);
        return view('guest-sacrament-req', ['sacrament_req'=>$sacrament_req]);
    }

}
