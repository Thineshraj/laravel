<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('welcome');
})->name('con');

// >>>>>>>>>>>> Dashboard >>>>>>>>>>>>>>>>>>>>>

// Route::get('/dashboard', function () {
//     // $users = User::all();
//     $users = DB::table('users')->get();
//     return view('dashboard', compact('users'));
//     })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    $users = DB::table('users')->get();
    return view('dashboard', compact('users'));
})->name('dashboard');

// >>>>>>>>>> Students >>>>>>>>>>>>>>>>>>

// Route::get('/students', function() {
//     return view('students');
// });

Route::get('/students', [StudentController::class, 'index']);

// >>>>>>>>>> Category >>>>>>>>>>>>>>>>>>
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');

Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('add.category');

// Edit Category
Route::get('/category/edit/{id}', [CategoryController::class, 'EditCat']);
Route::post('/category/update/{id}', [CategoryController::class, 'UpdateCat']);

// >> Delete Category
// Soft Delete
Route::get('/softDelete/category/{id}', [CategoryController::class, 'SoftDelete']);

// Restore SoftDeleted category
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);

// Force Delete
Route::get('/category/forceDel/{id}', [CategoryController::class, 'ForceDel']);

// >>>>>>>>>>>>>>>>>> Brand >>>>>>>>>>>>>>>>>>
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
// add brand
Route::post('/brand/add', [BrandController::class, 'BrandAdd'])->name('brand.add');
// Edit brand
Route::get('/brand/edit/{id}', [BrandController::class, 'BrandEdit']);
Route::post('/brand/update/{id}', [BrandController::class, 'BrandUpdate']);
// Delete Brand
Route::get('/brand/delete/{id}', [BrandController::class, 'BrandDelete']);

// >>>>>>>>>>>>>>>>>> Images >>>>>>>>>>>>>>>>>>>>>
Route::get('images/all', [BrandController::class, 'AllImages'])->name('all.images');
Route::post('images/add', [BrandController::class, 'AddImages'])->name('images.add');



require __DIR__.'/auth.php';
