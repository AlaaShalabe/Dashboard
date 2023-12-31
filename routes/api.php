<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\API\EmailController;
use App\Http\Controllers\Api\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/news', [NewsController::class, 'index']);
Route::post('/emails/create', [EmailController::class, 'store']);
