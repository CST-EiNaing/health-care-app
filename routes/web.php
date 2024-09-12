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
//Owner
Route::middleware('auth')->group(function () {
    Route::get('/admin/owner/list', [OwnerController::class, 'listOwner']);
    Route::post('admin/owner/add', [OwnerController::class, 'createOwner']);
    Route::get('admin/owner/del/{id}', [OwnerController::class, 'deleteOwner']);
    Route::get('admin/owner/upd/{id}', [OwnerController::class, 'updOwner']);
    Route::post('admin/owner/update/{id}', [OwnerController::class, 'updateOwner']);
});
