<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ClothesController;
use App\Http\Controllers\API\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public routes
Route::get('/clothes', [ClothesController::class, 'index']);
Route::get('/clothes/{hexa}', [ClothesController::class, 'show']);
Route::get('/clothes/search/{hexa}', [ClothesController::class, 'search']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


//Protected Routes
Route::group(['middleware' => ['auth:sanctum', 'verified', 'isAdmin']], function () {
    Route::post('/clothes', [ClothesController::class, 'store']);
    Route::put('/clothes/{hexa}', [ClothesController::class, 'update']);
    Route::delete('/clothes/{hexa}', [ClothesController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customer/search/{id}', [CustomerController::class, 'customerSearch']);
});