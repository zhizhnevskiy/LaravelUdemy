<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Models\Brand;

use App\Models\User;
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

//Route::get('/email/verify', function () {
//    return view('auth.verify-email');
//})->middleware('auth')->name('verification.notice');

// Home
Route::get('/', function () {
    $brands = Brand::all();
    return view('home', compact('brands'));
});
Route::get('/home', function () {echo "Home page";});
Route::get('/about', function () {return view('about');})->middleware('age');
Route::get('/contact', [ContactController::class, 'index'])->name('con');


// Brand
Route::get('/category/all', [CategoryController::class, 'allCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'addCat'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'update']);
Route::get('/category/delete/{id}', [CategoryController::class, 'delete']);
Route::get('/category/restore/{id}', [CategoryController::class, 'restore']);
Route::get('/category/permanentDelete/{id}', [CategoryController::class, 'permanentDelete']);


// Category
Route::get('/brand/all', [BrandController::class, 'allBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'addBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'delete']);


// Multi
Route::get('/multi/image', [BrandController::class, 'multiImage'])->name('multi.image');
Route::post('/multi/add', [BrandController::class, 'storeImages'])->name('store.image');


// Admin Slider
Route::get('/home/slider', [HomeController::class, 'homeSlider'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'addSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'storeSlider'])->name('store.slider');
Route::get('/slider/delete/{id}', [HomeController::class, 'delete']);


// Admin
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'
])->group(function () {
    Route::get('/dashboard', function () {return view('admin.index');})->name('dashboard');
});
Route::get('/user/logout', [BrandController::class, 'logout'])->name('user.logout');
