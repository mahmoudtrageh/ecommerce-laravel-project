<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LangController;

// main controllers 
use App\Http\Controllers\Main\AdminAuthController;
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\UsersController;
use App\Http\Controllers\Main\AdminsController;
use App\Http\Controllers\Main\AdminProfileController;
use App\Http\Controllers\Main\SettingController;
use App\Http\Controllers\Main\ContactController;
use App\Http\Controllers\Main\PermissionController;
use App\Http\Controllers\Main\RolesController;
use App\Http\Controllers\Main\MenuController;
use App\Http\Controllers\Main\SubMenuController;
use App\Http\Controllers\Main\EmailSettingsController;
use App\Http\Controllers\Main\LangsController;
// main controllers

// store controllers 
use App\Http\Controllers\Store\CategoryController;
use App\Http\Controllers\Store\SubCategoryController;
use App\Http\Controllers\Store\ProductController;
use App\Http\Controllers\Store\CouponController;
use App\Http\Controllers\Store\ShippingAreaController;
use App\Http\Controllers\Store\OrderController;
use App\Http\Controllers\Store\ReportController;
use App\Http\Controllers\Store\BrandController;
// store controllers 

use App\Http\Controllers\Frontend\IndexController;

// Store Site controllers
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\StoreController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\StripeController;
// Store Site controllers

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

/// Multi Language All Routes ////
Route::get('set-lang/{lang}', [LangController::class, 'change_lang'])->name('change.lang');

/*  ------------------ Admin Routes ------------------  */

Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminAuthController::class, 'Index'])->name('login_form');

    Route::post('/login/owner', [AdminAuthController::class, 'Login'])->name('admin.login');
});

