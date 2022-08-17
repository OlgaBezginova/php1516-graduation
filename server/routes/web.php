<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth')->group(function() {
    Route::get('/', [MainController::class, 'index'])->name('home');

    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('list');
        Route::get('/{id}', [OrderController::class, 'view'])->name('order');
        Route::get('/add', [OrderController::class, 'add'])->name('add');
        Route::get('/{id}/update', [OrderController::class, 'update'])->name('update');
        Route::put('/', [OrderController::class, 'create'])->name('create');
        Route::post('/{id}', [OrderController::class, 'edit'])->name('edit');
        Route::delete('/{id}', [OrderController::class, 'delete'])->name('delete');
    });

    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('list');
        Route::get('/{id}', [ProductController::class, 'view'])->name('product');
        Route::get('/add', [ProductController::class, 'add'])->name('add');
        Route::get('/{id}/update', [ProductController::class, 'update'])->name('update');
        Route::put('/', [ProductController::class, 'create'])->name('create');
        Route::post('/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::delete('/{id}', [ProductController::class, 'delete'])->name('delete');
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('list');
        Route::get('/{id}', [UserController::class, 'view'])->name('user');
        Route::get('/add', [UserController::class, 'add'])->name('add');
        Route::get('/{id}/update', [UserController::class, 'update'])->name('update');
        Route::put('/', [UserController::class, 'create'])->name('create');
        Route::post('/{id}', [UserController::class, 'edit'])->name('edit');
        Route::delete('/{id}', [UserController::class, 'delete'])->name('delete');
    });

    Route::prefix('admins')->name('admins.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('list');
        Route::get('/{id}', [AdminController::class, 'view'])->name('admin');
        Route::get('/add', [AdminController::class, 'add'])->name('add');
        Route::get('/{id}/update', [AdminController::class, 'update'])->name('update');
        Route::put('/', [AdminController::class, 'create'])->name('create');
        Route::post('/{id}', [AdminController::class, 'edit'])->name('edit');
        Route::delete('/{id}', [AdminController::class, 'delete'])->name('delete');
    });
});

Route::get('login', [AuthController::class, 'login'])->name('login-page');
Route::post('login', [AuthController::class, 'auth'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'register'])->name('register-page');
Route::post('register', [AuthController::class, 'store'])->name('register');

Route::get('/verify', [AuthController::class, 'verify'])->name('verify');
