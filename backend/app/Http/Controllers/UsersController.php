<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->query('limit', 20);

        $users = User::paginate($limit);
        return response()->json($users, 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|unique:users|max:100',
            'document' => 'required|unique:users|max:20',
            'address' => 'required|max:100',
            'phone' => 'required|max:20',
            'status' => 'required|max:1',
            'password' => 'required|max:100',
            'type' => 'required|max:1',
        ]);

        $validated['password'] = bcrypt($validated['password']);


        $user = new User;

        $user->fill($validated);

        if ($user->save()) {
            return response()->json($user, 201);
        }

        return response()->json(['error' => 'Erro ao criar o usuário'], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
