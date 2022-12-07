<?php

use App\Http\Controllers\ApiControllers\DBController;
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

Route::post('/login',[App\Http\Controllers\ApiControllers\LoginController::class,"login"]);
Route::post("/database/GetResults",[App\Http\Controllers\ApiControllers\DBController::class,'GetResults']);
Route::get("/check",[App\Http\Controllers\ApiControllers\DBController::class,'check']);
