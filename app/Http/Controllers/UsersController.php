<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\EditClientRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UsersController extends Controller
{
  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('signup');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CreateClientRequest $request)
  {
    $email = $request->input('email');
    $user = User::query()->where('email', '=', $email);

    if ($user) {
      return back()->withErrors(['error_message' => 'Este email já está em uso!']);
    }

    User::query()->create([
      'name' => $request->input('name'),
      'email' => $email,
      'password' => $request->input('password'),
      'can_access_account' => true
    ]);

    return redirect()->route('clients.index');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $user = User::query()->where('id', '=', $id)->first();

    return view('clients.edit', ['client' => $user]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(EditClientRequest $request, string $id)
  {
    $user = User::query()->where('id', '=', $id)->first();

    $email = $request->input('email');

    if ($email) {
      $user_with_same_email = User::query()->where('email', '=', $email)->first();

      if ($user_with_same_email->id != $user->id) {
        return back()->withErrors(['error_message' => 'This email is already in use!']);
      }
    }

    if ($request->input('password')) {
      $user->update([
        'password' => $request->input('password'),
      ]);
    }

    $user->update([
      'name' => $request->input('name'),
      'email' => $email,
      'can_access_account' => $request->input('can_access_account')
    ]);

    $user->save();
  }

  public function changeAccountAccess(Request $request, string $id)
  {
    $account_access = $request->input('can_access_account');
    $user = User::query()->find($id);
    $user->can_access_account = $account_access;
    $user->save();
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    if (!$id) {
      throw new NotFoundHttpException();
    }

    $user = User::query()->where('id', '=', $id)->delete();

    return $user;
  }
}
