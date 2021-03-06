<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MessageController;

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

Route::get('/', [MessageController::class, 'index']);

Route::get('fetch-message', [MessageController::class, 'fetchMessage'])->name('fetch.messages');

Route::post('add-message', [MessageController::class, 'store'])->name('store.message');

Route::delete('delete-message', [MessageController::class, 'destroy'])->name('delete.message');
