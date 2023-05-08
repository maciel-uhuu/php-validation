<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use ReCaptcha\ReCaptcha;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orderBy = $request->query('orderBy');
        $direction = $request->query('direction');

        $users = User::whereNot('id', auth()->id())
            ->when($orderBy, function ($query, $orderBy) use ($direction) {
                $query->orderBy($orderBy, $direction);
            });

        if ($request->has('searchBy')) {
            $users = $users
                ->where($request->searchBy, 'like', '%' . $request->searchValue . '%');
        }

        $users = $users->paginate(20);

        return Inertia::render('Dashboard', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('User/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $recaptcha = new ReCaptcha(env('RECAPTCHA_SECRET_KEY'));
        $responseRecaptcha = $recaptcha->verify($request->recaptcha_token);

        if (!$responseRecaptcha->isSuccess()) {
            throw ValidationException::withMessages([
                'recaptcha' => "Falha na validação do reCAPTCHA.",
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
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
        return Inertia::render('User/Edit', [
            'user' => User::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->validate([
            'name' => ['required', 'max:255'],
        ]));

        return Redirect::route('user.edit', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return Redirect::route('dashboard');
    }

    public function toggleActive(User $user)
    {
        $user->update([
            'active' => !$user->active,
        ]);

        return Redirect::route('dashboard');
    }
}
