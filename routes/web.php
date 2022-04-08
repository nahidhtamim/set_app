<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
});