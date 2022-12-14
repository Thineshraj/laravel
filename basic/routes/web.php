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
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminProfileController;
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

// >>>>> Contact
Route::get('/admin/contact', [ContactController::class, 'ContactPage'])->name('admin.contact');
Route::get('/admin/contact/add', [ContactController::class, 'ContactAdd'])->name('contact.add');
Route::post('/admin/contact/store', [ContactController::class, 'ContactStore'])->name('store.contact');
Route::get('/admin/contact/edit/{id}', [ContactController::class, 'ContactEdit']);
Route::post('/admin/contact/update/{id}', [ContactController::class, 'ContactUpdate']);
Route::get('/admin/contact/delete/{id}', [ContactController::class, 'ContactDelete']);
Route::get('/admin/contact/message', [ContactController::class, 'ContactMessage'])->name('admin.contact.message');
Route::get('/admin/contact/message/delete/{id}', [ContactController::class, 'MessageDelete']);

// Admin Profile edit
Route::get('/admin/password', [AdminProfileController::class, 'ChangePassword'])->name('admin.password.change');
Route::post('/admin/password/update', [AdminProfileController::class, 'UpdatePassword'])->name('admin.password.update');
Route::get('/admin.profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::post('/admin/profile/update', [AdminProfileController::class, 'AdminProfileUpdate'])->name('admin.profile.update');

// >>>>>> Frontend Pages >>>>>>>>
Route::get('/portfolio', [FrontPagesController::class, 'Portfolio'])->name('portfolio');
Route::get('/contact', [FrontPagesController::class, 'Contact'])->name('contact');
Route::post('/contact/form', [FrontPagesController::class, 'ContactForm'])->name('contact.form');




require __DIR__.'/auth.php';
