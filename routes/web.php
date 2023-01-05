<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\AssingMaid;
use App\Http\Controllers\Agency\AgencyController;
use App\Http\Controllers\Auth\ChangePassword;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Maid\MaidController;
use App\Http\Controllers\Client\MapBoundry;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\mailController;

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

// Route::get('/home', function () {
//     return view('index');
// })->middleware('auth')->name('home');

require __DIR__ . '/auth.php';


Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'superAdmin:agency'], function () {

    Route::get('/my-account/{name}',[AgencyController::class,'myAccount']);
    
    
    

    Route::resource('maid',MaidController::class);
    Route::resource('client',ClientController::class);
    Route::get('/get-geo-detail/{id}',[ClientController::class,'getGeo']);

    Route::get('/check-that-email-will-send-or-not',[mailController::class,'test']);

   



    //map routes
    // Route::get('/add-boundry/{username}',[MapBoundry::class,'create']);
    // Route::post('/add-client-boundary',[MapBoundry::class,'store']);
    // Route::get('/edit-boundry/{username}',[MapBoundry::class,'edit']);
    // Route::get('/get-boundary-layer/{id}',[MapBoundry::class,'getLayer']);
    // Route::post('/edit-client-boundary',[MapBoundry::class,'update']);
    Route::get('/show-boundary/{name}',[MapBoundry::class,'show']);
    Route::get('/show-all-boundry/{name}',[MapBoundry::class,'getAllBoundry']);


    
    Route::get('/get-address/{name}',[MapBoundry::class,'getAddress']);

    Route::post('/maid-assign',[AssingMaid::class,"assign_maid"])->name("maid.assign");
    Route::view('/','client.create');
    Route::post('/un-assign',[AssingMaid::class,'unAssign'])->name("maid.unAssing");

  
    Route::view('/get-test','Client.test' );

    Route::get('/dashboard',[DashboardController::class,'index']);


});
   
    Route::group(['middleware' => 'superAdmin:superAdmin'], function () {
        Route::resource('agency',AgencyController::class);
        Route::get('/change-password/{name}',[ChangePassword::class,'changePassword'] );
        Route::post('/new-password',[ChangePassword::class,'newPassword'] );

    });

   
    Route::get('/send-mail-for-change-password/{name}/{type}',[mailController::class,'sendMail']);

});

Route::post('/change-your-password/{token}',[ChangePassword::class,'changePasswordMail']);
Route::get('/change-my-password/{username}/{token}',[ChangePassword::class,'mailPasswordView']);






Route::group(['prefix' => '/'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});



