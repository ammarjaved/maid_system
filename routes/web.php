<?php

use App\Http\Controllers\Admin\adminDashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\AssingMaid;
use App\Http\Controllers\Agency\AgencyController;
use App\Http\Controllers\Auth\ChangePassword;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Maid\MaidController;
use App\Http\Controllers\Client\MapBoundry;
use App\Http\Controllers\Agency\DashboardController;
use App\Http\Controllers\Client\SalaryController as ClientSalaryController;
use App\Http\Controllers\DownloadFile;
use App\Http\Controllers\mailController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ServerEventContoller;

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
    Route::view('/hehehe', 'Mail.resetPassword');
    Route::resource('maid', MaidController::class);
    Route::resource('client', ClientController::class);

   
        Route::get('/map-view', [MapController::class, 'index']);

        Route::get('/show-all-clients', [MapController::class, 'show']);

        Route::get('/get-maids-by-client/{id}',[MapController::class,'maidByClient']);
        Route::get('/ssee-by-client/{username}',[ServerEventContoller::class,'EventByCLient']);

        Route::get('/my-account/{name}', [AgencyController::class, 'myAccount']);

        
        Route::get('/get-geo-detail/{id}', [ClientController::class, 'getGeo']);

        Route::get('/ssee',[ServerEventContoller::class,'sse']);

        Route::get('/download-file/{file_name}/{type}',[DownloadFile::class,'download']);

        //map routes
        // Route::get('/add-boundry/{username}',[MapBoundry::class,'create']);
        // Route::post('/add-client-boundary',[MapBoundry::class,'store']);
        // Route::get('/edit-boundry/{username}',[MapBoundry::class,'edit']);
        Route::get('/get-boundary-layer/{user_name}',[MapBoundry::class,'getLayer']);
        // Route::post('/edit-client-boundary',[MapBoundry::class,'update']);


        Route::get('/show-boundary-map',[MapBoundry::class,'showAllBoundaries']);
        Route::get('/show-boundary/{name}', [MapBoundry::class, 'show']);
        Route::get('/show-all-boundry/{name}', [MapBoundry::class, 'getAllBoundry']);

        Route::get('/get-address/{name}', [MapBoundry::class, 'getAddress']);

        Route::post('/maid-assign', [AssingMaid::class, 'assign_maid'])->name('maid.assign');
        Route::view('/', 'client.create');
        Route::post('/un-assign', [AssingMaid::class, 'unAssign'])->name('maid.unAssing');

        Route::view('/get-test', 'Client.test');

        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/slaray-detail/{name}', [ClientSalaryController::class, 'show']);

        Route::get('/get-all-maid-locations',[MapController::class,'show']);
        Route::get('/get-all-maid-locations/{username}',[MapController::class,'maidByClient']);

        
   

    Route::group(['middleware' => 'superAdmin:superAdmin'], function () {
        Route::resource('agency', AgencyController::class);
        Route::get('/change-password/{name}', [ChangePassword::class, 'changePassword']);
        Route::post('/new-password', [ChangePassword::class, 'newPassword']);
        Route::get('/admin-dashboard', [adminDashboard::class, 'home']);
        Route::get('/get-health-expiry',[adminDashboard::class,'health_expiry']);
        Route::get('/get-visa-expiry',[adminDashboard::class,'visa_expiry']);
        Route::get('/get-offline-maids',[adminDashboard::class,'offline']);
    });

    Route::get('/send-mail-for-change-password/{name}/{type}', [mailController::class, 'sendMail']);
});

Route::post('/change-your-password/{token}', [ChangePassword::class, 'changePasswordMail']);
Route::get('/change-my-password/{username}/{token}', [ChangePassword::class, 'mailPasswordView']);

Route::group(['prefix' => '/'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});
