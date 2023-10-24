<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClientController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/log-in', [AuthController::class, 'ShowLogin'])->name('log.in');
Route::get('/sign-up', [AuthController::class, 'ShowSignUp'])->name('sign.up');
Route::get('/log-out', [AuthController::class, 'LogOut'])->name('log-out');

Route::POST('/sign-up/store/admin', [AuthController::class, 'StoreAccount'])->name("admin.store.account");
Route::POST('/sign-up/store/client', [AuthController::class, 'StoreClientAccount'])->name("client.store.account");
Route::POST('/login/authenticate', [AuthController::class, 'Authenticate'])->name('login.authenticate');
Route::POST('/store/animal', [ClientController::class, 'Register'])->name('store.animal');

//admin pages
Route::get('/admin/dashboard', [AdminController::class, 'ShowAdminDashboardOverview'])->name('admin.dashboard');
Route::get('/admin/receive/animal/reg', [AdminController::class, 'ShowReceiveRegistrationForm'])->name('admin.receive.animal.registration');
Route::get('/admin/view/animal/reg/list', [AdminController::class, 'ShowRegistrationList'])->name('admin.view.animal.reg.list');
Route::get('/admin/edit/registration', [AdminController::class, 'ShowEditRegistration'])->name('admin.edit.registration');

//Client pages 
Route::get('/client/overview', [ClientController::class, 'ShowClientDashboardOverview'])->name('client.overview');
Route::get('/client/animal/list/register', [ClientController::class, 'ShowAnimalListReg'])->name('client.animal.list.register');
Route::get('/client/animal/register', [ClientController::class, 'ShowAnimalRegForm'])->name('client.animal.register');
