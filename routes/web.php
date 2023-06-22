<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventformController;
use App\Http\Controllers\registrationController;
use App\Http\Controllers\customController;
use App\Http\Controllers\eventregistrationController;
use App\Http\Controllers\RelationController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome')->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('data',[registrationController::class,'data']);

Route::get('datq',[registrationController::class,'datq2']);

// Admin Routes
Route::group(['prefix' => 'admin'], function () {
    // Admin Auth routes for login, logout and password reset
    Auth::routes(['register' => false, 'verify' => false]);
    
    // Admin Dashboard
    Route::group(['middleware' => ['auth']], function () {
        Route::get('account', [DashboardController::class, 'account'])->name('account');
        Route::get('/account/{id}', [DashboardController::class, 'account_set']);
        Route::group(['middleware' => ['account']], function () {
            
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('change-password', [DashboardController::class, 'changePassword'])->name('change-password');
            Route::post('change-password', [DashboardController::class, 'passwordChange'])->name('password.change');
            Route::resource('roles', RoleController::class);
            Route::post('activate/{id}', [RoleController::class, 'activate'])->name('roles.activate');
            Route::resource('users', UserController::class);
            Route::resource('eventtypes', EventTypeController::class);
            Route::resource('eventcategories', EventCategoryController::class);
            //
            // Route::resource('eventcategorie', EventformController::class);
            // Route::view('eventform','admin.eventCategory.eventform');
            // Route::get('eventForm',[EventformController::class,'index']);
            Route::get('relation',[RelationController::class,'index']);
            Route::view('ternary','ternary');
            // Route::get('relation',[RelationController::class,'indexdata']);
            Route::resource('events', EventController::class);
            Route::resource('registrationsection', EventformController::class);
            Route::resource('customfeilds', customController::class);
            Route::resource('eventregistration', eventregistrationController::class);
            Route::get('/eventlists', [EventController::class, 'event_lists'])->name('event_lists');
            Route::post('type/activate/{id}', [EventTypeController::class, 'activate'])->name('eventtypes.activate');
            Route::post('category/activate/{id}', [EventCategoryController::class, 'activate'])->name('eventcategories.activate');
        });
    });
});

// URL::forceScheme('https');
