<?php

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

Route::post('/websites', [\App\Http\Controllers\WebsiteController::class, 'store'])->name('websites.store');
Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::post('/subscribers', [\App\Http\Controllers\SubscriberController::class, 'store'])->name('subscribers.store');
