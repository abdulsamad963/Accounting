<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;

use App\Http\Controllers\CustomerController;

use App\Http\Controllers\PurchaseController;
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
    return view('welcome');



});
Route::resource('/category',CategoryController::class);
Route::resource('/product',ProductController::class);
Route::resource('/product_bay',ProductController::class);
Route::resource('/invoice',InvoiceController::class);

// Route::patch('product/updateProductQuantity/{id}', 'ProductController@updateProductQuantity')->name('product.updateProductQuantity');


Route::patch('productsss/updateProductQuantity/{id}', [ProductController::class, 'updateProductQuantity'])->name('productsss.updateProductQuantity');

Route::get('/categories', 'App\Http\Controllers\CategoryController@index2')->name('categories.index2');

Route::get('/categories/{categoryId}/products', 'App\Http\Controllers\CategoryController@showProducts')->name('categories.products');
Route::get('/productss/invoice', [ProductController::class, 'invoice'])->name('productss.invoice');
Route::resource('/customers',CustomerController::class);
Route::resource('/purchasess',PurchaseController::class);
Route::post('customers/{id}/purchases', 'PurchaseController@store')->name('customers.purchase.store');
Route::get('/back', function () {
    return view('welcome');


    Route::delete('/invoice/{id}', 'InvoiceController@destroy')->name('invoice.destroy');


});