Route::middleware('admin')->group(function () {

    Route::prefix('admin')->group(function () {

        // Main Routes #########################################################

        Route::get('/dashboard', [HomeController::class, 'Dashboard'])->name('admin.dashboard');

        // auth routes 
        Route::get('/logout', [AdminAuthController::class, 'AdminLogout'])->name('admin.logout');

        Route::get('/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

        Route::get('/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

        Route::post('/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

        Route::get('/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

        Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');
        // auth routes 

        // Users Routes 
        Route::prefix('alluser')->group(function () {

            Route::get('/view/users', [UsersController::class, 'AllUsers'])->name('all-users');

            Route::get('/add', [UsersController::class, 'AddUserRole'])->name('add.user');

            Route::post('/store', [UsersController::class, 'StoreUserRole'])->name('admin.user.user.store');

            Route::get('/edit/{id}', [UsersController::class, 'EditUserRole'])->name('edit.admin.user.user');

            Route::post('/update', [UsersController::class, 'UpdateUserRole'])->name('admin.user.user.update');

            Route::get('/delete/{id}', [UsersController::class, 'DeleteUserRole'])->name('delete.admin.user.user');
        });
        // User Routes

        // Admins Routes 
        Route::prefix('admins')->group(function () {

            Route::get('/all', [AdminsController::class, 'AllAdminRole'])->name('all.admin.user');

            Route::get('/add', [AdminsController::class, 'AddAdminRole'])->name('add.admin');

            Route::post('/store', [AdminsController::class, 'StoreAdminRole'])->name('admin.user.store');

            Route::get('/edit/{id}', [AdminsController::class, 'EditAdminRole'])->name('edit.admin.user');

            Route::post('/update', [AdminsController::class, 'UpdateAdminRole'])->name('admin.user.update');

            Route::get('/delete/{id}', [AdminsController::class, 'DeleteAdminRole'])->name('delete.admin.user');
        });
        // Admins Routes 

        // Settings Routes 
        Route::prefix('setting')->group(function () {

            Route::get('/site', [SettingController::class, 'SiteSetting'])->name('site.setting');

            Route::post('/site/update', [SettingController::class, 'SiteSettingUpdate'])->name('update.sitesetting');

            Route::get('/seo', [SettingController::class, 'SeoSetting'])->name('seo.setting');

            Route::post('/seo/update', [SettingController::class, 'SeoSettingUpdate'])->name('update.seosetting')
            ;
            Route::get('/gateway', [SettingController::class, 'GatewaySetting'])->name('gateway.setting');

            Route::post('/gateway/update', [SettingController::class, 'GatewaySettingUpdate'])->name('update.gatewaysetting');
        });
        // Settings Routes

        // EmailSettings Routes 
        Route::prefix('email')->group(function () {

            Route::get('/settings', [EmailSettingsController::class, 'EmailSetting'])->name('email.setting');

            Route::post('/settings/update', [EmailSettingsController::class, 'EmailSettingUpdate'])->name('update.emailsetting');
        });
        // EmailSettings Routes

        // Contact Routes 
        Route::prefix('contact')->group(function () {
            Route::get('/message', [ContactController::class, 'AdminMessage'])->name('admin.message');
            Route::get('/delete/{id}', [ContactController::class, 'MessageDelete'])->name('message.delete');
        });
        // Contact Routes

        // Permissions Routes 
        Route::resource('permission', PermissionController::class);
        Route::post('/updatePermission/{id}', [PermissionController::class, 'update'])->name('permission.update');
        Route::get('/deletePermission/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
        // Permissions Routes

        // Roles Routes
        Route::resource('role', RolesController::class);
        Route::post('/updateRole/{id}', [RolesController::class, 'update'])->name('role.update');
        Route::get('/deleteRole/{id}', [RolesController::class, 'destroy'])->name('role.destroy');
        // Roles Routes

        // Menu Routes  
        Route::prefix('menu')->group(function () {

            Route::get('/view', [MenuController::class, 'MenuView'])->name('all.menu');

            Route::post('/store', [MenuController::class, 'MenuStore'])->name('menu.store');

            Route::get('/edit/{id}', [MenuController::class, 'MenuEdit'])->name('menu.edit');

            Route::post('/update/{id}', [MenuController::class, 'MenuUpdate'])->name('menu.update');

            Route::get('/delete/{id}', [MenuController::class, 'MenuDelete'])->name('menu.delete');

            // Sub Menu Routes
            Route::get('/sub/view', [SubMenuController::class, 'SubMenuView'])->name('all.submenu');

            Route::post('/sub/store', [SubMenuController::class, 'SubMenuStore'])->name('submenu.store');

            Route::get('/sub/edit/{id}', [SubMenuController::class, 'SubMenuEdit'])->name('submenu.edit');

            Route::post('/update', [SubMenuController::class, 'SubMenuUpdate'])->name('submenu.update');

            Route::get('/sub/delete/{id}', [SubMenuController::class, 'SubMenuDelete'])->name('submenu.delete');
        });
        // Menu Routes 

        // lang Routes
        Route::prefix('langs')->group(function () {

            Route::get('/lang/all', [LangsController::class, 'AllLang'])->name('all.lang');
            Route::post('/lang/add', [LangsController::class, 'StoreLang'])->name('store.lang');
            Route::get('/lang/edit/{id}', [LangsController::class, 'EditLang'])->name('edit.lang');
            Route::post('/lang/update/{id}', [LangsController::class, 'Update'])->name('update.lang');
            Route::get('/lang/delete/{id}', [LangsController::class, 'Delete'])->name('delete.lang');
        });
        // lang Routes

        // Main Routes ############################################################

        // store Routes ###########################################################

        // Brand Routes 
        Route::prefix('brand')->group(function () {

            Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');

            Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');

            Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');

            Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');

            Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
        });
        // Brand Routes

        // Category Routes  
        Route::prefix('category')->group(function () {

            Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');

            Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');

            Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');

            Route::post('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');

            Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

            // Sub Category Routes
            Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');

            Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');

            Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');

            Route::post('/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');

            Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');
        });
        // Category Routes 

        // Products Routes 
        Route::prefix('product')->group(function () {

            Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');

            Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product-store');

            Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');

            Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');

            Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');

            Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');

            Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');

            Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');

            Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');

            Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');

            Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
        });
        // Products Routes

        // Coupons Routes 
        Route::prefix('coupons')->group(function () {

            Route::get('/view', [CouponController::class, 'CouponView'])->name('manage-coupon');

            Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');

            Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
            Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');

            Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');
        });
        // Coupons Routes 

        // Shipping Routes 
        Route::prefix('shipping')->group(function () {

            Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage-division');

            Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');

            Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');

            Route::post('/division/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');

            Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');
        });
        // Shipping Routes

        // Order Routes 
        Route::prefix('orders')->group(function () {

            Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending-orders');

            Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');

            Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');

            Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing-orders');

            Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');

            Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');

            Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');

            Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel-orders');

            // Update Status 
            Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');

            Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm.processing');

            Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing.picked');

            Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked.shipped');

            Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped.delivered');

            Route::get('/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');
        });
        // Order Routes 

        // Reports Routes 
        Route::prefix('reports')->group(function () {
            Route::get('/view', [ReportController::class, 'ReportView'])->name('all-reports');

            Route::post('/search/by/date', [ReportController::class, 'ReportByDate'])->name('search-by-date');

            Route::post('/search/by/month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');

            Route::post('/search/by/year', [ReportController::class, 'ReportByYear'])->name('search-by-year');
        });
        // Reports Routes

        // Stock Routes 
        Route::prefix('stock')->group(function () {
            Route::get('/product', [ProductController::class, 'ProductStock'])->name('product.stock');
        });
        // Stock Routes

        // Review Routes 
        Route::prefix('review')->group(function () {

            Route::get('/pending', [ReviewController::class, 'PendingReview'])->name('pending.review');

            Route::get('/admin/approve/{id}', [ReviewController::class, 'ReviewApprove'])->name('review.approve');

            Route::get('/publish', [ReviewController::class, 'PublishReview'])->name('publish.review');

            Route::get('/delete/{id}', [ReviewController::class, 'DeleteReview'])->name('delete.review');
        });
        // Review Routes

        // store Routes ###########################################################

    });
});
// end admin middleware

// out side admin middleware 
// Roles Routes 
Route::post('/post-role', [RolesController::class, 'store'])->name('post.role');
// Roles Routes 


/*  ------------------ End Admin Routes ------------------  */

/* ----------------- site Routes ------------------ */

// Main Site Routes #########################################

// Auth Site Routes
Route::get('/profile/{id}', [UserProfileController::class, 'ProfileView'])->name('profile.view');

Route::post('/user/profile/store', [UserProfileController::class, 'UserProfileStore'])->name('user.profile.store');

Route::get('/user/change/password', [UserProfileController::class, 'UserChangePassword'])->name('change.password');

Route::post('/user/password/update', [UserProfileController::class, 'UserPasswordUpdate'])->name('user.password.update');
// Auth Site Routes

// Site Contact Routes 
Route::get('/contact', [ContactsController::class, 'Contact'])->name('contact');
Route::post('/contact/form', [ContactsController::class, 'ContactForm'])->name('contact.form');
// Site Contact Routes

// Main Site Routes #########################################

Route::get('/', [IndexController::class, 'Home'])->name('home');

// Store Site Routes #############################################

Route::get('/shop/{id}', [StoreController::class, 'ShopView'])->name('shop.view');

Route::get('/product/details/{id}/{slug}', [StoreController::class, 'ProductDetails'])->name('product.details');

// Get Data from mini cart
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);

// Product View Modal with Ajax
Route::get('/product/view/modal/{id}', [StoreController::class, 'ProductViewAjax']);

// Add to Cart Store Data
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

// Remove mini cart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

/////////////////////  User Must Login  ////
Route::group(['middleware' => 'auth', 'namespace' => 'User'], function () {

    // Wishlist page
    Route::get('/user/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);

    Route::get('/user/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);

    Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');

    Route::get('/user/order_details/{order_id}', [UserProfileController::class, 'OrderDetails'])->name('order.details');

    Route::get('user/invoice_download/{order_id}', [UserProfileController::class, 'InvoiceDownload']);

    Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');

    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');

    Route::post('/review/store', [ReviewController::class, 'ReviewStore'])->name('review.store');

    // Checkout Routes 
    Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

    Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');
    // Checkout Routes

    /// Order Traking Route 
    Route::post('/order/tracking', [UserProfileController::class, 'OrderTraking'])->name('order.tracking');    

});
/////////////////////  User Must Login  ///


// Add to wishlist
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);
// Add to wishlist

// My Cart Routes
Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');

Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);

Route::get('/user/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);

Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);

Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);
// My Cart Routes

// Coupon Option Routes 
Route::post('/coupon-apply', [CartController::class, 'CouponApply']);

Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);

Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);
// Coupon Option Routes

// Store Site Routes #############################################

require __DIR__ . '/auth.php';

/* ----------------- site Routes ------------------ */
