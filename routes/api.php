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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class, 'me']);
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'admin'
], function ($router) {
    Route::post('login', [\App\Http\Controllers\Admin\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\Admin\AuthController::class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\Admin\AuthController::class, 'me']);
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('products', \App\Http\Controllers\ProductController::class);
});
