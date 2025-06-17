<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // load the login page
    public function login()
    {
        return view('partials.login');

    }

    // post login
    public function postLogin(Request $request){

        $request->validate(
            [
                "email" => "required|email",
                "password" => "required|min:3"
            ],
            [
                "email.required" => "O campo de email é obrigatório",
                "email.email" => "O campo de email deve ser um endereço de email válido",
                "password.required" => "O campo de senha é obrigatório",
                "password.min" => "O campo de senha deve ter pelo menos 3 caracteres"
            ]
        );
        
        $email = $request->input("email");
        $password = $request->input("password");

        dd($email, $password);

    }

    // load the register page
    public function register()
    {
        return view('partials.register');
    }

    // post register

}
