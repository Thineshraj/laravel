<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\AboutUs;
use App\Models\multipic;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\FrontPagesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('about_us')->first();
    $images = multipic::all();
    return view('home', compact('brands', 'abouts', 'images'));
})->name('con');

// >>>>>>>>>>>> Dashboard >>>>>>>>>>>>>>>>>>>>>

// Route::get('/dashboard', function () {
//     // $users = User::all();
//     $users = DB::table('users')->get();
//     return view('dashboard', compact('users'));
//     })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    // $users = DB::table('users')->get();
    // return view('dashboard', compact('users'));
    return view('admin.index');
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

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//
// >>>>>>>>>>>>>>> With new design >>>>>>>>>>>>>>>>>>//
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>//

Route::get('user/logout', [BrandController::class, 'userLogout'])->name('user.logout');

// >>>> Sliders
Route::get('/slider/all', [SliderController::class, 'AllSlider'])->name('all.slider');
Route::post('/slider/add', [SliderController::class, 'AddSlider'])->name('slider.add');

// >>>>> About us
Route::get('/about/all', [AboutUsController::class, 'AllAbout'])->name('all.aboutUs');
Route::get('/about/add', [AboutUsController::class, 'AddAbout'])->name('aboutUs.add');
Route::post('/about/store', [AboutUsController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}', [AboutUsController::class, 'EditAbout']);
Route::post('/about/update/{id}', [AboutUsController::class, 'UpdateAbout']);
Route::get('/about/delete/{id}', [AboutUsController::class, 'DeleteAbout']);

// >>>>>> Frontend Pages >>>>>>>>
Route::get('/portfolio', [FrontPagesController::class, 'Portfolio'])->name('portfolio');




require __DIR__.'/auth.php';
