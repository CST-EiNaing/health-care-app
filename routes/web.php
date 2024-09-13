<?php

use App\Http\Controllers\DutyController;
use App\Http\Controllers\OwnerController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Township
Route::get('/admin/township/list', [App\Http\Controllers\TownshipController::class, 'listTownship'])->middleware('auth');
Route::post('/admin/township/add', [App\Http\Controllers\TownshipController::class, 'createTownship'])->middleware('auth');
Route::get('/admin/township/del/{id}', [App\Http\Controllers\TownshipController::class, 'deleteTownship'])->middleware('auth');
Route::get('/admin/township/upd/{id}', [App\Http\Controllers\TownshipController::class, 'updTownship'])->middleware('auth');
Route::post('/admin/township/upd/{id}', [App\Http\Controllers\TownshipController::class, 'updateTownship'])->middleware('auth');
//Township

//Duty
Route::middleware('auth')->group(function () {
    Route::get('/admin/duty/list', [App\Http\Controllers\DutyController::class, 'listDuty']);
    Route::post('/admin/duty/add', [App\Http\Controllers\DutyController::class, 'createDuty']);
    Route::get('/admin/duty/del/{id}', [App\Http\Controllers\DutyController::class, 'deleteDuty']);
    Route::get('/admin/duty/upd/{id}', [App\Http\Controllers\DutyController::class, 'updDuty']);
    Route::post('/admin/duty/upd/{id}', [App\Http\Controllers\DutyController::class, 'updateDuty']);
});
//

//Position
Route::middleware('auth')->group(function () {
    Route::get('/admin/position/list', [App\Http\Controllers\PositionController::class, 'listPosition']);
    Route::post('/admin/position/add', [App\Http\Controllers\PositionController::class, 'createPosition']);
    Route::get('/admin/position/del/{id}', [App\Http\Controllers\PositionController::class, 'deletePosition']);
    Route::get('/admin/position/upd/{id}', [App\Http\Controllers\PositionController::class, 'updPosition']);
    Route::post('/admin/position/upd/{id}', [App\Http\Controllers\PositionController::class, 'updatePosition']);
});
//
//Owner
Route::get('/admin/owner/list', [App\Http\Controllers\OwnersController::class, 'listOwner'])->middleware('auth');
Route::post('/admin/owner/add', [App\Http\Controllers\OwnersController::class, 'createOwner'])->middleware('auth');
Route::get('/admin/owner/del/{id}', [App\Http\Controllers\OwnersController::class, 'deleteOwner'])->middleware('auth');
Route::get('/admin/owner/upd/{id}', [App\Http\Controllers\OwnersController::class, 'updOwner'])->middleware('auth');
Route::post('/admin/owner/upd/{id}', [App\Http\Controllers\OwnersController::class, 'updateOwner'])->middleware('auth');
//Owner

//Patient
Route::get('/admin/patient/list', [App\Http\Controllers\PatientController::class, 'listPatient'])->middleware('auth');
Route::post('/admin/patient/add', [App\Http\Controllers\PatientController::class, 'createPatient'])->middleware('auth');
Route::get('/admin/patient/del/{id}', [App\Http\Controllers\PatientController::class, 'deletePatient'])->middleware('auth');
Route::get('/admin/patient/upd/{id}', [App\Http\Controllers\PatientController::class, 'updPatient'])->middleware('auth');
Route::post('/admin/patient/upd/{id}', [App\Http\Controllers\PatientController::class, 'updatePatient'])->middleware('auth');
//Patient
