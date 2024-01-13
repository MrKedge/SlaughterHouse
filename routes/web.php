<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnteMortemController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ButcherController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompletedController;
use App\Http\Controllers\FormMaintenanceController;
use App\Http\Controllers\InspectorController;
use App\Http\Controllers\PostMortemController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\StubController;
use App\Models\AnteMortem;
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
    return view('welcome');
});

Route::get('/verify/your/email/', [AuthController::class, 'ShowVerifyEmail'])->name('verify.email.account');

Route::get('/qr-code-scanner', function () {
    return view('scan-qr-code');
})->name('scan.qr');

Route::get('/log-in', [AuthController::class, 'ShowLogin'])->name('log.in');
Route::get('/sign-up', [AuthController::class, 'ShowSignUp'])->name('sign.up');
Route::get('/log-out', [AuthController::class, 'LogOut'])->name('log-out');


Route::post('/resend/verification/code/', [AuthController::class, 'ResendCode'])->name('resend.code');
Route::post('/verify/account/', [AuthController::class, 'Verify'])->name('verify.account');
Route::POST('/sign-up/store/account/', [AuthController::class, 'StoreAccount'])->name("store.account");
Route::POST('/log-in/authenticate', [AuthController::class, 'Authenticate'])->name('login.authenticate');
Route::POST('/store/animal', [ClientController::class, 'Register'])->name('store.animal');
Route::POST('/approve/status/animal/{id}', [AdminController::class, 'ApproveAnimalRegistration'])->name('approve.status');
Route::POST('/reject/status/animal/{id}', [AdminController::class, 'RejectAnimalRegistration'])->name('reject.status');
Route::post('/update/client/animal/form/{id}', [ClientController::class, 'UpdateAnimalForm'])->name('update.form');
Route::post('/draft/form', [ClientController::class, 'SaveAsDraft'])->name('save.draft');
Route::post('/set/arrival/animal/{id}', [AnteMortemController::class, 'SetArrivalTime'])->name('set.arrival');
Route::post('/generate/qr/code/{id}', [QrCodeController::class, 'GenerateQRCode'])->name('generate.qr.code');
Route::post('/form/maintenance/', [FormMaintenanceController::class, 'FormMaintenance'])->name('form.maintenance');
Route::post('/delete/on/form', [FormMaintenanceController::class, 'DeleteOnForm'])->name('delete.on.form');
Route::post('/for/slaughter/animal/{id}', [AdminController::class, 'ForSlaughterAnimal'])->name('for.slaughter.animal');
Route::post('/admin/monitor/animal/{id}', [AnteMortemController::class, 'MonitorAnimal'])->name('admin.monitor.animal');
Route::post('/admin/dispose/animal/{id}', [AnteMortemController::class, 'ForDisposeAnimal'])->name('dispose.animal');
Route::post('/inspector/postmortem/good/{id}', [PostMortemController::class, 'PostMortemGood'])->name('inspector.postmortem.good');
Route::post('/admin/set/schedule/{id}', [AnteMortemController::class, 'SetSchedule'])->name('set.schedule');
Route::post('/admin/seed/account/', [AuthController::class, 'CreateAccount'])->name('admin.seed.account');
Route::get('/admin/download/lrme', [ReportsController::class, 'DownloadLRME'])->name('download.lrme');
Route::post('/comple/process/{id}', [CompletedController::class, 'CompleteRecord'])->name('complete.process');
Route::post('/admin/slaughter/private/{id}', [PostMortemController::class, 'PrivateButcher'])->name('private.butcher');

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
    Route::get('/admin/monitoring/list', [AnteMortemController::class, 'AnteMortemList'])->name('admin.monitor.list');
    Route::get('/admin/issuing/stub/', [StubController::class, 'ShowOwnerStubList'])->name('issuing.stub'); //stub first page
    Route::get('/admin/create/account/', [AdminController::class, 'ShowCreateAccount'])->name('admin.create.account');
    Route::get('/admin/dispose/list', [AnteMortemController::class, 'ShowDisposedList'])->name('admin.dispose.list');
    Route::get('/admin/lrme/report', [ReportsController::class, 'ShowReportLRME'])->name('lrme.reports');
    Route::get('/admin/sshpdp/report', [ReportsController::class, 'ShowSSHPDP'])->name('sshpdp.reports');
    Route::get('/admin/animal/sshpdp/{animalType}', [ReportsController::class, 'ShowAnimalSSHPDP'])->name('animal.sshpdp');
    Route::get('/admin/animal/stub/{ownerId}', [StubController::class, 'ShowForStubAnimal'])->name('admin.for.stub.animals');
    Route::get('/admin/issue/stub/', [StubController::class, 'GenerateStub'])->name('issue.stub');
    Route::get('/admin/register/animal', [AdminController::class, 'ShowAdminRegister'])->name('admin.register.animal');
    Route::get('/admin/postmortem/list', [PostMortemController::class, 'ShowAdminPostMortem'])->name('admin.postmortem.list');
    Route::get('/admin/completed/animals', [CompletedController::class, 'ShowCompleted'])->name('complete.animals');
    Route::get('/admin/user/complete/list/{ownerId}', [CompletedController::class, 'ShowUserMic'])->name('owner.mic.list');
    Route::get('/admin/generate/mic/', [CompletedController::class, 'GenerateMic'])->name('generate.mic');
    Route::get('/admin/archive/list', [ArchiveController::class, 'ShowArchive'])->name('archive.list');
});


