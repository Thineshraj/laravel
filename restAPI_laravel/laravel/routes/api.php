<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SclassController;
use App\Http\Controllers\Api\StudentController;

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

// Class APIs
Route::get('/class', [SclassController::class, 'AllClasses']);
Route::post('/class/store', [SclassController::class, 'StoreClass']);
Route::get('/class/edit/{id}', [SclassController::class, 'EditClass']);
Route::post('/class/update/{id}', [SclassController::class, 'UpdateClass']);
Route::get('/class/delete/{id}', [SclassController::class, 'DeleteClass']);

// Student APIs
Route::post('/student/store', [StudentController::class, 'StoreStudent']);
Route::get('/student', [StudentController::class, 'AllStudents']);
