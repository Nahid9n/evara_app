<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EvaraController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOfferController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PurchaseGuideController;
use App\Http\Controllers\ShippingPolicyController;
use App\Http\Controllers\ReturnPolicyController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\TermsConditionController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;

use App\Http\Controllers\Vendor\VendorAuthController;
use App\Http\Controllers\Vendor\VendorProfileController;
use App\Http\Controllers\Vendor\VendorProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [EvaraController::class,'index'])->name('home');
//Route::get('/product-category', [EvaraController::class,'category'])->name('product-category');
Route::get('/product-category/{id}', [EvaraController::class,'category'])->name('product-category');
Route::get('/product-sub-category/{id}', [EvaraController::class,'subCategory'])->name('product-sub-category');
//Route::get('/product-detail', [EvaraController::class,'product'])->name('product-detail');
Route::get('/product-detail/{id}', [EvaraController::class,'product'])->name('product-detail');

Route::get('/about-us', [PagesController::class,'about'])->name('about');
Route::get('/purchase-guide', [PagesController::class,'purchaseGuide'])->name('purchase-guide');
Route::get('/terms-condition', [PagesController::class,'termsCondition'])->name('terms-condition');
Route::get('/shipping-policy', [PagesController::class,'shippingPolicy'])->name('shipping-policy');
Route::get('/return-policy', [PagesController::class,'returnPolicy'])->name('return-policy');
Route::get('/contact-us', [PagesController::class,'contact'])->name('contact');

//Route::post('/cart', [CartController::class,'addToCart'])->name('cart');

Route::resources(['cart' => CartController::class]);

Route::get('/cart/delete-product/{rowId}',[CartController::class,'delete'])->name('cart.delete');
Route::post('/cart/update-product',[CartController::class,'updateProduct'])->name('cart.update-product');

Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('/new-order',[CheckoutController::class,'newOrder'])->name('new-order');
Route::get('/complete-order',[CheckoutController::class,'completeOrder'])->name('complete-order');


// CustomerAuthController
Route::get('/login-register',[CustomerAuthController::class,'login'])->name('login-register');
Route::post('/login-check',[CustomerAuthController::class,'loginCheck'])->name('login-check');
Route::post('/new-customer',[CustomerAuthController::class,'newCustomer'])->name('new-customer');
Route::get('/customer-logout',[CustomerAuthController::class,'logout'])->name('customer-logout');



// CustomerAuthController  Dashboard
Route::middleware(['customer'])->group(function () {

    Route::get('/my-dashboard',[CustomerAuthController::class,'dashboard'])->name('customer.dashboard');
    // CustomerAuthController New Route
    Route::get('/show-customer-order/{id}',[CustomerAuthController::class,'showCustomerOrder'])->name('show-customer-order');
    Route::get('/customer/invoice-show/{id}', [CustomerAuthController::class,'showCustomerInvoice'])->name('customer-invoice-show');
    Route::get('/customer/invoice-download/{id}', [CustomerAuthController::class,'showCustomerDownload'])->name('customer-invoice-download');
    Route::post('/editCustomer',[CustomerAuthController::class,'editCustomer'])->name('editCustomer');


});


/*
 // CustomerAuthController  Dashboard
Route::get('/my-dashboard',[CustomerAuthController::class,'dashboard'])->name('customer.dashboard');


*/


//Wishlist
Route::resource('wishlist',WishListController::class);
Route::get('/wishlist-ad/{id}', [WishListController::class,'wishListAdd'])->name('wishlist.ad');


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


Route::get('/vendor-login-register', [VendorAuthController::class, 'index'])->name('vendor-login-register');
Route::post('/vendor-login', [VendorAuthController::class, 'login'])->name('vendor.login');
Route::post('/new-vendor', [VendorAuthController::class, 'register'])->name('new-vendor');


// vendor AuthController  Dashboard
Route::middleware(['vendor'])->group(function () {

    Route::get('/vendor-dashboard', [VendorAuthController::class, 'dashboard'])->name('vendor.dashboard');
    Route::get('/vendor-logout', [VendorAuthController::class, 'logout'])->name('vendor.logout');
    Route::get('/vendor-profile', [VendorProfileController::class, 'index'])->name('vendor.profile');
    // for vendor product
    Route::resource('vendor-product', VendorProductController::class);
    // for vendor Profile
    Route::post('/edit-vendor-profile',[VendorProfileController::class,'editVendorProfile'])->name('edit.vendor.profile');

});

Route::get('/get-sub-category-by-category',[ProductController::class,'getSubCategoryByCategory'])->name('get-sub-category-by-category');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {


    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    //Resource Route for Category Controller
    //    Route::resources(['categories' => CategoryController::class]);
    Route::resource('category', CategoryController::class);
    Route::resource('sub-category', SubCategoryController::class);
    //Resource Route for Brand Controller
    Route::resource('brand', BrandController::class);
    //Resource Route for unit Controller
    Route::resource('unit', UnitController::class);

    Route::resource('color', ColorController::class);
    Route::resource('size', SizeController::class);
    Route::resource('product', ProductController::class);
    Route::resource('product_offer', ProductOfferController::class);

    //Order Module

    Route::resource('order', OrderController::class);
    Route::get('/order/invoice-show/{id}', [OrderController::class,'showInvoice'])->name('order.invoice-show');
    Route::get('/order/invoice-download/{id}', [OrderController::class,'showDownload'])->name('order.invoice-download');

    //Feature Module
    Route::resource('feature', FeatureController::class);
    //Courier  Module
    Route::resource('courier', CourierController::class);
    //User
    Route::resource('user', UserController::class)->middleware('superAdmin');
    //Ad Module
    Route::resource('ad', AdController::class);
    //Setting Module
    Route::resource('setting', SettingController::class);

    Route::resource('purchase-guide-form', PurchaseGuideController::class);
    Route::resource('shipping-policy-form', ShippingPolicyController::class);
    Route::resource('return-policy-form', ReturnPolicyController::class);
    Route::resource('privacy-policy-form', PrivacyPolicyController::class);
    Route::resource('terms-condition-form', TermsConditionController::class);
    Route::resource('about-us-form', AboutUsController::class);
    Route::resource('contact-us-form', ContactUsController::class);








});
