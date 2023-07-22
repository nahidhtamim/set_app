<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ClothesController;
use App\Http\Controllers\API\ClothGroupController;
use App\Http\Controllers\API\ClothTypeController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\FabricController;
use App\Http\Controllers\API\LaundryController;
use App\Http\Controllers\API\ServiceCycleStatusController;
use App\Http\Controllers\API\SportsWearController;
use App\Http\Controllers\API\WashingProgramController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


//Protected Routes
Route::group(['middleware' => ['auth:sanctum', 'verified', 'isAdmin']], function () {
    

    //Clothes API
    Route::get('/clothes', [ClothesController::class, 'index']);
    Route::get('/search-cloth/{id}', [ClothesController::class, 'search']);
    Route::post('/store-cloth', [ClothesController::class, 'store']);
    Route::post('/update-cloth/{id}', [ClothesController::class, 'update']);
    Route::post('/update-cloth-service-status/{id}', [ClothesController::class, 'updateServiceCycleStatus']);
    Route::get('/delete-cloth/{id}', [ClothesController::class, 'delete']);

    //Cloth Types API
    Route::get('/cloth-types', [ClothTypeController::class, 'index']);
    Route::post('/store-cloth-type', [ClothTypeController::class, 'store']);
    Route::post('/update-cloth-type/{id}', [ClothTypeController::class, 'update']);

    //Cloth Groups API
    Route::get('/cloth-groups', [ClothGroupController::class, 'index']);
    Route::post('/store-cloth-group', [ClothGroupController::class, 'store']);
    Route::post('/update-cloth-group/{id}', [ClothGroupController::class, 'update']);

    //Fabrics API
    Route::get('/fabrics', [FabricController::class, 'index']);
    Route::post('/store-fabric', [FabricController::class, 'store']);
    Route::post('/update-fabric/{id}', [FabricController::class, 'update']);

    //Sportswears API
    Route::get('/sportswears', [SportsWearController::class, 'index']);
    Route::post('/store-sportswear', [SportsWearController::class, 'store']);
    Route::post('/update-sportswear/{id}', [SportsWearController::class, 'update']);
    
    //Washing Program API
    Route::get('/washing-program', [WashingProgramController::class, 'index']);
    Route::post('/store-washing-program', [WashingProgramController::class, 'store']);
    Route::post('/update-washing-program/{id}', [WashingProgramController::class, 'update']);

    //Laundry API
    Route::get('/laundries', [LaundryController::class, 'index']);
    Route::get('/search-laundry/{id}', [LaundryController::class, 'search']);
    Route::post('/store-laundry', [LaundryController::class, 'store']);
    Route::post('/update-laundry/{id}', [LaundryController::class, 'update']);
    Route::post('/update-laundry-service-status/{id}', [LaundryController::class, 'updateLaundryServiceCycleStatus']);
    Route::get('/delete-laundry/{id}', [LaundryController::class, 'delete']);

    //Service Cycle Status API
    Route::get('/service-cycle-locations', [ServiceCycleStatusController::class, 'index']);

    //customer api
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customer/search/{id}', [CustomerController::class, 'customerSearch']);
    Route::post('/logout', [AuthController::class, 'logout']);
});