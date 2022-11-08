<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MaidController;


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

    Route::resource('agency',AgencyController::class)->middleware(['middleware' => 'superAdmin']);
    Route::get('/my-account/{name}',[AgencyController::class,'myAccount']);

    Route::resource('maid',MaidController::class);
    Route::resource('client',ClientController::class);
    Route::post('/maid-assign',[MaidController::class,"assign_maid"])->name("maid.assign");
    Route::view('/','client.create');

});




Route::group(['prefix' => '/'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});