Route::post('/client/publish/animal/{id}', [ClientController::class, 'PublishRegister'])->name('publish.animal');
//Client pages 
Route::middleware(['verifiedUser'])->group(function () {
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
    Route::get('/client/stub', [ReceiptController::class, 'ShowClientStub'])->name('client.stub');
    Route::get('/client/table/receipt/{id}', [ReceiptController::class, 'ShowReceiptTable'])->name('receipt.table');
    Route::get('/admin/schedule/queue', [AnteMortemController::class, 'ShowScheduledQueue'])->name('scheduled.queue');
});

//post clients
Route::post('archive/form/{id}', [ClientController::class, 'ArchiveForm'])->name('archive.form');
Route::post('/upload/receipt/{id}', [ReceiptController::class, 'UploadReceipt'])->name('upload.receipt');

//butcher
Route::post('/buthcer/slaughtered/animal{id}', [PostMortemController::class, 'SlaughteredAnimal'])->name('butcher.slaughter.animal');
Route::middleware(['butcher'])->group(function () {
    Route::get('/butcher/overview/', [ButcherController::class, 'ShowButcherOverview'])->name('butcher.overview');
    Route::get('/butcher/animals/', [ButcherController::class, 'ShowButcherAnimal'])->name('butcher.animal');
    Route::get('/butcher/view/form/{id}', [ButcherController::class, 'ShowButcherForm'])->name('butcher.view.form');
});


//inspector
Route::post('/edit/condemn/parts/{id}', [PostMortemController::class, 'EditCondemn'])->name('edit.condemn.parts');
Route::post('/inspector/condemn/animal/{id}', [PostMortemController::class, 'CondemnCarcass'])->name('inspector.condemn.animal');
Route::middleware(['inspector'])->group(function () {
    Route::get('/inspector/overview', [InspectorController::class, 'ShowInspectorOverview'])->name('inspector.overview');
    Route::get('/inspector/antemortem/animal', [AnteMortemController::class, 'AnteMortemList'])->name('inspector.antemortem.list');
    Route::get('/inspector/animal/list', [InspectorController::class, 'ShowPostMortemAnimal'])->name('inspector.postmortem.list');
    Route::get('/inspector/view/form/{id}', [InspectorController::class, 'ShowInspectorForm'])->name('inspector.view.form');
    Route::get('/inspector/disposed/list', [AnteMortemController::class, 'ShowDisposedList'])->name('inspector.dispose.list');
});
