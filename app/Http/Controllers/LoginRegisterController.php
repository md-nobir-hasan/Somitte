<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginRegisterController extends Controller
{
    public function loginPage()
    {
        return view('frontend.pages.auths.login');
    }

    public function registerPage()
    {
        return view('frontend.pages.auths.register');
    }
}
