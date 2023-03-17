<?php

use App\Http\Controllers\Admin\ClothesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PlacesController;
use App\Http\Controllers\Admin\SportsController;
use App\Http\Controllers\Admin\LockersController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PlaceLockersController;
use App\Http\Controllers\Admin\PlaceServicesController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
Route::post('/email', [MailController::class, 'sendEmail'])->name('contact.send');

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Auth::routes();

Route::group(['middleware' => ['auth','verified']], function () {

   Route::get('/home', [HomeController::class, 'index'])->name('home');
   Route::get('/status', [HomeController::class, 'status'])->name('status');
   Route::get('/status/update', [HomeController::class, 'updateStatus'])->name('users.update.status');

   Route::get('/my-profile', [HomeController::class, 'myProfile'])->name('my-profile');
   Route::post('/update-details', [HomeController::class, 'updateDetails']);
   Route::post('/update-password', [HomeController::class, 'updatePassword']);

   Route::get('/my-orders', [HomeController::class, 'myOrders'])->name('my-orders');
   Route::get('/order-form', [HomeController::class, 'orderForm']);
   Route::post('/save-order', [HomeController::class, 'saveOrder']);
   Route::get('/request-closing/{id}', [HomeController::class, 'requestClosing']);

   Route::post('getServices',[HomeController::class,'getServices'])->name('getServices');
   Route::post('getLockers',[HomeController::class,'getLockers'])->name('getLockers');
   Route::post('getInfo',[HomeController::class,'getInfo'])->name('getInfo');

});

