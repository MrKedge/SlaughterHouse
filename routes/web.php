<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClientController;
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
Route::get('/admin-sign-up', [AuthController::class, 'ShowSignUp'])->name('admin-sign-up');
Route::get('/client-sign-up', [AuthController::class, 'ShowClientSignup'])->name('client-sign-up');

Route::POST('sign-up/store-admin', [AuthController::class, 'StoreAccount'])->name("admin.store-account");
Route::POST('sign-up/store-client', [AuthController::class, 'StoreClientAccount'])->name("client.store-account");
Route::POST('login/authenticate', [AuthController::class, 'Authenticate'])->name('login.authenticate');

Route::get('/admin-dashboard', [AdminController::class, 'ShowAdminDashboardOverview'])->name('admin-dashboard');
Route::get('/client-dashboard', [ClientController::class, 'ShowClientDashboardOverview'])->name('client-dashboard');
