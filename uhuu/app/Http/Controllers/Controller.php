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
