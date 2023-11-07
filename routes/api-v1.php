<?php

use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\MensajeController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\UserController;
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

Route::resource('users', UserController::class);
Route::resource('notifications', NotificationController::class);
Route::resource('chats', ChatController::class);
Route::resource('mensajes', MensajeController::class);




