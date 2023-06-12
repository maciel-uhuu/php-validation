<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
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



// Route::prefix('admin')->group(function(){
    Route::prefix('auth')->group(function(){
        Route::get('login', [AdminAuthController::class, 'login'])->name('login');
        Route::post('login', [AdminAuthController::class, 'submitLogin'])->name('admin.submit.login');
    });
// });

// Route::prefix('auth')->group(function(){
//     Route::get('/login', [AuthController::class, 'login']);
//     Route::get('/register', [AuthController::class, 'register']);
//     Route::post('/register', [CustomerController::class, 'store'])->name('register.customer');
// });

Route::middleware('auth:sanctum')->group(function(){
    Route::resource('customers', CustomerController::class);
    Route::get('logout', [AdminAuthController::class, 'logout']);
    Route::get('/', function () {
        return redirect('customers');
    });
});


