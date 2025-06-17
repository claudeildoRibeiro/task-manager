<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('partials.main');
    }

    // load the login page
    public function login()
    {
        return view('partials.login');

    }

    // load the register page
    public function register()
    {
        return view('partials.register');
    }
}
