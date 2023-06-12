<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\SubmitLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        return view('admin.auth.login');
    }

    public function submitLogin(SubmitLoginRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))){
            return redirect('customers');
        }else{
            return redirect()->back()->withErrors([
                'email' => 'Email ou senha inválidos',
                'password' => 'Email ou senha inválidos',
            ]);
        }
    }

    public function logout(Request $request)
    {
        auth()->guard('web')->logout();
        return redirect(route('login'));
    }
}
