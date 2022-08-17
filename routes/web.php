<?php

use App\Http\Controllers\Api\WalletController;
use App\Http\Livewire\AddBank;
use App\Http\Livewire\CreateWalletType;
use App\Http\Livewire\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ViewAssets;
use App\Http\Livewire\ViewWalletType;
use Illuminate\Support\Facades\Route;

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

Route::get('/', Login::class)->name('login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/create/wallet',[WalletController::class,'initWallet']);

// require __DIR__.'/auth.php';

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    // Route::get('/dashboard',  () {
    //     return view('dashboard');
    // })->middleware(['auth'])->name('dashboard');


    Route::get('/admin/home', Dashboard::class)->name('admin.home');
    Route::get('/admin/add/wallet', CreateWalletType::class)->name('admin.add.assets');
    Route::get('/admin/add/bank', AddBank::class)->name('admin.add.bank');
    Route::get('/admin/view/wallet/{id}', ViewAssets::class)->name('admin.view.assets');


});
