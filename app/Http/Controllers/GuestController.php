<?php

namespace App\Http\Controllers;

use App\Models\ChurchEvent;
use App\Models\Gallery;
use App\Models\NewsAndAnnouncement;
use App\Models\Priest;
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
        $events = ChurchEvent::all();
        return view('guest-events', ['events'=>$events]);
    }

    public function ShowNewsAndAnnouncements()
    {
        $newsAndAnnouncements = NewsAndAnnouncement::all();
        return view('guest-news-and-announcements', ['newsAndAnnouncements'=>$newsAndAnnouncements]);
    }

    public function ShowGallery()
    {
        $photos = Gallery::orderBy('created_at', 'desc')->get();
        return view('guest-gallery', ['photos'=>$photos]);
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
}
