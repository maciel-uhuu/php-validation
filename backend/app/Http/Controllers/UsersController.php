<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->query('limit', 20);

        try {
            $users = User::paginate($limit);
            return response()->json($users, 200);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(['error' => 'Erro ao buscar os usuários'], 400);
        }
    }

    public function findClients(Request $request)
    {
        $limit = $request->query('limit', 20);

        try {
            $users = User::where('type', 0)->paginate($limit);
            return response()->json($users, 200);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(['error' => 'Erro ao buscar os clientes'], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|max:100',
                'email' => 'required|max:100',
                'document' => 'required|max:20',
                'address' => 'required|max:100',
                'phone' => 'required|max:20',
                'status' => 'int',
                'password' => 'required|max:100',
                'type' => 'int',
            ]);

            $userEmailExists = User::where('email', $validated['email'])->first();
            $userDocumentExists = User::where('document', $validated['document'])->first();

            if ($userEmailExists) {
                return throw ValidationException::withMessages(['email' => 'Email já cadastrado']);
            }

            if ($userDocumentExists) {
                return throw ValidationException::withMessages(['document' => 'Documento já cadastrado']);
            }

            $validated['password'] = bcrypt($validated['password']);

            $user = User::create($validated);
            return response()->json($user, 201);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(['error' => 'Erro ao criar usuário'], 400);
        }
    }

    public function show(string $id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json(['error' => 'Usuário não encontrado'], 404);
            }

            return response()->json($user, 200);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(['error' => 'Erro ao buscar o usuário'], 400);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'max:100',
                'email' => 'max:100',
                'document' => 'max:20',
                'address' => 'max:100',
                'phone' => 'max:20',
                'status' => 'int',
                'password' => 'max:100',
                'type' => 'int',
            ]);

            $user = User::find($id);

            if (!$user) {
                return response()->json(['error' => 'Usuário não encontrado'], 404);
            }

            if (isset($validated['email'])) {
                $userEmailExists = User::where('email', $validated['email'])->first();

                if ($userEmailExists && $userEmailExists->id != $id) {
                    return throw ValidationException::withMessages(['email' => 'Email já cadastrado']);
                }
            }


            if (isset($validated['document'])) {
                $userDocumentExists = User::where('document', $validated['document'])->first();

                if ($userDocumentExists && $userDocumentExists->id != $id) {
                    return throw ValidationException::withMessages(['document' => 'Documento já cadastrado']);
                }
            }

            if (isset($validated['password'])) {
                $validated['password'] = bcrypt($validated['password']);
            }

            $user->update($validated);
            return response()->json($user, 200);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(['error' => 'Erro ao editar usuário'], 400);
        }
    }

    public function destroy(string $id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json(['error' => 'Usuário não encontrado'], 404);
            }

            $user->delete();
            return response()->json(['message' => 'Usuário deletado com sucesso'], 200);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(['error' => 'Erro ao deletar o usuário'], 400);
        }
    }
}
