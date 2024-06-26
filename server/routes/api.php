<?php

use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->get('/health-check', fn () => 'ok');

Route::post('/login', \App\Http\Controllers\Auth\LoginController::class);
Route::post('/signup', \App\Http\Controllers\Auth\SignUpController::class);
Route::get('/verify-auth', \App\Http\Controllers\Auth\VerifyAuthController::class);
