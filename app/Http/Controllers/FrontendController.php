<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homePage()
    {
        return view('frontend.pages.home');
    }

    public function associationMembers()
    {
        return view('frontend.pages.association_members');
    }
}
