<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth.session'])->group(function () {
    Route::resource('clients', UsersController::class);
    Route::post("/signout", [SessionController::class, 'destroy']);
});
Route::middleware(['auth.session'])->resource('clients', UsersController::class);
Route::middleware(['guest'])->group(function () {
    Route::get("/signin", [SessionController::class, 'create']);
    Route::post("/signin", [SessionController::class, 'store'])->name('signin.store');
    Route::get("/signup", [UsersController::class, 'create']);
    Route::post("/signup", [UsersController::class, 'store'])->name('signup.store');;
});

Route::fallback(function () {
    $session_user = Auth::user();

    if ($session_user) {
        return redirect("/clients");
    }

    return redirect("/signin");
});
