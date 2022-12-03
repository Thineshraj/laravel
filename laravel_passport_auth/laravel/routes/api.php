<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPassController;
use App\Http\Controllers\ResetPassController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Login
Route::post('/login', [AuthController::class, 'Login']);

// Register
Route::post('/register', [AuthController::class, 'Register']); 

// Forgot Password
Route::post('/forgotpassword', [ForgotPassController::class, 'ForgotPassword']);

// Reset Password
Route::post('/resetpassword', [ResetPassController::class, 'ResetPassword']);