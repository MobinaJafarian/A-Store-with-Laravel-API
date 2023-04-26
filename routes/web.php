<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\LogViewerController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PropertyGroupController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->middleware('auth')->group(function () {
    
    //Main Route
    Route::get('/', [PanelController::class , 'index'])->name('panel');
    
    //User Route
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
    Route::get('create_user_roles/{id}', [UserController::class , 'createUserRoles'])->name('create.user.roles');
    Route::post('store_user_roles/{id}', [UserController::class , 'storeUserRoles'])->name('store.user.roles');
    Route::get('logs', [LogViewerController::class , 'index'])->name('logs');

    //Product Route
    Route::resource('category', CategoryController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('products', ProductController::class);
    Route::resource('property_groups', PropertyGroupController::class);
    Route::resource('properties', PropertyController::class);

    Route::get('create_product_gallery/{id}',[GalleryController::class, 'addGallery'])->name('create.product.gallery');
    Route::post('store_product_gallery/{id}',[GalleryController::class, 'storeGallery'])->name('store.product.gallery');
    
    Route::get('create_product_properties/{id}',[ProductController::class, 'addProperties'])->name('create.product.properties');
    Route::post('store_product_properties/{id}',[ProductController::class, 'storeProperties'])->name('store.product.properties');
});


require __DIR__.'/auth.php';
