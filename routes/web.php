<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\FeaturedProductController;
use App\Http\Controllers\Admin\FeaturedStoreController as AdminFeaturedStoreController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\ReturnPolicyController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SaleController as AdminSaleController;
use App\Http\Controllers\Admin\ShippingPolicyController;
use App\Http\Controllers\Admin\StoreTypeController;
use App\Http\Controllers\Admin\TermsOfUserController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Api\GroceriesController;
use App\Http\Controllers\FeaturedStoreController;
use App\Http\Controllers\Admin\SalesController;
use GuzzleHttp\Psr7\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// Store Type
Route::resource('stores', StoreTypeController::class);

// Store Information, which is also equal to Company Profile
Route::resource('profiles', ProfileController::class);

// User Account
Route::resource('accounts', AccountController::class);

// Deliveries Account
Route::resource('delivery', DeliveryController::class);

//Roles
Route::resource('role', RoleController::class);

//Permission
Route::resource('permission', PermissionController::class);

// Unit
Route::resource('unit', UnitController::class);

// Category
Route::resource('category', CategoryController::class);

// Product
Route::resource('product', ProductController::class);

// Sales
Route::resource('sales', SalesController::class);



// {---------- CMS --------}
// About Us
Route::resource('about', AboutUsController::class);

// Terms Of User
Route::resource('termsofuser', TermsOfUserController::class);

// FAQ
Route::resource('faq', FAQController::class);

// Privacy and Policy
Route::resource('privacy_policy', PrivacyPolicyController::class);

// Shipping Policy
Route::resource('shipping_policy', ShippingPolicyController::class);

// Return Policy
Route::resource('return_policy', ReturnPolicyController::class);

// {---------- CMS End --------}

// Banner
Route::resource('banner', BannerController::class);
Route::resource('ad', AdvertiseController::class);
Route::resource('featured_store', AdminFeaturedStoreController::class);
Route::resource('featured_product', FeaturedProductController::class);


// Order
Route::resource('order', OrderController::class);
Route::resource('purchase', PurchaseController::class);


