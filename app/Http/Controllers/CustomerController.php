<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search', '');
        return view('customers.index', [
            'customers' => DB::table('customers')
                ->where('name', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%')
                ->paginate(1),
            'search' => $search
        ]);
    }

    public function create(Request $request)
    {
        return view('customers.create');
    }

    public function edit(Request $request)
    {
        $customer = Customer::find($request->customer);
        if(!$customer){
            return view('notfound');
        }

        return view('customers.edit', [
            'customer' => $customer
        ]);
    }

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

        return redirect()->back()->withSuccess('Sucesso ao criar o cliente');
    }

    public function update(UpdateRequest $request)
    {
        $customer = Customer::whereNot('id', $request->customer)->where('email', $request->email)->first();
        if($customer){
            return redirect()->back()->withErrors([
                'email' => 'Esse e-mail já está em uso'
            ]);
        }
        $customer = Customer::find($request->customer);
        if(!$customer){
            return view('notfound');
        }
        $customer->update([
            'active' => $request->get('active', '') == 'active',
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->withSuccess('Sucesso ao editar o cliente');
    }

    public function destroy(Request $request)
    {
        $customer = Customer::find($request->customer);
        if(!$customer){
            return view('notfound');
        }
        $customer->delete();
        return redirect('customers');
    }

}
