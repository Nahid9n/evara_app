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
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CouponManageController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\HighlightController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PopupController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\NewsHeaderController;
use App\Http\Controllers\Admin\ConfigureController;
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
Route::get('/product-category/{slug}', [EvaraController::class,'category'])->name('product-category');
Route::get('/product-sub-category/{slug}', [EvaraController::class,'subCategory'])->name('product-sub-category');
Route::get('/product-brand/{slug}', [EvaraController::class,'productByBrand'])->name('product-brand');
Route::get('/product-all', [EvaraController::class,'allProduct'])->name('product-all');
Route::get('/product-detail/{slug}', [EvaraController::class,'productDetails'])->name('product-detail');
Route::get('/product-by-tag/{tag}', [EvaraController::class,'productByTag'])->name('product-by-tag');
Route::get('/coupons', [EvaraController::class, 'coupons'])->name('coupons');

Route::get('/about-us', [PagesController::class,'about'])->name('about');
Route::get('/policies/{slug}', [PageController::class,'details'])->name('page.details');
Route::get('/contact-us', [PagesController::class,'contact'])->name('contact');

//Route::post('/cart', [CartController::class,'addToCart'])->name('cart');

Route::resources(['cart' => CartController::class]);

Route::post('/cart/update-product',[CartController::class,'updateProduct'])->name('cart.update-product');

Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('/new-order',[CheckoutController::class,'newOrder'])->name('new-order');
Route::get('/complete-order',[CheckoutController::class,'completeOrder'])->name('complete-order');


// CustomerAuthController
Route::get('/login-register',[CustomerAuthController::class,'login'])->name('login-register');
Route::post('/login-check',[CustomerAuthController::class,'loginCheck'])->name('login-check');
Route::post('/new-customer',[CustomerAuthController::class,'newCustomer'])->name('new-customer');
Route::get('/customer-logout',[CustomerAuthController::class,'logout'])->name('customer-logout');

Route::get('/filter',[EvaraController::class,'filter'])->name('product.filter');
Route::get('/get-sub-category-by-category-filter',[EvaraController::class,'getSubCategoryByCategory'])->name('get-sub-category-by-category-filter');


// CustomerAuthController  Dashboard
Route::middleware(['customer'])->group(function () {

    Route::get('/my-dashboard',[CustomerAuthController::class,'dashboard'])->name('customer.dashboard');
    // CustomerAuthController New Route
    Route::get('/customer-orders',[CustomerAuthController::class,'customerOrder'])->name('customer.orders');
    Route::get('/customer-orders-details/{id}',[CustomerAuthController::class,'orderDetails'])->name('customer-order-details');
    Route::get('/customer-cancel-orders',[CustomerAuthController::class,'customerCancelOrder'])->name('customer.cancel.orders');
    Route::get('/show-customer-order/{id}',[CustomerAuthController::class,'showCustomerOrder'])->name('show-customer-order');
    Route::get('/customer/invoice-show/{id}', [CustomerAuthController::class,'showCustomerInvoice'])->name('customer-invoice-show');
    Route::get('/customer/invoice-download/{id}', [CustomerAuthController::class,'showCustomerDownload'])->name('customer-invoice-download');
    Route::post('/editCustomer',[CustomerAuthController::class,'editCustomer'])->name('editCustomer');
    Route::get('/customer-address', [CustomerAuthController::class, 'address'])->name('customer.address');
    Route::get('/customer-password', [CustomerAuthController::class, 'customerChangePassword'])->name('customer.password');
    Route::put('/customer-password-change/{id}', [CustomerAuthController::class, 'customerPasswordChange'])->name('customer.password.change');
    Route::put('/billings-store/{id}', [CustomerAuthController::class, 'billingsStore'])->name('billings.store');
    Route::put('/shipping-store/{id}', [CustomerAuthController::class, 'shippingStore'])->name('shipping.store');
    Route::get('/customer-account-details', [CustomerAuthController::class, 'accountDetail'])->name('customer.account.details');
    Route::put('/update-customer-info/{id}', [CustomerAuthController::class, 'updateCustomerInfo'])->name('update.customer.info');

    Route::get('/cart/delete-product/{id}',[CartController::class,'delete'])->name('cart.delete');
    Route::post('/cart/clear-product',[CartController::class,'clearCart'])->name('cart.clear');
    Route::post('/cart/update-Product/', [CartController::class, 'updateProduct'])->name('cart.update');
    Route::post('/cart/ajax-update-Product/', [CartController::class, 'ajaxUpdateProduct'])->name('ajax-update-Product');

    Route::post('/collect-coupon', [CouponManageController::class, 'collect'])->name('collect.coupon');
    Route::get('/customer-coupons', [CouponManageController::class, 'customerCoupons'])->name('customer.coupons');
    Route::get('/customer-coupon-details/{code}', [CouponManageController::class, 'customerCouponView'])->name('customer.coupon.view');
    Route::post('/order-coupon-apply', [CheckoutController::class, 'couponCodeApply'])->name('coupon.apply');
    Route::get('/customer-ticket', [TicketController::class, 'customerTicket'])->name('customer.ticket');
    Route::get('/customer-ticket-view/{id}', [TicketController::class, 'ticketView'])->name('support.ticket.view');
    Route::controller(TicketController::class)->group(function () {
        Route::post('/ticket-create', 'createTicket')->name('customer.store.ticket');
        Route::get('/ticket-view/{id}', 'viewTicket')->name('customer.view.ticket');
        Route::post('/ticket-reply-customer', 'replyTicket')->name('customer.ticket.reply');
    });

});


