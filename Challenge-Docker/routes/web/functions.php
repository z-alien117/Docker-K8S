<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\InvoicesController;


Route::group(['prefix' => 'functions', 'as' => 'functions.'], function(){

    // Clients routes
    Route::get('clients_data', [ClientsController::class, 'index'])->name('clients_data');
    Route::get('clients/form', [ClientsController::class, 'create'])->name('clients_form');
    Route::post('clients', [ClientsController::class, 'store'])->name('store_client');
    Route::get('clients/{client}', [ClientsController::class, 'edit'])->name('edit_client');
    Route::put('clients/{client_update}', [ClientsController::class, 'update'])->name('update_client');
    Route::delete('clients/{client}', [ClientsController::class, 'destroy'])->name('delete_client');

    // Products routes
    Route::get('products_data', [ProductsController::class, 'index'])->name('products_data');
    Route::get('products/form', [ProductsController::class, 'create'])->name('products_form');
    Route::post('products', [ProductsController::class, 'store'])->name('store_product');
    Route::get('products/{product}', [ProductsController::class, 'edit'])->name('edit_product');
    Route::put('products/{product_update}', [ProductsController::class, 'update'])->name('update_product');
    Route::delete('products/{product}', [ProductsController::class, 'destroy'])->name('delete_product');

    // Invoices routes
    Route::get('invoice_data', [InvoicesController::class, 'index'])->name('invoice_data');
    Route::get('products_invoice_data/{invoice}', [InvoicesController::class, 'products_invoice_data'])->name('products_invoice_data');
    Route::get('invoices/form', [InvoicesController::class, 'create'])->name('invoices_form');
    Route::post('invoices', [InvoicesController::class, 'store'])->name('store_invoice');
    Route::post('invoice_product/{invoice}', [InvoicesController::class, 'store_invoice_product'])->name('store_invoice_product');
    Route::get('invoices/{invoice}', [InvoicesController::class, 'edit'])->name('edit_invoice');
    Route::put('invoices/{invoice}', [InvoicesController::class, 'update'])->name('update_invoice');
    Route::delete('invoices/{invoice}', [InvoicesController::class, 'destroy'])->name('delete_invoice');
    Route::delete('invoice_product,{invoice_product}', [InvoicesController::class, 'destroy_invoice_product'])->name('destroy_invoice_product');





});