<?php

use App\Http\Controllers\Admin\Article\ArticleController;
use App\Http\Controllers\Admin\Auth\ChangePassword;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPassword;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\News\NewsController;
use App\Http\Controllers\Admin\News\TopicController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;






Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/emails', [EmailController::class, 'index'])->name('emails.index');
    //roles
    Route::resource('roles', RoleController::class);
    //user
    Route::resource('users', UserController::class);
    // NEWS
    Route::resource('news', NewsController::class);
    // Topics
    Route::resource('topics', TopicController::class);
    // Article
    Route::resource('articles', ArticleController::class);
});

Route::middleware('guest')->group(function () {
    //login
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
    Route::post('logout', [LoginController::class, 'logout'])->withoutMiddleware('guest')->name('logout');
    //reset-password
    Route::get('/reset-password', [ResetPassword::class, 'show'])->name('reset-password');
    Route::post('/reset-password', [ResetPassword::class, 'send'])->name('reset.perform');
    //change-password
    Route::get('/change-password', [ChangePassword::class, 'show'])->name('change-password');
    Route::post('/change-password', [ChangePassword::class, 'update'])->name('change.perform');
});