/*
 // CustomerAuthController  Dashboard
Route::get('/my-dashboard',[CustomerAuthController::class,'dashboard'])->name('customer.dashboard');


*/


//Wishlist
Route::resource('wishlist',WishListController::class);
Route::get('/wishlist-ad', [WishListController::class,'wishListAdd'])->name('wishlist.ad');
Route::post('/cart-ad', [CartController::class,'cartAdd'])->name('cart.ad');
Route::get('get-cart-details', [CartController::class, 'getCartDetails'])->name('get-cart-details');

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
    Route::controller(ProductController::class)->group(function () {
        Route::post('/other-images-store', 'otherImagesStore')->name('admin.other.images.store');
        Route::put('/other-images-update/{id}', 'otherImagesUpdate')->name('admin.other.images.update');
        Route::delete('/other-images-destroy/{id}', 'otherImagesDestroy')->name('admin.other.images.destroy');
    });
    Route::resource('product_offer', ProductOfferController::class);
    Route::controller(HighlightController::class)->group(function () {
        Route::get('/highlight-manage', 'index')->name('admin.highlight.manage');
        Route::post('/highlight-store', 'store')->name('admin.highlight.store');
        Route::put('/highlight-update/{id}', 'update')->name('admin.highlight.update');
        Route::delete('/highlight-destroy/{id}', 'destroy')->name('admin.highlight.destroy');
    });
    Route::controller(TagController::class)->group(function () {
        Route::get('/tag-manage', 'index')->name('admin.tag.manage');
        Route::post('/tag-store', 'store')->name('admin.tag.store');
        Route::put('/tag-update/{id}', 'update')->name('admin.tag.update');
        Route::delete('/tag-destroy/{id}', 'destroy')->name('admin.tag.destroy');
    });

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
    Route::controller(CouponController::class)->group(function(){
        Route::get('coupon','adminIndex')->name('admin-coupon.index');
        Route::get('coupon/create','adminCreate')->name('admin-coupon.create');
        Route::post('product-coupon/store','ProductStore')->name('admin-coupon.product.store');
        Route::post('orders-coupon/store','OrderStore')->name('admin-coupon.orders.store');
        Route::get('coupon/edit/{id}','adminEdit')->name('admin-coupon.edit');
        Route::put('coupon-product/update/{id}','adminProductUpdate')->name('admin-coupon.product.update');
        Route::put('coupon-orders/update/{id}','adminOrderUpdate')->name('admin-coupon.orders.update');
        Route::delete('coupon/delete/{id}','adminDelete')->name('admin-coupon.delete');
    });
    Route::controller(TicketController::class)->group(function () {
        Route::get('/ticket-manage', 'adminTicketManage')->name('admin.ticket.manage');
        Route::get('/ticket-manage/{id}', 'ticketStatusUpdate')->name('admin.ticket.status.update');
        Route::get('/ticket-view-admin/{id}', 'adminViewTicket')->name('admin.ticket.view');
        Route::post('/ticket-reply-admin', 'replyTicket')->name('admin.ticket.reply');
    });
    Route::controller(PageController::class)->group(function () {
        Route::get('/page', 'index')->name('admin.page.index');
        Route::post('/page-store', 'store')->name('admin.page.store');
        Route::get('/page-show/{id}', 'show')->name('admin.page.show');
        Route::get('/page-edit/{id}', 'edit')->name('admin.page.edit');
        Route::put('/page-update/{id}', 'update')->name('admin.page.update');
        Route::delete('/page-destroy/{id}', 'destroy')->name('admin.page.destroy');
    });
    Route::controller(NewsHeaderController::class)->group(function () {
        Route::get('/news-header', 'index')->name('admin.news.index');
        Route::post('/news-header-store', 'store')->name('admin.news.store');
        Route::get('/news-header-show/{id}', 'show')->name('admin.news.show');
        Route::get('/news-header-edit/{id}', 'edit')->name('admin.news.edit');
        Route::put('/news-header-update/{id}', 'update')->name('admin.news.update');
        Route::delete('/news-header-destroy/{id}', 'destroy')->name('admin.news.destroy');
    });
    Route::controller(PopupController::class)->group(function () {
        Route::get('/popup', 'index')->name('admin.popup.index');
        Route::post('/popup-store', 'store')->name('admin.popup.store');
        Route::get('/popup-show/{id}', 'show')->name('admin.popup.show');
        Route::get('/popup-edit/{id}', 'edit')->name('admin.popup.edit');
        Route::put('/popup-update/{id}', 'update')->name('admin.popup.update');
        Route::delete('/popup-destroy/{id}', 'destroy')->name('admin.popup.destroy');
    });
    Route::controller(ConfigureController::class)->group(function () {
        Route::get('/configure', 'index')->name('admin.configure.index');
        Route::post('/configure-store', 'store')->name('admin.configure.store');
        Route::get('/configure-show/{id}', 'show')->name('admin.configure.show');
        Route::get('/configure-edit/{id}', 'edit')->name('admin.configure.edit');
        Route::put('/configure-update/{id}', 'update')->name('admin.configure.update');
        Route::delete('/configure-destroy/{id}', 'destroy')->name('admin.configure.destroy');
    });
    Route::controller(\App\Http\Controllers\BannerController::class)->group(function () {
        Route::get('/banners', 'index')->name('admin.banner.index');
        Route::post('/banners-store', 'store')->name('admin.banner.store');
        Route::put('/banners-update/{id}', 'update')->name('admin.banner.update');
        Route::delete('/banners-destroy/{id}', 'destroy')->name('admin.banner.destroy');
    });


});
