<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\StoreRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function store(StoreRequest $request)
    {
        $customer = Customer::where('email', $request->email)->first();
        if($customer){
            return redirect()->back()->withErrors([
                'email' => 'Esse e-mail já está em uso'
            ]);
        }

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->withSuccess('Sucesso');
    }
}
