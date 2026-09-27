<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsEventController;
use App\Http\Controllers\EnquiryController;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnquiryController as AdminEnquiryController;
use App\Http\Controllers\Admin\NewsEventController as AdminNewsEventController;


/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/news-events', [NewsEventController::class, 'index'])->name('news-events.index');
Route::get('/news-events/{slug}', [NewsEventController::class, 'show'])->name('news-events.show');


/*
|--------------------------------------------------------------------------
| Admission Enquiry
|--------------------------------------------------------------------------
*/

Route::get('/admission-enquiry', [EnquiryController::class, 'create'])->name('enquiries.create');
Route::post('/admission-enquiry', [EnquiryController::class, 'store'])->middleware('enquiry.rate')->name('enquiries.store');

Route::prefix('admin')->name('admin.')->group(function () {



    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::resource('news-events',AdminNewsEventController::class)->except(['show']);
        Route::get('/enquiries',[AdminEnquiryController::class, 'index'])->name('enquiries.index');
        Route::patch('/enquiries/{enquiry}/status',[AdminEnquiryController::class, 'updateStatus'])->name('enquiries.status');

    });

});