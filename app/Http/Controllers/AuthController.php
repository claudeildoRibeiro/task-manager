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

        // Check if the user exists in the database
        $user = DB::table('users')->where('email', $email)->first();
        if ($user && password_verify($password, $user->password)) {
            // Store user information in the session
            session(['user' => $user]);

            // Redirect to the home page with a success message
            return redirect()->route('home')->with('success', 'Login realizado com sucesso');
        } else {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Email ou senha incorretos');
        }
    }

    // load the register page
    public function register()
    {
        return view('partials.register');
    }

    // post register
    public function postRegister(Request $request)
    {
        $request->validate(
            [
                "email" => "required|email",
                "name" => "required|string|max:100",
                "password" => "required|min:3"
            ],
            [
                "email.required" => "O campo de email é obrigatório",
                "email.email" => "O campo de email deve ser um endereço de email válido",
                "name.required" => "O campo de nome é obrigatório",
                "name.string" => "O campo de nome deve ser uma string",
                "name.max" => "O campo de nome deve ter no máximo 100 caracteres",
                "password.required" => "O campo de senha é obrigatório",
                "password.min" => "O campo de senha deve ter pelo menos 3 caracteres"
            ]
        );

        $email = $request->input("email");
        $name = $request->input("name");
        $password = $request->input("password");

        // Insert the user into the database
        DB::table('users')->insert([
            'email' => $email,
            'name' => $name,
            'password' => bcrypt($password), // Encrypt the password
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // verify if the user was created successfully
        if (DB::table('users')->where('email', $email)->exists()) {
            return redirect()->route('login')->with('success', 'Usuário cadastrado com sucesso');
        } else {
            return redirect()->back()->with('error', 'Erro ao cadastrar usuário');
        }

        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'Usuário cadastrado com sucesso');
    }

}
