<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BankAndCardController;
use App\Http\Controllers\Api\SettingController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    // Route::post('users/update/profile', 'updateProfilePics']);
    Route::prefix('users')->group(function () {

        Route::controller(AuthController::class)->group(function () {
            Route::post('update/picture', 'updateProfilePics');
            Route::post('change/password', 'changePassword');
            Route::post('create/pin', 'createPin');
            Route::post('update/pin', 'updatePin');
            Route::post('update/security', 'toggle2fa');
            Route::post('update/info', 'updateProfileInfo');
        });
        Route::controller(BankAndCardController::class)->group(function () {
            Route::post('users/add/bank', 'updateProfilePics');
        });
    });


});


Route::controller(AuthController::class)->group(function () {
    Route::post('auth/login', 'login');
    Route::post('auth/register', 'register');
    Route::post('confirm/email', 'confirmEmail');
    Route::post('verify/email', 'verifyEmail');
    Route::post('confirm/mobile', 'confirmMobile');
    Route::post('verify/mobile', 'verifyMobile');
    Route::post('check/email', 'checkEmail');
    Route::post('check/username', 'checkUsername');
    Route::post('auth/reset/password', 'resetPassword');
});
