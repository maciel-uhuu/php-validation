<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return "Erro ao localizar rota!";
});

#Views:
Route::view('/', 'home')->name('home');
Route::view('/login', 'login')->name('login');
Route::view('/profile', 'profile')->name('profile');
Route::view('/signup', 'signup')->name('signup');

#ClientController
Route::get('/list', [Controller::class, 'list'])->name('list');
Route::prefix('client')->group(function () {
    Route::post('/', [Controller::class, 'store'])->name('client-store');
    Route::get('/{id}/edit', [Controller::class, 'edit'])->name('client-edit');
    Route::put('/{id}', [Controller::class, 'update'])->name('client-update');
    Route::delete('/{id}', [Controller::class, 'destroy'])->name('client-destroy');
    Route::put('/{id}/active', [Controller::class, 'active'])->name('client-active');
    Route::put('/{id}/deactive', [Controller::class, 'deactive'])->name('client-deactive');
    Route::get('/login', [Controller::class, 'login'])->name('client-login');
});
