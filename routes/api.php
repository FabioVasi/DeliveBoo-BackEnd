<?php

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\UserController;

use App\Http\Controllers\Api\TypeController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/restaurants', [UserController::class, 'index']);
Route::get('/restaurants/filter', [UserController::class, 'filterByType']);
Route::get('/restaurants/user/{user:slug}', [UserController::class, 'show']);

Route::get('types', [TypeController::class, 'index']);
Route::get('types/{type:slug}', [TypeController::class, 'show']);

Route::post('/orders', [OrderController::class, 'GetOrder']);
Route::get('/generate', [OrderController::class, 'Generate']);
Route::post('/payment', [OrderController::class, 'MakePayment']);
