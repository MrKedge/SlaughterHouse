<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\QrCodeController;
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
});

Route::get('/log-in', [AuthController::class, 'ShowLogin'])->name('log.in');
Route::get('/sign-up', [AuthController::class, 'ShowSignUp'])->name('sign.up');
Route::get('/log-out', [AuthController::class, 'LogOut'])->name('log-out');


Route::POST('/sign-up/store/account', [AuthController::class, 'StoreAccount'])->name("store.account");
Route::POST('/log-in/authenticate', [AuthController::class, 'Authenticate'])->name('login.authenticate');
Route::POST('/store/animal', [ClientController::class, 'Register'])->name('store.animal');
Route::POST('/approve/status/animal/{id}', [AdminController::class, 'ApproveAnimalRegistration'])->name('approve.status');
Route::POST('/reject/status/animal/{id}', [AdminController::class, 'RejectAnimalRegistration'])->name('reject.status');
Route::post('/update/client/animal/form/{id}', [ClientController::class, 'UpdateAnimalForm'])->name('update.form');
Route::post('/draft/form', [ClientController::class, 'SaveAsDraft'])->name('save.draft');
Route::post('/set/schedule/animal/{id}', [AdminController::class, 'SetSchedule'])->name('set.schedule');
Route::post('/generate/qr/code/{id}', [QrCodeController::class, 'GenerateQRCode'])->name('generate.qr.code');

//admin pages
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'ShowAdminDashboardOverview'])->name('admin.dashboard');
    Route::get('/admin/view/animal/reg/form/{id}', [AdminController::class, 'ShowRegistrationForm'])->name('admin.view.animal.reg.form');
    Route::get('/admin/view/animal/reg/list', [AdminController::class, 'ShowRegistrationList'])->name('admin.view.animal.reg.list');
    Route::get('/admin/edit/registration', [AdminController::class, 'ShowEditRegistration'])->name('admin.edit.registration');
    Route::get('/admin/approve/list', [AdminController::class, 'ShowApproveList'])->name('admin.approve.list');
    Route::get('/admin/schedule/list', [AdminController::class, 'ShowScheduleList'])->name('admin.schedule.list');
    Route::get('/admin/for/slaughter/list/', [AdminController::class, 'ShowForSlaughterList'])->name('admin.for.slaughter.list');
});



//Client pages 
Route::get('/client/overview', [ClientController::class, 'ShowClientDashboardOverview'])->name('client.overview');
Route::get('/client/animal/list/register', [ClientController::class, 'ShowAnimalListReg'])->name('client.animal.list.register');
Route::get('/client/animal/register', [ClientController::class, 'ShowAnimalRegForm'])->name('client.animal.register');
Route::get('/client/view/animal/form/{id}', [ClientController::class, 'ShowRegistrationFormClient'])->name('client.view.animal.form');
Route::get('/client/edit/animal/form/{id}', [ClientController::class, 'ShowEditFormClient'])->name('client.edit.animal.form');
Route::get('/client/archive/list/', [ClientController::class, 'ShowArchiveList'])->name('client.archive.list');
Route::get('/client/drafts', [ClientController::class, 'ShowDrafts'])->name('client.drafts');

//post clients
Route::post('archive/form/{id}', [ClientController::class, 'ArchiveForm'])->name('archive.form');
