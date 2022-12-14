<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BankAndCardController;
use App\Http\Controllers\Api\MiscController as ApiMiscController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\WalletController;

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

        Route::controller(SettingController::class)->group(function () {
            Route::post('update/picture', 'updateProfilePics');
            Route::post('change/password', 'changePassword');
            Route::post('create/pin', 'createPin');
            Route::post('update/pin', 'updatePin');
            Route::post('update/security', 'toggle2fa');
            Route::post('update/info', 'updateProfileInfo');
        });


        Route::controller(BankAndCardController::class)->group(function () {
            Route::post('add/bank', 'addNewBank');
            Route::get('get/banks', 'getBanks');
        });
        Route::controller(TransactionController::class)->group(function () {
            Route::post('fund/wallet', 'fundWallet');
            Route::post('withdraw/funds', 'withdrawFunds');
            Route::post('create/listing', 'createListing');
            Route::get('get/available/listing', 'getListing');
            Route::post('upload/payment/receipt', 'uploadReceipt');
            Route::get('get/transactions', 'getTransactions');
            Route::get('get/withdrawals', 'getWithdrawals');
            Route::post('/create/trading','createTrading');
            Route::get('/get/trading/history','getTrading');
            Route::post('/cancel/trading','cancelTrading');
            Route::post('/complete/trading','completeTrading');
            Route::post('/appeal/trading','appealTrading');
            Route::post('/dispute/trading','disputeTrading');
            Route::post('/confirm/trading/payment','confirmTradingPayment');

        });

        Route::controller(WalletController::class)->group(function () {
            Route::get('/wallets','getWallets')->name('wallets');
            Route::get('get/balance/{id}','getBalance')->name('wallet.balance');
        });

    });


});

Route::controller(ApiMiscController::class)->group(function () {
    Route::get('get/admin/account', 'getAdminAccount');
    Route::get('get/wallet/types', 'getWalletType');
    Route::get('conversion/rate/{symbol}/{convert}/{amount}','getConversionRate');

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
