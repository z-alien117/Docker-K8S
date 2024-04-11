<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;


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

Route::view('/', 'index')->name('index');
Route::get('clients', [IndexController::class, 'clients_view'])->name('clients_view');
Route::get('products', [IndexController::class, 'products_view'])->name('products_view');
Route::get('invoices', [IndexController::class, 'invoices_view'])->name('invoices_view');

Auth::routes();
