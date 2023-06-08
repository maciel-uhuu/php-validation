<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function list()
    {
        $clients = Client::orderBy(column: 'name')->paginate(2);
        return view('/list', ['clients' => $clients]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:35',
            'email' => 'required|email|unique:clients',
            'password' => 'required|min:6|max:20'
        ], [
            'name.min' => ' O Nome deve ter entre 5 e 35 caracteres.',
            'name.max' => ' O Nome deve ter entre 5 e 35 caracteres.',
            'email.unique' => ' E-mail já cadastrado no sistema',
            'email.email' => ' E-mail deve ser escrito corretamente',
            'password.min' => ' A senha deve ter entre 6 e 20 caracteres.',
            'password.max' => ' A senha deve ter entre 6 e 20 caracteres.'
        ]);

        Client::create($request->all());
        return redirect()->route('list');

    }

    public function edit($id)
    {
        $client = Client::where('id', $id)->first();
        if (!empty($client)) {
            return view('edit', ['client' => $client]);
        } else return redirect()->route('list');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'password' => $request->password,
        ];
        Client::where('id', $id)->update($data);
        return redirect()->route('list');
    }

    public function destroy($id)
    {
        Client::where('id', $id)->delete();
        return redirect()->back();
    }
}
