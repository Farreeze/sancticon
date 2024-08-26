<?php

namespace App\Http\Controllers;

use App\Models\ChurchEvent;
use App\Models\NewsAndAnnouncement;
use App\Models\Priest;
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
        return view('guest-gallery');
    }

    public function ShowAboutUs()
    {
        return view('guest-about-us');
    }

    public function ShowContactUs()
    {
        return view('guest-contact-us');
    }
}
