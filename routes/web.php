<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlacesController;
use App\Http\Controllers\Admin\LockersController;
use App\Http\Controllers\Admin\ServicesController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


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
});