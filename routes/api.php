<?php

use App\Http\Controllers\FirebaseController;
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

    // Route to go to the insert page
    Route::get('/insert', [FirebaseController::class, 'insert'])->name('insert');

// Route to insert new item
    Route::post('/store', [FirebaseController::class, 'store'])->name('store');

    Route::get('/home', [FirebaseController::class, 'index'])->name('home');

    // Route to go to the single item page to edit it
    Route::get('/edit/{id}', [FirebaseController::class, 'edit']);

    // Route to update some data in single item
    Route::post('/update/{id}', [FirebaseController::class, 'update'])->name('update');

    Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');

});
