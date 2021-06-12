<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

// Route::group(['middleware' => ['authCheck']], function () {
//     Route::get('/events/schedules', [EventController::class, 'eventSchedules']);
// });

Route::get('/events/schedules', [EventController::class, 'eventSchedules']);
