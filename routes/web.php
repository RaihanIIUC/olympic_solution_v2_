<?php

use App\Http\Controllers\QueryController;
use App\Http\Controllers\UploadFailedController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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

Route::any('/', [UploadFailedController::class, 'FailedIndex'])->middleware('auth');
Route::post('/download', [QueryController::class, 'queryByDate'])->name('download');


Route::get('/repush/{smsid}', [UploadFailedController::class, 'updateFailedSms'])->name('repush');
Route::get('/repush_all', [UploadFailedController::class, 'updateFailedSmsAll'])->name('repush_all');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pullnow',[App\Http\Controllers\PendingSmsController::class,'pending_sms'])->name('pending_sms');

Route::get('/clear', function() {

   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');

   return "Cleared!";

});

Route::get('/oly', function() {

    Artisan::call('throwTo:update');
  
   return "runed!";

});

