<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditPassword;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DataProdukController;
use App\Http\Controllers\Landing\LandingController;

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

// Auth::routes();



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/profile', UserController::class)->middleware('auth');
Route::resource('/produk', ProdukController::class)->middleware('auth')->except('create', 'show');
Route::get('/editpassword', [App\Http\Controllers\EditPassword::class, 'edit'])->name('editpassword')->middleware('auth');
Route::put('/update-pass', [App\Http\Controllers\EditPassword::class, 'updatePass'])->name('update-pass')->middleware('auth');
Route::get('/table', [App\Http\Controllers\UserController::class, 'table'])->name('table');
Route::get('/index', [App\Http\Controllers\ProdukController::class, 'index'])->name('index');
Route::get('/search', [ProdukController::class, 'search'])->name('search');

// landing
Route::delete('/destroy', [LandingController::class, 'destroy'])->name('landing.destroy');
Route::get('/semuaproduk/{slug}', [LandingController::class, 'semuaproduk'])->name('landing.semua');
Route::get('/kategori/{slug}', [LandingController::class, 'perkategori'])->name('landing.kategori');
Route::get('/detail/{slug}', [LandingController::class, 'detailproduk'])->name('produk.detail');
Route::get('/', [App\Http\Controllers\Landing\LandingController::class, 'index'])->name('landing');

Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori.index')->middleware('auth');
Route::post('/kategori-add', [App\Http\Controllers\KategoriController::class, 'addKategori'])->name('kategori.add')->middleware('auth');
Route::put('/kategori-update/{id}', [App\Http\Controllers\KategoriController::class, 'update'])->name('kategori.update')->middleware('auth');
Route::delete('/kategori-delete/{id}', [App\Http\Controllers\KategoriController::class, 'delkategori'])->name('kategori.delete')->middleware('auth');
