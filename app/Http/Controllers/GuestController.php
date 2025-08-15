<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.home'); // assuming you have a home view
    }

    public function about()
    {
        return view('guest.sections.about'); // assuming you have an about view
    }

    public function contact()
    {
        return view('guest.sections.contact'); // assuming you have a contact view
    }

    public function services()
    {
        return view('guest.sections.services'); // assuming you have a services view
    }

    public function packages()
    {
        return view('guest.sections.packages'); // assuming you have a packages view
    }

    public function faq()
    {
        return view('guest.sections.faq'); // assuming you have a FAQ view
    }

    public function terms()
    {
        return view('guest.sections.terms'); // assuming you have a terms view
    }

    public function privacy()
    {
        return view('guest.sections.privacy'); // assuming you have a privacy policy view
    }

}
