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
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\WebInfoController;

//fontend
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SupporterController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CommonlController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FiveStarController;
use App\Http\Controllers\GiftCustomerController;
//login
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [LoginController::class , 'register']);
    // Route::post('/authenticate', [LoginController::class , 'authenticate'])->name('authenticate');
    Route::post('/registerauth', [LoginController::class , 'registerauth'])->name('register');
});
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/logout', [LogoutController::class , 'logout'])->name('logout');
    Route::match(['get', 'post'], '/changepassword', [AdminController::class , 'changepassword'])->name('changepassword');
});


/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware'=> 'auth:admin'], function () {
    Route::get('/', [AdminController::class , 'index'])->name('quantri');

    Route::resource('customer', CustomerController::class);
    Route::resource('gift', GiftCustomerController::class);
    Route::get('gift/classify/{type}', [GiftCustomerController::class, 'classify'])->name('gift.classify');
    Route::get('search_customer', [CustomerController::class, 'search']);
    Route::get('search_supporter', [SupporterController::class, 'search']);
    Route::resource('supporter', SupporterController::class);
    Route::resource('menu1', Menu1Controller::class);
    Route::get('search_menu1', [Menu1Controller::class, 'search']);
    Route::resource('menu2', Menu2Controller::class);
    Route::get('search_menu2', [Menu2Controller::class, 'search']);
    Route::get('menu_type_id/{id?}', [Menu2Controller::class,'menu_type_id'])->name('menu_type_id');
    Route::resource('video', VideoController::class);
    Route::get('search_video', [VideoController::class, 'search']);
    ///////GET-POST: URL - ACTION//////

    Route::resource('news', NewsController::class);
    Route::get('search_news', [NewsController::class, 'search']);
    Route::resource('product', ProductController::class);
    Route::get('search_product', [ProductController::class, 'search']);
    Route::get('fill_product/{id}/{is_hot}', [ProductController::class, 'fill'])->name('product.fill');
    Route::resource('banner', BannerController::class);
    Route::get('search_banner', [BannerController::class, 'search']);
    Route::resource('cart', CartController::class);
    Route::get('search_cart', [CartController::class, 'search']);
    Route::resource('bill', BillController::class);
    Route::get('search_cart', [BillController::class, 'search']);
    Route::get('bill/classify/{type}', [BillController::class, 'classify'])->name('bill.classify');
    Route::resource('consultation', ConsultationController::class);
    Route::get('search_consultation', [ConsultationController::class, 'search']);
    Route::get('consultation/classify/{type}', [ConsultationController::class, 'classify'])->name('consultation.classify');
    Route::resource('promotion', PromotionController::class);
    Route::get('search_promotion', [PromotionController::class, 'search']);
    Route::get('promotion/classify/{type}', [PromotionController::class, 'classify'])->name('promotion.classify');
    Route::resource('webinfo', WebInfoController::class);
// Route::resource('user', 'UserAdminController');

// Route::post('/user/{id}', 'UserAdminController@update');
});
Route::group(['prefix' => '', 'as' => ''], function () {
    Route::get('/', [FrontendController::class , 'index'])->name('web');
    Route::get('cart', [CartController::class, 'cart'])->name('cart.index');
    Route::post('cart_create', [CartController::class, 'cartCreate'])->name('cart.create');
    Route::post('cart_update', [CartController::class, 'cartUpdate'])->name('cart.update');
    Route::post('cart_delete', [CartController::class, 'cartDelete'])->name('cart.delete');
    Route::get('cart_quantity', [CartController::class, 'cartQuantity'])->name('cart.quantity');
    Route::post('consultation', [ConsultationController::class, 'registerConsultation'])->name('consultation.register');
    Route::post('promotion', [PromotionController::class, 'registerPromotion'])->name('promotion.register');
    Route::post('gift', [GiftCustomerController::class, 'registerGift'])->name('gift.register');
    Route::post('bill_create', [BillController::class, 'billCreate'])->name('bill.create');

    Route::get('get_list_product', [ProductController::class, 'getListProduct'])->name('getListProduct');
    Route::get('get_list_product_sale', [ProductController::class, 'getListProductSale'])->name('getListProductSale');
    Route::get('get_list_product_hot', [ProductController::class, 'getListProductHot'])->name('getListProductHot');
    Route::get('/{slug}', [FrontendController::class , 'category'])->name('category');
    Route::post('tim-kiem.html', [FrontendController::class , 'search']);
    Route::post('thanks.html', [FrontendController::class , 'thanks'])->name('thanks');
});

