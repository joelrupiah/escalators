<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceDescriptionController;
use App\Http\Controllers\EmailListingController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('admin')->group(function () {
    Route::post('/login', [AuthenticateController::class, 'login']);
    Route::post('/register', [AuthenticateController::class, 'register']);
});

Route::middleware('auth:api')->prefix('admin')->group(function () {
    Route::get('/user', function(Request $request){
        return $request->user();
    });

    Route::resource('contact', ContactController::class);
    Route::resource('service', ServiceController::class);

    Route::resource('servicedescription', ServiceDescriptionController::class);
    Route::get('/all-service-description', [ServiceDescriptionController::class, 'allServiceDescription']);
    Route::post('/update-service-description/{slug}', [ServiceDescriptionController::class, 'update']);

    Route::get('/show-service/{slug}', [ServiceController::class, 'show']);
    Route::post('/update-service/{slug}', [ServiceController::class, 'update']);
    Route::get('/all-service', [ServiceController::class, 'allService']);
    Route::post('/update-service/{id}', [ServiceController::class, 'update']);

    Route::get('/carousel-items', [CarouselController::class, 'getCarousels']);
    Route::get('/add-carousel', [CarouselController::class, 'addCarousel']);
    Route::get('/edit-carousel', [CarouselController::class, 'editCarousel']);

    Route::post('/send-email', [EmailListingController::class, 'sendEMail']);
    
    Route::post('/logout', [AuthenticateController::class, 'logout']);
    Route::post('/update-user', [AuthenticateController::class, 'updateAdminData']);

});

Route::post('/send-sms', [EmailListingController::class, 'sendSms']);

Route::get('get-service-descriptions/{serviceSlug}', [ServiceController::class, 'getServiceDescriptionsDetails']);

Route::get('get-all-services', [ServiceController::class, 'getAllServices']);
Route::post('subscribe', [EmailListingController::class, 'subscribe']);
Route::get('all-contacts', [ContactController::class, 'getAllContacts']);
Route::get('user-front-services', [ServiceController::class, 'frontServices']);

Route::prefix('admin')->group(function () {
    Route::get('/', function(){
        return view('admin.admin');
    });
});

Route::get('/', function(){
    return view('user.user');
});


Route::get('/{any}', function(){
    return view('user.user');
});

Route::get('/admin/{any}', function(){
    return view('admin.admin');
});

Route::get('/{any}/{path}', function(){
    return view('user.user');
});

Route::get('/admin/{any}/{path}', function(){
    return view('admin.admin');
});