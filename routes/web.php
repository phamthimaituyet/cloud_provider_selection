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
use App\Http\Controllers\ProjectController;

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

Route::get('/',         [HomeController::class, 'index'])->name('home');
Route::get('/login',    [UserController::class, 'login'])->name('login');
Route::post('/login',   [UserController::class, 'postLogin'])->name('login.form');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register',[UserController::class, 'postRegister'])->name('register.form');
Route::get('/logout',   [UserController::class, 'logout'])->name('logout');

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('users')->name('users.')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'showAdmin')->name('show');
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

Route::group(['prefix' => 'my-project', 'middleware'=>'auth', 'as' => 'myProject.'], function() {
    Route::get('/',  [ProjectController::class, 'showMyProject'])->name('show');
    Route::post('/', [ProjectController::class, 'createMyProject'])->name('create');
    Route::get('/show/{id}',   [ProjectController::class, 'showProduct'])->name('showProduct');
    Route::post('/edit/{id}',  [ProjectController::class, 'updateMyProject'])->name('update');
    Route::post('/delete/{id}', [ProjectController::class, 'deleteMyProject'])->name('delete');
    Route::get('/create-note/{id}',  [ProjectController::class, 'createNote'])->name('createNote');
    Route::post('/create-note/{id}', [ProjectController::class, 'addNote'])->name('addNote');
    Route::get('/edit-note/{project_id}/{note_id}',    [ProjectController::class, 'editNote'])->name('editNote');
    Route::post('/edit-note/{project_id}/{note_id}',   [ProjectController::class, 'updateNote'])->name('updateNote');
    Route::post('/delete-note/{project_id}/{note_id}', [ProjectController::class, 'deleteNote'])->name('deleteNote');
});

Route::get('/support',  [ProductsController::class, 'support'])->name('support')->middleware('auth');
Route::get('/profile',  [UserController::class, 'showUser'])->name('profile')->middleware('auth');
Route::post('/profile', [UserController::class, 'editProfile'])->name('editProfile')->middleware('auth');
Route::get('/{id}',     [ProductsController::class, 'show'])->name('show');
Route::post('/{id}',    [ProductsController::class, 'review'])->name('review')->middleware('auth');
Route::get('/detail-review/{id}',  [ProductsController::class, 'detailReview'])->name('detailReview')->middleware('auth');
Route::post('/detail-review/{id}', [ProductsController::class, 'postDetailReview'])->name('postDetailReview')->middleware('auth');
