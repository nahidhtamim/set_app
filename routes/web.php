<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\PlacesController;
use App\Http\Controllers\Admin\SportsController;
use App\Http\Controllers\Admin\LockersController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\PlaceLockersController;
use App\Http\Controllers\Admin\PlaceServicesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/services', [ServicesController::class, 'index']);

Route::get('/', [FrontendController::class, 'index']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/service/{id}', [FrontendController::class, 'service']);
Route::get('/order-form', [FrontendController::class, 'orderForm']);

Auth::routes();

Route::get('/order-form/{id}', [HomeController::class, 'orderForm']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('getServices',[HomeController::class,'getServices'])->name('getServices');
Route::post('getLockers',[HomeController::class,'getLockers'])->name('getLockers');

Route::group(['middleware' => ['auth','isAdmin']], function () {

   Route::get('/dashboard', function () {
      return view('admin.dashboard');
   });

   // Services Routes
   Route::get('/services', [ServicesController::class, 'index']);
   Route::get('/add-service', [ServicesController::class, 'addService']);
   Route::post('/save-service', [ServicesController::class, 'saveService']);
   Route::get('/edit-service/{id}', [ServicesController::class, 'editService']);
   Route::post('/update-service/{id}', [ServicesController::class, 'updateService']);
   Route::get('/delete-service/{id}', [ServicesController::class, 'deleteService']);


   // Places Routes
   Route::get('/places', [PlacesController::class, 'index']);
   Route::get('/add-place', [PlacesController::class, 'addPlace']);
   Route::post('/save-place', [PlacesController::class, 'savePlace']);
   Route::get('/edit-place/{id}', [PlacesController::class, 'editPlace']);
   Route::post('/update-place/{id}', [PlacesController::class, 'updatePlace']);
   Route::get('/delete-place/{id}', [PlacesController::class, 'deletePlace']);

   // Lockers Routes
   Route::get('/lockers', [LockersController::class, 'index']);
   Route::get('/add-locker', [LockersController::class, 'addLocker']);
   Route::post('/save-locker', [LockersController::class, 'saveLocker']);
   Route::get('/edit-locker/{id}', [LockersController::class, 'editLocker']);
   Route::post('/update-locker/{id}', [LockersController::class, 'updateLocker']);
   Route::get('/delete-locker/{id}', [LockersController::class, 'deleteLocker']);

   // Sports Routes
   Route::get('/sports', [SportsController::class, 'index']);
   Route::get('/add-sport', [SportsController::class, 'addSport']);
   Route::post('/save-sport', [SportsController::class, 'saveSport']);
   Route::get('/edit-sport/{id}', [SportsController::class, 'editSport']);
   Route::post('/update-sport/{id}', [SportsController::class, 'updateSport']);
   Route::get('/delete-sport/{id}', [SportsController::class, 'deleteSport']);

   // Place Lockers Routes
   Route::get('/place-services', [PlaceServicesController::class, 'index']);
   Route::get('/add-place-service', [PlaceServicesController::class, 'addPlaceService']);
   Route::post('/save-place-service', [PlaceServicesController::class, 'savePlaceService']);
   Route::get('/edit-place-service/{id}', [PlaceServicesController::class, 'editPlaceService']);
   Route::post('/update-place-service/{id}', [PlaceServicesController::class, 'updatePlaceService']);
   Route::get('/delete-place-service/{id}', [PlaceServicesController::class, 'deletePlaceService']);

   // Place Lockers Routes
   Route::get('/place-lockers', [PlaceLockersController::class, 'index']);
   Route::get('/add-place-locker', [PlaceLockersController::class, 'addPlaceLocker']);
   Route::post('/save-place-locker', [PlaceLockersController::class, 'savePlaceLocker']);
   Route::get('/edit-place-locker/{id}', [PlaceLockersController::class, 'editPlaceLocker']);
   Route::post('/update-place-locker/{id}', [PlaceLockersController::class, 'updatePlaceLocker']);
   Route::get('/delete-place-locker/{id}', [PlaceLockersController::class, 'deletePlaceLocker']);
   Route::post('getPlaceServices',[PlaceLockersController::class,'getPlaceServices'])->name('getPlaceServices');


});