Route::group(['middleware' => ['auth','isAdmin','verified']], function () {

   Route::get('/dashboard', [DashboardController::class, 'index']);

   // Services Routes
   Route::get('/services', [ServicesController::class, 'index']);
   Route::get('/add-service', [ServicesController::class, 'addService']);
   Route::post('/save-service', [ServicesController::class, 'saveService']);
   Route::get('/edit-service/{id}', [ServicesController::class, 'editService']);
   Route::post('/update-service/{id}', [ServicesController::class, 'updateService']);
   Route::get('/delete-service/{id}', [ServicesController::class, 'deleteService']);
   Route::get('/service-active/{id}', [ServicesController::class, 'active']);
   Route::get('/service-deactive/{id}', [ServicesController::class, 'deactive']);

   // Clothes Routes
   Route::get('/clothes', [ClothesController::class, 'index']);
   Route::get('/add-cloth', [ClothesController::class, 'addCloth']);
   Route::post('/save-cloth', [ClothesController::class, 'saveCloth']);
   Route::get('/edit-cloth/{id}', [ClothesController::class, 'editCloth']);
   Route::post('/update-cloth/{id}', [ClothesController::class, 'updateCloth']);
   Route::get('/delete-cloth/{id}', [ClothesController::class, 'deleteCloth']);
   Route::post('getCustomerOrders',[ClothesController::class,'getCustomerOrders'])->name('getCustomerOrders');
   // Route::get('/service-active/{id}', [ServicesController::class, 'active']);
   // Route::get('/service-deactive/{id}', [ServicesController::class, 'deactive']);

   // Places Routes
   Route::get('/places', [PlacesController::class, 'index']);
   Route::get('/add-place', [PlacesController::class, 'addPlace']);
   Route::post('/save-place', [PlacesController::class, 'savePlace']);
   Route::get('/edit-place/{id}', [PlacesController::class, 'editPlace']);
   Route::post('/update-place/{id}', [PlacesController::class, 'updatePlace']);
   Route::get('/delete-place/{id}', [PlacesController::class, 'deletePlace']);
   Route::get('/place-active/{id}', [PlacesController::class, 'active']);
   Route::get('/place-deactive/{id}', [PlacesController::class, 'deactive']);

   // Lockers Routes
   Route::get('/lockers', [LockersController::class, 'index']);
   Route::get('/add-locker', [LockersController::class, 'addLocker']);
   Route::post('/save-locker', [LockersController::class, 'saveLocker']);
   Route::get('/edit-locker/{id}', [LockersController::class, 'editLocker']);
   Route::post('/update-locker/{id}', [LockersController::class, 'updateLocker']);
   Route::get('/delete-locker/{id}', [LockersController::class, 'deleteLocker']);
   Route::get('/locker-active/{id}', [LockersController::class, 'active']);
   Route::get('/locker-deactive/{id}', [LockersController::class, 'deactive']);

   // Sports Routes
   Route::get('/sports', [SportsController::class, 'index']);
   Route::get('/add-sport', [SportsController::class, 'addSport']);
   Route::post('/save-sport', [SportsController::class, 'saveSport']);
   Route::get('/edit-sport/{id}', [SportsController::class, 'editSport']);
   Route::post('/update-sport/{id}', [SportsController::class, 'updateSport']);
   Route::get('/delete-sport/{id}', [SportsController::class, 'deleteSport']);
   Route::get('/sport-active/{id}', [SportsController::class, 'active']);
   Route::get('/sport-deactive/{id}', [SportsController::class, 'deactive']);

   // Place Lockers Routes
   Route::get('/place-services', [PlaceServicesController::class, 'index']);
   Route::get('/add-place-service', [PlaceServicesController::class, 'addPlaceService']);
   Route::post('/save-place-service', [PlaceServicesController::class, 'savePlaceService']);
   Route::get('/edit-place-service/{id}', [PlaceServicesController::class, 'editPlaceService']);
   Route::post('/update-place-service/{id}', [PlaceServicesController::class, 'updatePlaceService']);
   Route::get('/delete-place-service/{id}', [PlaceServicesController::class, 'deletePlaceService']);
   Route::get('/place-service-active/{id}', [PlaceServicesController::class, 'active']);
   Route::get('/place-service-deactive/{id}', [PlaceServicesController::class, 'deactive']);

   // Place Lockers Routes
   Route::get('/place-lockers', [PlaceLockersController::class, 'index']);
   Route::get('/add-place-locker', [PlaceLockersController::class, 'addPlaceLocker']);
   Route::post('/save-place-locker', [PlaceLockersController::class, 'savePlaceLocker']);
   Route::get('/edit-place-locker/{id}', [PlaceLockersController::class, 'editPlaceLocker']);
   Route::post('/update-place-locker/{id}', [PlaceLockersController::class, 'updatePlaceLocker']);
   Route::get('/delete-place-locker/{id}', [PlaceLockersController::class, 'deletePlaceLocker']);
   Route::post('getPlaceServices',[PlaceLockersController::class,'getPlaceServices'])->name('getPlaceServices');
   Route::get('/place-locker-active/{id}', [PlaceLockersController::class, 'active']);
   Route::get('/place-locker-deactive/{id}', [PlaceLockersController::class, 'deactive']);

   // Orders Routes
   Route::get('/orders', [OrderController::class, 'index']);
   Route::get('/edit-order/{id}', [OrderController::class, 'editOrder']);
   Route::post('/update-order/{id}', [OrderController::class, 'updateOrder']);
   Route::get('/closing-request/{id}', [OrderController::class, 'closingRequest']);
   Route::get('/order-active/{id}', [OrderController::class, 'orderActive']);
   Route::get('/order-close/{id}', [OrderController::class, 'orderClose']);
   Route::get('/delete-order/{id}', [OrderController::class, 'deleteOrder']);

   // Users Routes
   Route::get('/users', [UserController::class, 'index']);
   Route::get('/edit-user/{id}', [UserController::class, 'editUser']);
   Route::post('/update-user/{id}', [UserController::class, 'updateUser']);
   Route::post('/update-password/{id}', [UserController::class, 'updatePassword']);
   Route::get('/user-active/{id}', [UserController::class, 'active']);
   Route::get('/user-deactive/{id}', [UserController::class, 'deactive']);

   // Payments Routes
   Route::get('/order-payments/{id}', [PaymentController::class, 'index']);
   Route::post('/save-payment', [PaymentController::class, 'savePayment']);
   Route::get('/payment-details/{id}', [PaymentController::class, 'paymentDetails']);
   Route::get('/edit-payment/{id}', [PaymentController::class, 'editPayment']);
   Route::post('/update-payment/{id}', [PaymentController::class, 'updatePayment']);
   Route::get('/delete-payment/{id}', [PaymentController::class, 'deletePayment']);

   // Users Routes
   Route::get('/notifications', [NotificationController::class, 'index']); 
   Route::get('read-status/{id}', [NotificationController::class, 'readStatus']);
   Route::get('delete-status/{id}', [NotificationController::class, 'deleteStatus']);
});



//verifying email
Route::get('/email/verify', function () {
   return view('auth.verify');
})->middleware('auth')->name('verification.notice');

//sending verification email
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
   $request->fulfill();

   return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

//re-sending verification email
Route::post('/email/verification-notification', function (Request $request) {
   $request->user()->sendEmailVerificationNotification();

   return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
