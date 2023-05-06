<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\Admin\DashBoardController::class, 'lang']);

Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('frontend.home');
Route::get('/contact', [\App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('frontend.contact');
Route::post('/enquiry', [\App\Http\Controllers\Frontend\ContactController::class, 'enquiryForm'])->name('frontend.enquiry');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', [App\Http\Controllers\Admin\DashBoardController::class, 'root'])->name('root');

    // User Profile Controller
    Route::resource('profiles', \App\Http\Controllers\Admin\UserProfileController::class);
    Route::get('/profile', [\App\Http\Controllers\Admin\UserProfileController::class, 'index'])->name('profile.index');
    Route::post('/change/password', [\App\Http\Controllers\Admin\UserController::class, 'changePassword'])->name('change.password');

    // User Controller Route
    Route::resource('usermanagements', \App\Http\Controllers\Admin\UserController::class);
    Route::get('/usermanagement/status/{id}', [\App\Http\Controllers\Admin\UserController::class, 'changeStatus'])->name('usermanagements.status');

    // Email Template Controller
    Route::resource('emailtemplates', \App\Http\Controllers\Admin\EmailTemplateController::class);
    Route::get('/email-template', [\App\Http\Controllers\Admin\EmailTemplateController::class, 'index'])->name('emailtemplate.index');

    // Role Controller
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::get('/status/{id}', [\App\Http\Controllers\Admin\RoleController::class, 'changeStatus'])->name('role.status');

});
