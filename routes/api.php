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

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Route to go to the single item page to edit it
    Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit']);

    // Route to update some data in single item
    Route::post('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');

    Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');

});
