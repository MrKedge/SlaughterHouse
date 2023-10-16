<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/log-in', [AuthController::class, 'ShowLogin'])->name('log-in');
Route::get('/sign-up', [AuthController::class, 'ShowSignUp'])->name('sign-up');

Route::POST('sign-up/store', [AuthController::class, 'StoreAccount'])->name("admin.store-account");
Route::POST('login/authenticate', [AuthController::class, 'Authenticate'])->name('login.authenticate');
