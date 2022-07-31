<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
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
    // Route::post('users/update/profile', [SettingController::class,'updateProfilePics']);
    Route::post('users/update/picture', [SettingController::class,'updateProfilePics']);
    Route::post('users/change/password', [SettingController::class,'changePassword']);
    Route::post('users/update/info', [SettingController::class,'updateProfileInfo']);
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
    Route::post('auth/forgot-password', 'forgotPassword');
});
