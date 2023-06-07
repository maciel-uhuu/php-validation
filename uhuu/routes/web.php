<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::fallback(function(){
    return "Erro ao localizar rota!";
});

Route::view('/', 'home')->name('home');

Route::view('/signup', 'signup')->name('signup');

Route::get('/list', [Controller::class, 'list'])->name('list');

Route::prefix('client')->group(function(){
    Route::get('/create', [Controller::class, 'create'])->name('client-create');
});