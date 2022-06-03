<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TwoFAController;

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

Route::get('/', function () {
    return view('welcome');
});

 
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('2fa');
Route::get('2fa', [TwoFAController::class, 'index'])->name('2fa.index');
Route::post('2fa', [TwoFAController::class, 'store'])->name('2fa.post');
Route::get('2fa/reset', [TwoFAController::class, 'resend'])->name('2fa.resend');
Route::post('logout', [TwoFAController::class, 'logout'])->name('logout');

