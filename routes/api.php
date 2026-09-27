<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsEventController;

Route::get('/news-events', [NewsEventController::class, 'index']);
Route::get('/news-events/{slug}', [NewsEventController::class, 'show']);