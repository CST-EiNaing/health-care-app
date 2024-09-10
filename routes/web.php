<?php

use Illuminate\Support\Facades\Route;

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