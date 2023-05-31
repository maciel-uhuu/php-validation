<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function create(Request $request)
    {
        return view('signin');
    }

    public function store(SignInRequest $request)
    {
        $user = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        if (!$user) {
            return back()->withErrors(["error_message" => "Usuário não existe."]);
        }

        return redirect("/");
    }

    public function destroy()
    {
        Session::flush();

        Auth::logout();
        // return redirect("/signin");
    }
}
