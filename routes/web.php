<?php


use App\Models\Topic;
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

// Route::get('/topics', function () {
//     $topics = Topic::all();
//     return view('topics.index', compact('topics'));
// });

use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\News\TopicController;
use App\Http\Controllers\Article\ArticleController;

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    // NEWS
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/show/{news}', [NewsController::class, 'show'])->name('news.show');
    Route::get('/news/edit/{news}', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/update/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/delete/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
    // Topics
    Route::get('/topics', [TopicController::class, 'topics'])->name('topics.index');
    Route::get('/topics/create', [TopicController::class, 'create'])->name('topics.create');
    Route::post('/topics/store', [TopicController::class, 'store'])->name('topics.store');
    Route::get('/topics/show/{topic}', [TopicController::class, 'show'])->name('topics.show');
    Route::get('/topics/edit/{topic}', [TopicController::class, 'edit'])->name('topics.edit');
    Route::put('/topics/update/{topic}', [TopicController::class, 'update'])->name('topics.update');
    Route::delete('/topics/delete/{topic}', [TopicController::class, 'destroy'])->name('topics.destroy');
    // Article
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/show/{article}', [ArticleController::class, 'show'])->name('articles.show');
    Route::get('/articles/edit/{article}', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/update/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/delete/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});


Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
