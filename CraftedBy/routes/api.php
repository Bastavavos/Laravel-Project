<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BusinessController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


//Users
Route::group(['middleware'=>'auth:sanctum'], function () {
Route::apiResource('user', UserController::class);
});

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout']);

Route::get('users',[UserController::class,'index']);
Route::get('users/{id}',[UserController::class,'show']);
Route::delete('users/{id}',[UserController::class,'destroy']);
Route::put('users/{id}',[UserController::class,'update']);

//Products
Route::apiResource('product', ProductController::class);
Route::get('products',[ProductController::class,'index']);
Route::get('products/{id}',[ProductController::class,'show']);
Route::post('products',[ProductController::class,'store']);
Route::delete('products/{id}',[ProductController::class,'destroy']);
Route::put('products/{id}',[ProductController::class,'update']);

//Businesses
Route::apiResource('business', BusinessController::class);
Route::get('business',[BusinessController::class,'index']);
Route::get('business/{id}',[BusinessController::class,'show']);
Route::post('business',[BusinessController::class,'store']);
Route::delete('business/{id}',[BusinessController::class,'destroy']);
Route::put('business/{id}',[BusinessController::class,'update']);

//Invoices
Route::apiResource('invoice', InvoiceController::class);
Route::get('invoices',[InvoiceController::class,'index']);
Route::get('invoices/{id}',[InvoiceController::class,'show']);
Route::post('invoices',[InvoiceController::class,'store']);
Route::delete('invoices/{id}',[InvoiceController::class,'destroy']);
Route::put('invoices/{id}',[InvoiceController::class,'update']);
