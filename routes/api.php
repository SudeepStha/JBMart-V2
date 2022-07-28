<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\AdController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BannerSliderController;
use App\Http\Controllers\Api\CartController as ApiCartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CMS_FAQController;
use App\Http\Controllers\Api\CMS_Privacy_PolicyController;
use App\Http\Controllers\Api\CMS_Return_PolicyController;
use App\Http\Controllers\Api\CMS_Shipping_PolicyController;
use App\Http\Controllers\Api\CMS_TermsOfUserController;
use App\Http\Controllers\Api\FeaturedProductController;
use App\Http\Controllers\Api\FeaturedStoreController;
use App\Http\Controllers\Api\GroceriesController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductListController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\StoreTypeControlle;
use App\Http\Controllers\Api\UnitController;
use App\Http\Resources\FeaturedProductResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('storetypes', StoreTypeControlle::class);
Route::apiResource('store', StoreController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('product', ProductController::class);
Route::get('products/{id}', [ProductListController::class, 'products']);
Route::apiResource('unit', UnitController::class);


// CMS
Route::apiResource('about', AboutController::class);
Route::apiResource('terms_of_user', CMS_TermsOfUserController::class);
Route::apiResource('privacy_policy', CMS_Privacy_PolicyController::class);
Route::apiResource('shipping_policy', CMS_Shipping_PolicyController::class);
Route::apiResource('return_policy', CMS_Return_PolicyController::class);
Route::apiResource('faq', CMS_FAQController::class);


// Banner
Route::resource('banner', BannerSliderController::class);
Route::resource('ad', AdController::class);
Route::apiResource('featured_store', FeaturedStoreController::class);
Route::apiResource('featured_product', FeaturedProductController::class);



// Customer
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('cart', ApiCartController::class);
    Route::post('set-default-address/{id}', [AddressController::class, 'setDefault']);
    Route::apiResource('address', AddressController::class);

    Route::resource('order', OrderController::class);
    Route::get('cart', [ApiCartController::class, 'index']);
});
