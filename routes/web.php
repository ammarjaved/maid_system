<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\AssingMaid;
use App\Http\Controllers\Agency\AgencyController;
use App\Http\Controllers\Auth\ChangePassword;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Maid\MaidController;


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


    Route::resource('agency',AgencyController::class);

    Route::post('/maid-assign',[AssingMaid::class,"assign_maid"])->name("maid.assign");
    Route::view('/','client.create');

    Route::post('/un-assign',[AssingMaid::class,'unAssign'])->name("maid.unAssing");


    Route::view('/get-test','Client.test' );

});




Route::group(['prefix' => '/'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});



