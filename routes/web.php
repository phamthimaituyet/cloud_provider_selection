<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CriteriaController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\VendorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin'])->name('login.form');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'postRegister'])->name('register.form');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('users')->name('users.')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/edit/{id}', 'update')->name('update');
        Route::post('/delete', 'delete')->name('delete');
    });

    Route::prefix('categories')->name('categories.')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/edit', 'update')->name('update');
        Route::post('/delete', 'delete')->name('delete');
    });

    Route::prefix('products')->name('products.')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/edit', 'update')->name('update');
        Route::post('/delete', 'delete')->name('delete');
        Route::get('/{id}', 'show')->name('show');
    });
 

    Route::prefix('criterias')->name('criterias.')->controller(CriteriaController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
    }); 

    Route::prefix('vendor')->group(function () {
        Route::get('/', [VendorController::class, 'index'])->name('vendor');
    });
});

Route::group(['prefix' => 'my-project', 'as' => 'myProject.'], function() {
    Route::get('/', [ProductsController::class, 'showMyProject'])->name('show');
    Route::post('/', [ProductsController::class, 'createMyProject'])->name('create');
    Route::get('/{id}', [ProductsController::class, 'addCriteria'])->name('addCriteria');
});

Route::get('/support', [ProductsController::class, 'support'])->name('support');
Route::get('/{id}', [ProductsController::class, 'show'])->name('show');
Route::post('/{id}', [ProductsController::class, 'review'])->name('review');
Route::get('/detail-review/{id}', [ProductsController::class, 'detailReview'])->name('detailReview');
Route::post('/detail-review/{id}', [ProductsController::class, 'postDetailReview'])->name('postDetailReview');
