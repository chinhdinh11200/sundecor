<?php

use Illuminate\Support\Facades\Route;
// backend
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
//fontend
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SupporterController;
use App\Http\Controllers\VideoController;

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

Route::group(['prefix'=> 'admin','as' => 'admin.'],function(){
    Route::get('/', [AdminController::class, 'index'])->name('quantri');

    Route::resource('supporter', SupporterController::class);
    
    Route::resource('video', VideoController::class);

///////GET-POST: URL - ACTION//////

    Route::resource('news', NewsController::class);
    Route::resource('product', ProductController::class);
    // Route::resource('user', 'UserAdminController');

    // Route::post('/user/{id}', 'UserAdminController@update');
});
Route::group(['prefix'=> '','as' => ''],function(){
    Route::get('/', [FrontendController::class, 'index'])->name('web');
    // Route::get('news/{id?}', 'FrontendController@news')->name('news');
});
