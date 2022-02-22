<?php

use App\Http\Controllers\Api\MessageController;
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
//
//Route::middleware('auth:sanctum')->get('/user', function (Reguest $reguest) {
//    return $reguest->user();
//});


Route::middleware('api')->group(function () {
    Route::resource('messages', MessageController::class);
});
