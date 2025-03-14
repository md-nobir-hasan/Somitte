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
        $n['members'] = ['nobir', 'sakib', 'sami', 'sajjad', 'sakib', 'sami', 'sajjad', 'sakib', 'sami', 'sajjad'];
        return view('frontend.pages.association_members', $n);
    }
}
