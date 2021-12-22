<?php

use Illuminate\Support\Facades\Route;
// backend
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Menu1Controller;
use App\Http\Controllers\Menu2Controller;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BillController;
//fontend
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SupporterController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CommonlController;
use App\Models\Product;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class , 'index'])->name('quantri');

    Route::resource('supporter', SupporterController::class);
    Route::resource('menu1', Menu1Controller::class);
    Route::resource('menu2', Menu2Controller::class);
    Route::get('menu_type_id/{id?}', [Menu2Controller::class,'menu_type_id'])->name('menu_type_id');
    Route::resource('video', VideoController::class);
    ///////GET-POST: URL - ACTION//////

    Route::resource('news', NewsController::class);
    Route::resource('product', ProductController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('cart', CartController::class);
    Route::resource('bill', BillController::class);
    Route::get('classify/{type}', [BillController::class, 'classify'])->name('bill.classify');
// Route::resource('user', 'UserAdminController');

// Route::post('/user/{id}', 'UserAdminController@update');
});
Route::group(['prefix' => '', 'as' => ''], function () {
    Route::get('/', [FrontendController::class , 'index'])->name('web');
    Route::get('category', [FrontendController::class , 'category']);
    Route::get('cart', [CartController::class, 'cart'])->name('cart.index');
    Route::post('cart_create', [CartController::class, 'cartCreate'])->name('cart.create');
    Route::post('cart_update', [CartController::class, 'cartUpdate'])->name('cart.update');
    Route::post('cart_delete', [CartController::class, 'cartDelete'])->name('cart.delete');
    Route::get('cart_quantity', [CartController::class, 'cartQuantity'])->name('cart.quantity');
    // Route::post('cart', [CartController::class, 'cart'])->name('cart.index');
    Route::post('bill_create', [BillController::class, 'billCreate'])->name('bill.create');
    // Route::post('cart_update', [CartController::class, 'cartUpdate'])->name('cart.update');
    Route::get('product/{id}', [FrontendController::class , 'product'])->name('product');

// Route::get('news/{id?}', 'FrontendController@news')->name('news');
});

