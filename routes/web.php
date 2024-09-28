<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DutyController;
use App\Http\Controllers\NdpController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\UserViewController::class, 'getNurseLists']);


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Township
Route::get('/admin/township/list', [App\Http\Controllers\TownshipController::class, 'listTownship'])->middleware('auth');
Route::post('/admin/township/add', [App\Http\Controllers\TownshipController::class, 'createTownship'])->middleware('auth');
Route::get('/admin/township/del/{id}', [App\Http\Controllers\TownshipController::class, 'deleteTownship'])->middleware('auth');
Route::get('/admin/township/upd/{id}', [App\Http\Controllers\TownshipController::class, 'updTownship'])->middleware('auth');
Route::post('/admin/township/upd/{id}', [App\Http\Controllers\TownshipController::class, 'updateTownship'])->middleware('auth');
//Township

//Duty
Route::middleware('auth')->group(function () {
    Route::get('/admin/duty/list', [DutyController::class, 'listDuty']);
    Route::post('/admin/duty/add', [DutyController::class, 'createDuty']);
    Route::get('/admin/duty/del/{id}', [DutyController::class, 'deleteDuty']);
    Route::get('/admin/duty/upd/{id}', [DutyController::class, 'updDuty']);
    Route::post('/admin/duty/upd/{id}', [DutyController::class, 'updateDuty']);
});
//

//Position
Route::middleware('auth')->group(function () {
    Route::get('/admin/position/list', [PositionController::class, 'listPosition']);
    Route::post('/admin/position/add', [PositionController::class, 'createPosition']);
    Route::get('/admin/position/del/{id}', [PositionController::class, 'deletePosition']);
    Route::get('/admin/position/upd/{id}', [PositionController::class, 'updPosition']);
    Route::post('/admin/position/upd/{id}', [PositionController::class, 'updatePosition']);
});
//
//Owner
Route::get('/admin/owner/list', [App\Http\Controllers\OwnerController::class, 'listOwner'])->middleware('auth');
Route::post('/admin/owner/add', [App\Http\Controllers\OwnerController::class, 'createOwner'])->middleware('auth');
Route::get('/admin/owner/del/{id}', [App\Http\Controllers\OwnerController::class, 'deleteOwner'])->middleware('auth');
Route::get('/admin/owner/upd/{id}', [App\Http\Controllers\OwnerController::class, 'updOwner'])->middleware('auth');
Route::post('/admin/owner/upd/{id}', [App\Http\Controllers\OwnerController::class, 'updateOwner'])->middleware('auth');
//Owner

//Patient
Route::get('/admin/patient/list', [App\Http\Controllers\PatientController::class, 'listPatient'])->middleware('auth');
Route::post('/admin/patient/add', [App\Http\Controllers\PatientController::class, 'createPatient'])->middleware('auth');
Route::get('/admin/patient/del/{id}', [App\Http\Controllers\PatientController::class, 'deletePatient'])->middleware('auth');
Route::get('/admin/patient/upd/{id}', [App\Http\Controllers\PatientController::class, 'updPatient'])->middleware('auth');
Route::post('/admin/patient/upd/{id}', [App\Http\Controllers\PatientController::class, 'updatePatient'])->middleware('auth');
//Patient

//Nurse
Route::middleware('auth')->group(function () {
    Route::get('/admin/nurse/list', [NurseController::class, 'listNurse']);
    Route::post('/admin/nurse/add', [NurseController::class, 'createNurse']);
    Route::get('/admin/nurse/del/{id}', [NurseController::class, 'deleteNurse']);
    Route::get('/admin/nurse/upd/{id}', [NurseController::class, 'updNurse']);
    Route::post('/admin/nurse/upd/{id}', [NurseController::class, 'updateNurse']);
});
//

//NDP
Route::middleware('auth')->group(function () {
    Route::get('/admin/ndp/list', [NdpController::class, 'listNdp']);
    Route::post('/admin/ndp/add', [NdpController::class, 'createNdp']);
    Route::get('/admin/ndp/del/{id}', [NdpController::class, 'deleteNdp']);
    Route::get('/admin/ndp/upd/{id}', [NdpController::class, 'updNdp']);
    Route::post('/admin/ndp/upd/{id}', [NdpController::class, 'updateNdp']);
});
//

//Booking
Route::middleware('auth')->group(function () {
    Route::get('/admin/booking/list', [BookingController::class, 'listBooking']);
    Route::post('/admin/booking/add', [BookingController::class, 'createBooking']);
    Route::get('/admin/booking/del/{id}', [BookingController::class, 'deleteBooking']);
    Route::get('/admin/booking/upd/{id}', [BookingController::class, 'updBooking']);
    Route::post('/admin/booking/upd/{id}', [BookingController::class, 'updateBooking']);
});

//Method
Route::middleware('auth')->group(function () {
    Route::get('/admin/method/list', [App\Http\Controllers\PaymentMethodController::class, 'listMethod']);
    Route::post('/admin/method/add', [App\Http\Controllers\PaymentMethodController::class, 'createMethod']);
    Route::get('/admin/method/del/{id}', [App\Http\Controllers\PaymentMethodController::class, 'deleteMethod']);
    Route::get('/admin/method/upd/{id}', [App\Http\Controllers\PaymentMethodController::class, 'updMethod']);
    Route::post('/admin/method/upd/{id}', [App\Http\Controllers\PaymentMethodController::class, 'updateMethod']);
});

//Payment
Route::middleware('auth')->group(function () {
    Route::get('/admin/payment/list', [App\Http\Controllers\PaymentController::class, 'listPayment']);
    Route::post('/admin/payment/add', [App\Http\Controllers\PaymentController::class, 'createPayment']);
    Route::get('/admin/payment/del/{id}', [App\Http\Controllers\PaymentController::class, 'deletePayment']);
    Route::get('/admin/payment/upd/{id}', [App\Http\Controllers\PaymentController::class, 'updPayment']);
    Route::post('/admin/payment/upd/{id}', [App\Http\Controllers\PaymentController::class, 'updatePayment']);
});

