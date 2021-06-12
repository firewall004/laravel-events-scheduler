<?php

use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'yeah!';
});

Route::get('/events/schedules', [EventController::class, 'eventSchedules']);
