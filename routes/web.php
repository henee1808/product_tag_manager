<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\Rulecontroller;

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

Route::get('/product-list', [ProductController::class, 'productList']);
Route::get('/add-product/{id}', [ProductController::class, 'addProduct']);
Route::post('/store-product/{id}', [ProductController::class, 'storeProduct']);
Route::delete('/product/{id}', [ProductController::class, 'deleteProduct']);

Route::get('/view-product-list/{id}', [ProductController::class, 'viewProductList']);

Route::get('/rule-list', [Rulecontroller::class, 'ruleList']);
Route::get('/add-rule/{id}', [Rulecontroller::class, 'addRule']);
Route::post('/store-rule/{id}', [Rulecontroller::class, 'storeRule']);
Route::delete('/rule/{id}', [Rulecontroller::class, 'deleteRule']);

Route::get('/view-rule-list/{id}', [Rulecontroller::class, 'viewRuleList']);

Route::get('/apply-rules/{id}', [RuleController::class, 'applyRule']);