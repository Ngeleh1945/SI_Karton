<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserAccountController;
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

Route::get('/', [AuthController::class, 'showLoginForm'])->name('loginn');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [UserAccountController::class, 'showRegistrationForm'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/register', function () {
        return view('register');
    })->name('register');
    Route::get('/show-user-accounts', [UserAccountController::class, 'showUserAccounts'])->name('showUserAccounts');
});

Route::post('/create-user-account', [UserAccountController::class, 'createUserAccount'])->name('createUserAccount');
Route::delete('/userAccounts/{nik}', [UserAccountController::class, 'deleteAccount'])->name('deleted');
