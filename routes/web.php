<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ButcherController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FormMaintenanceController;
use App\Http\Controllers\InspectorController;
use App\Http\Controllers\QrCodeController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use NunoMaduro\Collision\Adapters\Laravel\Inspector;

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
    return view('auth.log-in');
});

Route::get('/qr-code-scanner', function () {
    return view('scan-qr-code');
})->name('scan.qr');

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
Route::post('/set/arrival/animal/{id}', [AdminController::class, 'SetArrivalTime'])->name('set.arrival');
Route::post('/generate/qr/code/{id}', [QrCodeController::class, 'GenerateQRCode'])->name('generate.qr.code');
Route::post('/form/maintenance/', [FormMaintenanceController::class, 'FormMaintenance'])->name('form.maintenance');
Route::post('/delete/on/form', [FormMaintenanceController::class, 'DeleteOnForm'])->name('delete.on.form');
Route::post('/for/slaughter/animal/{id}', [AdminController::class, 'ForSlaughterAnimal'])->name('for.slaughter.animal');
Route::post('/admin/monitor/animal/{id}', [AdminController::class, 'MonitorAnimal'])->name('admin.monitor.animal');
Route::post('/admin/dispose/animal/{id}', [AdminController::class, 'ForDisposeAnimal'])->name('dispose.animal');
Route::post('/inspector/postmortem/good/{id}', [InspectorController::class, 'PostMortemGood'])->name('inspector.postmortem.good');
//admin pages


Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'ShowAdminDashboardOverview'])->name('admin.dashboard');
    Route::get('/admin/view/animal/reg/form/{id}', [AdminController::class, 'ShowRegistrationForm'])->name('admin.view.animal.reg.form');
    Route::get('/admin/view/animal/reg/list', [AdminController::class, 'ShowRegistrationList'])->name('admin.view.animal.reg.list');
    Route::get('/admin/edit/registration', [AdminController::class, 'ShowEditRegistration'])->name('admin.edit.registration');
    Route::get('/admin/approve/list', [AdminController::class, 'ShowApproveList'])->name('admin.approve.list');
    Route::get('/admin/schedule/list', [AdminController::class, 'ShowScheduleList'])->name('admin.schedule.list');
    Route::get('/admin/for/slaughter/list/', [AdminController::class, 'ShowForSlaughterList'])->name('admin.for.slaughter.list');
    Route::get('/admin/form/maintenance/', [FormMaintenanceController::class, 'ShowMaintenanceForm'])->name('admin.form.maintenance');
    Route::get('/admin/slaughter/list', [AdminController::class, 'ShowSlaughteredList'])->name('admin.slaughter.list');
    Route::get('/admin/monitoring/list', [AdminController::class, 'AnteMortem'])->name('admin.monitor.list');
});



//Client pages 
Route::get('/client/overview', [ClientController::class, 'ShowClientDashboardOverview'])->name('client.overview');
Route::get('/client/animal/list/register', [ClientController::class, 'ShowAnimalListReg'])->name('client.animal.list.register');
Route::get('/client/animal/register', [ClientController::class, 'ShowAnimalRegForm'])->name('client.animal.register');
Route::get('/client/view/animal/form/{id}', [ClientController::class, 'ShowRegistrationFormClient'])->name('client.view.animal.form');
Route::get('/client/edit/animal/form/{id}', [ClientController::class, 'ShowEditFormClient'])->name('client.edit.animal.form');
Route::get('/client/archive/list/', [ClientController::class, 'ShowArchiveList'])->name('client.archive.list');
Route::get('/client/drafts', [ClientController::class, 'ShowDrafts'])->name('client.drafts');
Route::get('/client/approve/list/', [ClientController::class, 'ShowClientApprove'])->name('client.approve.list');
Route::get('/client/schedule/list/', [ClientController::class, 'ShowClientSchedule'])->name('client.schedule.list');
Route::get('/client/slaughter/list/', [ClientController::class, 'ShowClientSlaughter'])->name('client.slaughter.list');
//post clients
Route::post('archive/form/{id}', [ClientController::class, 'ArchiveForm'])->name('archive.form');


//butcher
Route::get('/butcher/overview/', [ButcherController::class, 'ShowButcherOverview'])->name('butcher.overview');
Route::get('/butcher/animals/', [ButcherController::class, 'ShowButcherAnimal'])->name('butcher.animal');
Route::get('/butcher/view/form/{id}', [ButcherController::class, 'ShowButcherForm'])->name('butcher.view.form');
Route::post('/buthcer/slaughtered/animal{id}', [ButcherController::class, 'SlaughteredAnimal'])->name('butcher.slaughter.animal');

//inspector
Route::get('/inspector/overview', [InspectorController::class, 'ShowInspectorOverview'])->name('inspector.overview');
Route::get('/inspector/animal/list', [InspectorController::class, 'ShowInspectAnimal'])->name('inspector.animal.list');
Route::get('/inspector/view/form/{id}', [InspectorController::class, 'ShowInspectorForm'])->name('inspector.view.form');
