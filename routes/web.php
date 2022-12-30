<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\AssingMaid;
use App\Http\Controllers\Agency\AgencyController;
use App\Http\Controllers\Auth\ChangePassword;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Maid\MaidController;
use App\Http\Controllers\Client\MapBoundry;


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
    Route::get('/my-account/{name}',[AgencyController::class,'myAccount']);
    Route::get('/my-account/edit/{name}',[AgencyController::class,'edit']);
    
    
    Route::get('/change-password/{name}',[ChangePassword::class,'changePassword'] );
    Route::post('/new-password',[ChangePassword::class,'newPassword'] );

    Route::resource('maid',MaidController::class);
    Route::resource('client',ClientController::class);
    Route::get('/get-geo-detail/{id}',[ClientController::class,'getGeo']);
    Route::get('/add-boundry/{username}',[MapBoundry::class,'create']);
    Route::post('/add-client-boundary',[MapBoundry::class,'store']);
    Route::get('/edit-boundry/{username}',[MapBoundry::class,'edit']);
    Route::get('/get-boundary-layer/{id}',[MapBoundry::class,'getLayer']);
    Route::post('/edit-client-boundary',[MapBoundry::class,'update']);
    Route::get('/show-boundary/{name}',[MapBoundry::class,'show']);
    Route::get('/show-all-boundry/{name}',[MapBoundry::class,'getAllBoundry']);



    Route::get('/get-address/{name}',[MapBoundry::class,'getAddress']);

    // Route::post('/update-boundry',[MapBoundry::class,'update']);
    // Route::get('/remove-boundry/{id}',[MapBoundry::class,'destroy']);


    Route::resource('agency',AgencyController::class);

    Route::post('/maid-assign',[AssingMaid::class,"assign_maid"])->name("maid.assign");
    Route::view('/','client.create');

    Route::post('/un-assign',[AssingMaid::class,'unAssign'])->name("maid.unAssing");


    Route::view('/get-test','Client.test' );

    Route::view('/dashboard','Dashboards.Agency-dashboard');

});




Route::group(['prefix' => '/'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});



