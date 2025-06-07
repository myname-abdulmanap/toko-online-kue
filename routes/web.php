<?php

use App\Http\Controllers\ListProductController;
use App\Http\Controllers\ProductController;
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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'beranda'])->name('beranda');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact.index');
Route::get('/category', [App\Http\Controllers\HomeController::class, 'category'])->name('category.index');
Route::get('/testemoni', [App\Http\Controllers\HomeController::class, 'testemoni'])->name('testemoni.index');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about.index');

Route::resource('admin/user', UserController::class);
Route::resource('admin/products', ProductController::class);

Route::get('/product/satuan', [ListProductController::class, 'satuan'])->name('product.Satuan');
Route::get('/product/paketan', [ListProductController::class, 'paketan'])->name('product.Paketan');
Route::get('/product', [ListProductController::class, 'index'])->name('product.list');
Route::get('/product/{id}', [ListProductController::class, 'show'])->name('product.show');

