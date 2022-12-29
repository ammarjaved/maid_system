<?php


use App\Http\Controllers\ApiControllers\UpdateUserInfo;
use App\Http\Controllers\ApiControllers\UploadImages;
use App\Http\Controllers\ApiControllers\SalaryController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){

});


Route::post("/database/GetResults",[App\Http\Controllers\ApiControllers\DBController::class,'GetResults']);
Route::get('/test',[App\Http\Controllers\ApiControllers\LoginController::class,"test"]);
Route::post('/upload-maid-images',[UploadImages::class,"upload"]);
Route::post('/update-maid-info/{id}',[UpdateUserInfo::class,"updateMaid"]);
Route::post('/update-client-info/{id}',[UpdateUserInfo::class,"updateClient"]);
Route::post('/addsalary-maid',[SalaryController::class,"addSalaryInfo"]);

Route::post('/login',[App\Http\Controllers\ApiControllers\LoginController::class,"login"]);