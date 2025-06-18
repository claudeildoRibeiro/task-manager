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

        // Check if the user is authenticated
        if (session()->has('user')) {
            // redirect to the tasks page if the user is authenticated
            return redirect()->route('tasks');
        }

        return view('main'); // Assuming you have a view named 'main'

    }


}
