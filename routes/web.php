<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoprController;
use App\Http\Controllers\ProductDeterminationController;
use App\Http\Controllers\SoprOrderProductController;
use App\Http\Controllers\SoprProductDeterminationController;

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

Route::resource('sopr', SoprController::class);
Route::resource('product_determinations', ProductDeterminationController::class);
Route::resource('sopr_order_products', SoprOrderProductController::class);
Route::resource('sopr_product_determinations', SoprProductDeterminationController::class);
Route::get('/get-type/{id}', 'SoprProductDeterminationController@getType');