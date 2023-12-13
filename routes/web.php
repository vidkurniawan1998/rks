<?php

use App\Http\Controllers\LimittransaksiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogtransaksiController;
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



Route::get('/', function () {
    return view('welcome');
});

//Route Limit Transaksi
Route::prefix('limittransaksi')->name('limittransaksi.')->group(function () {
    Route::get('/list', [LimittransaksiController::class, 'index'])->name('list');
    Route::get('/entries_limit_transaksi', [LimittransaksiController::class, 'entries_limit_transaksi'])->name('entries');
    Route::get('/cari_limit_transaksi', [LimittransaksiController::class, 'search_limit_transaksi'])->name('search');
    Route::get('/filter_limit_transaksi', [LimittransaksiController::class, 'filter_limit_transaksi'])->name('filter');
    Route::post('/process_limit_transaksi', [LimittransaksiController::class, 'store_limit_transaksi'])->name('store_limit_transaksi');
    Route::get('/edit_limit_transaksi/{id}', [LimittransaksiController::class, 'show_limit_transaksi'])->name('show_limit_transaksi');
    Route::post('/update_limit_transaksi/{id}', [LimittransaksiController::class, 'update_limit_transaksi'])->name('update_limit_transaksi');
    Route::get('/delete_limit_transaksi/{id}', [LimittransaksiController::class, 'delete_limit_transaksi'])->name('delete_limit_transaksi');
    Route::get('/data_limit', [LimittransaksiController::class, 'view_data_limit'])->name('data_limit');
    Route::get('/entries_data_limit', [LimittransaksiController::class, 'entries_data_limit'])->name('datalimit_entries');
    Route::get('/cari_data_limit', [LimittransaksiController::class, 'search_data_limit'])->name('datalimit_search');
    Route::post('/process_import_data_limit', [LimittransaksiController::class, 'store_data_limit_2'])->name('store_data_limit');
    Route::get('/process_export_data_limit', [LimittransaksiController::class, 'download_data_limit_2'])->name('download_data_limit');
    // Route::post('/process_data_limit', [LimittransaksiController::class, 'store_data_limit'])->name('store_data_limit');
});

Route::prefix('rks')->name('rks.')->group(function () {
    Route::get('/login', [UserController::class, 'view_login'])->name('login');
    Route::post('/process_login', [UserController::class, 'process_login'])->name('process_login');
    Route::get('/dashboard', [UserController::class, 'view_dashboard'])->name('dashboard');
    Route::get('/log_transaksi', [LogtransaksiController::class, 'view_log_transaksi'])->name('log_transaksi');
    Route::get('/log_transaksi/filter', [LogtransaksiController::class, 'filter_log_transaksi'])->name('filter_log_transaksi');
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/entries_product', [ProductController::class, 'entries_product'])->name('product_entries');
    Route::get('/search_product', [ProductController::class, 'search_product'])->name('product_search');
    Route::get('/process_logout', [UserController::class, 'process_logout'])->name('process_logout');
});
