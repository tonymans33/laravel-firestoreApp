<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route to go to the single item page to edit it
Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit']);

// Route to update some data in single item
Route::post('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');

Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');

