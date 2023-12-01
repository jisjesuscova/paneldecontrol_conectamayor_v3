<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('alliance', [\App\Http\Controllers\Api\AllianceController::class, 'index']);
});

Route::controller(UserController::class)->group(function () {
    Route::post('user/login', 'login');
});