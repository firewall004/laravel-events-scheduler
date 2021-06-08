<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
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

Route::post('/auth/save', [AuthController::class, 'save'])->name('auth.save');
Route::get('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/event', [EventController::class, 'addEvent'])->name('event.add');
Route::post('/event/save', [EventController::class, 'save'])->name('event.save');

Route::get('/events', [EventController::class, 'index'])->name('events.show');

Route::group(['middleware' => ['authCheck']], function () {
	Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
	Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
	Route::get('/home', [AuthController::class, 'home']);
	Route::get('/', [AuthController::class, 'home']);
});
