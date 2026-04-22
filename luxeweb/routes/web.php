<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('preview');
})->name('/');

Route::get('/admin', function () {
    return redirect()->route('dashboard');
})->name('/admin');

Auth::routes();

Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//===============2FA routes===============//
Route::middleware(['auth'])->group(function () {
    Route::get('2fa/enable', [App\Http\Controllers\Auth\Google2FAController::class, 'enable2FA'])->name('2fa.enable');
    Route::post('2fa/confirm', [App\Http\Controllers\Auth\Google2FAController::class, 'confirm2FA'])->name('2fa.confirm');
    Route::get('2fa/verify', [App\Http\Controllers\Auth\Google2FAController::class, 'verify2FA'])->name('2fa.verify');
    Route::post('2fa/verify', [App\Http\Controllers\Auth\Google2FAController::class, 'verify2FAPost'])->name('2fa.verify.post');
    Route::post('2fa/disable', [App\Http\Controllers\Auth\Google2FAController::class, 'disable2FA'])->name('2fa.disable');
});

//===============Front routes===============//
Route::get('/home', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('home');
Route::get('/preview', [App\Http\Controllers\Front\HomeController::class, 'preview'])->name('preview');
Route::get('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'showSignupPage'])->name('signup');
Route::get('/reload-captcha', [App\Http\Controllers\Auth\RegisterController::class, 'reloadCaptcha']);

Route::get('/dealer-dashboard', [App\Http\Controllers\Front\DealerController::class, 'showDashboard'])->name('dealer-dashboard');
Route::get('/dealer-directory', [App\Http\Controllers\Front\DealerController::class, 'showDealerDirectory'])->name('dealer-directory');
Route::get('/dealer-directory/{id}', [App\Http\Controllers\Front\DealerController::class, 'showDealer'])->name('dealer-detail');
Route::get('/new-business', [App\Http\Controllers\Front\DealerController::class, 'newBusiness'])->name('new-business');
Route::get('/delete-business/{id}', [App\Http\Controllers\Front\DealerController::class, 'deleteBusiness'])->name('delete-business');
Route::get('/edit-business/{id}', [App\Http\Controllers\Front\DealerController::class, 'editBusiness'])->name('edit-business');
Route::get('/join-directory', [App\Http\Controllers\Front\DealerController::class, 'joinDirectory'])->name('join-directory');
Route::get('/links-directory', [App\Http\Controllers\Front\DealerController::class, 'linksDirectory'])->name('links-directory');
Route::post('/add-business', [App\Http\Controllers\Front\DealerController::class, 'addBusiness'])->name('add-business');
Route::post('/save-business', [App\Http\Controllers\Front\DealerController::class, 'saveBusiness'])->name('save-business');
Route::post('/upload-business-image', [App\Http\Controllers\Front\DealerController::class, 'uploadBusinessImage'])->name('upload-business-image');

// Route::get('/shop-our-store', [App\Http\Controllers\Front\ShopController::class, 'showShopOurStore'])->name('shop-our-store');
Route::get('/shop-our-store/category/{id}', [App\Http\Controllers\Front\ShopController::class, 'showCategory'])->name('category');
Route::get('/shop-our-store/product/{id}', [App\Http\Controllers\Front\ShopController::class, 'showProduct'])->name('product');

Route::get('/webdesign', [App\Http\Controllers\Front\WebdesignController::class, 'index'])->name('webdesign');
Route::get('/advertising', [App\Http\Controllers\Front\AdvertisingController::class, 'index'])->name('advertising');
Route::get('/policies', [App\Http\Controllers\Front\PoliciesController::class, 'index'])->name('policies');
Route::get('/contact', [App\Http\Controllers\Front\ContactController::class, 'index'])->name('contact');
Route::post('/send-contact', [App\Http\Controllers\Front\ContactController::class, 'send'])->name('send-contact');
Route::get('/search', [App\Http\Controllers\Front\ShopController::class, 'search'])->name('search');

//===============Admin routes===============//
Route::get('/admin', [App\Http\Controllers\Auth\LoginController::class, 'showAdminSigninPage'])->name('admin-signin');

Route::middleware(['auth', '2fa'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/pages-preview', [App\Http\Controllers\Admin\PagesController::class, 'showPreview'])->name('pages-preview');
    Route::post('/admin/save-preview', [App\Http\Controllers\Admin\PagesController::class, 'savePreview'])->name('save-preview');
    Route::get('/admin/pages-home', [App\Http\Controllers\Admin\PagesController::class, 'showHome'])->name('pages-home');
    Route::post('/admin/save-description', [App\Http\Controllers\Admin\PagesController::class, 'saveDescription'])->name('save-description');
    Route::post('/admin/save-image', [App\Http\Controllers\Admin\PagesController::class, 'saveImage'])->name('save-image');
    Route::post('/admin/save-slide-speed', [App\Http\Controllers\Admin\PagesController::class, 'saveSlideSpeed'])->name('save-slide-speed');
    Route::post('/admin/save-sidebar', [App\Http\Controllers\Admin\PagesController::class, 'saveSidebar'])->name('save-sidebar');
    Route::post('/admin/save-shop-buttons', [App\Http\Controllers\Admin\PagesController::class, 'saveShopButtons'])->name('save-shop-buttons');
    Route::get('/admin/delete-image', [App\Http\Controllers\Admin\PagesController::class, 'deleteImage'])->name('delete-image');
    Route::get('/admin/pages-join-directory', [App\Http\Controllers\Admin\PagesController::class, 'showJoinDirectory'])->name('pages-join-directory');
    Route::get('/admin/pages-shop-our-store', [App\Http\Controllers\Admin\PagesController::class, 'showShopOurStore'])->name('pages-shop-our-store');
    Route::get('/admin/pages-advertising', [App\Http\Controllers\Admin\PagesController::class, 'showAdvertising'])->name('pages-advertising');
    Route::get('/admin/pages-web-design', [App\Http\Controllers\Admin\PagesController::class, 'showWebDesign'])->name('pages-web-design');
    Route::get('/admin/pages-dealer-directory', [App\Http\Controllers\Admin\PagesController::class, 'showDealerDirectory'])->name('pages-dealer-directory');
    Route::get('/admin/pages-links-directory', [App\Http\Controllers\Admin\PagesController::class, 'showLinksDirectory'])->name('pages-links-directory');
    Route::get('/admin/pages-policies', [App\Http\Controllers\Admin\PagesController::class, 'showPolicies'])->name('pages-policies');
    Route::get('/admin/pages-contact', [App\Http\Controllers\Admin\PagesController::class, 'showContact'])->name('pages-contact');

    Route::get('/admin/dealers', [App\Http\Controllers\Front\DealerController::class, 'showDealers'])->name('dealers');
    Route::get('/admin/get-dealers', [App\Http\Controllers\Front\DealerController::class, 'getDealers'])->name('get-dealers');
    Route::post('/admin/delete-dealer', [App\Http\Controllers\Front\DealerController::class, 'deleteDealer'])->name('delete-dealer');
    Route::get('/admin/get-business', [App\Http\Controllers\Front\DealerController::class, 'getBusiness'])->name('get-business');
    Route::post('/admin/approve-deny', [App\Http\Controllers\Front\DealerController::class, 'setApproved'])->name('approve-deny');

    Route::get('/admin/categories', [App\Http\Controllers\Admin\ProductController::class, 'categories'])->name('categories');
    Route::get('/admin/get-categories', [App\Http\Controllers\Admin\ProductController::class, 'getCategories'])->name('get-categories');
    Route::post('/admin/save-category', [App\Http\Controllers\Admin\ProductController::class, 'saveCategory'])->name('save-category');
    Route::get('/admin/get-category', [App\Http\Controllers\Admin\ProductController::class, 'getCategory'])->name('get-category');
    Route::post('/admin/delete-category', [App\Http\Controllers\Admin\ProductController::class, 'deleteCategory'])->name('delete-category');

    Route::get('/admin/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products');
    Route::get('/admin/get-products', [App\Http\Controllers\Admin\ProductController::class, 'getProducts'])->name('get-products');
    Route::get('/admin/new-product', [App\Http\Controllers\Admin\ProductController::class, 'newProduct'])->name('new-product');
    Route::post('/admin/upload-product-image', [App\Http\Controllers\Admin\ProductController::class, 'uploadProductImage'])->name('upload-product-image');
    Route::post('/admin/add-product', [App\Http\Controllers\Admin\ProductController::class, 'addProduct'])->name('add-product');
    Route::get('/admin/edit-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'editProduct'])->name('edit-product');
    Route::post('/admin/update-product', [App\Http\Controllers\Admin\ProductController::class, 'updateProduct'])->name('update-product');
    Route::post('/admin/delete-product', [App\Http\Controllers\Admin\ProductController::class, 'deleteProduct'])->name('delete-product');

    Route::get('/admin/links', [App\Http\Controllers\Admin\LinkController::class, 'index'])->name('links');
    Route::get('/admin/get-links', [App\Http\Controllers\Admin\LinkController::class, 'getLinks'])->name('get-links');
    Route::post('/admin/save-link', [App\Http\Controllers\Admin\LinkController::class, 'saveLink'])->name('save-link');
    Route::get('/admin/get-link', [App\Http\Controllers\Admin\LinkController::class, 'getLink'])->name('get-link');
    Route::post('/admin/delete-link', [App\Http\Controllers\Admin\LinkController::class, 'deleteLink'])->name('delete-link');

    Route::get('/admin/settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('settings');
    Route::post('/admin/save-setting', [App\Http\Controllers\Admin\SettingsController::class, 'saveSetting'])->name('save-setting');
    Route::post('/admin/save-second-setting', [App\Http\Controllers\Admin\SettingsController::class, 'saveSecondSetting'])->name('save-second-setting');
    Route::post('/admin/update-admin', [App\Http\Controllers\Admin\SettingsController::class, 'updateAdmin'])->name('update-admin');
    Route::post('/admin/update-dev', [App\Http\Controllers\Admin\SettingsController::class, 'updateDev'])->name('update-dev');
    Route::post('/admin/update-contact', [App\Http\Controllers\Admin\SettingsController::class, 'updateContact'])->name('update-contact');
    Route::post('/admin/save-background-image', [App\Http\Controllers\Admin\SettingsController::class, 'saveBackgroundImage'])->name('save-background-image');
    Route::post('/admin/save-background-image-comingsoon', [App\Http\Controllers\Admin\SettingsController::class, 'saveBackgroundImageComingSoon'])->name('save-background-image-comingsoon');

    Route::get('/admin/contacts', [App\Http\Controllers\Front\ContactController::class, 'showContacts'])->name('contacts');
    Route::get('/admin/get-contacts', [App\Http\Controllers\Front\ContactController::class, 'getContacts'])->name('get-contacts');
    Route::post('/admin/delete-contact', [App\Http\Controllers\Front\ContactController::class, 'deleteContact'])->name('delete-contact');

    Route::get('/admin/items', [App\Http\Controllers\Admin\ProductController::class, 'viewItems'])->name('items');
    Route::get('/admin/get-items', [App\Http\Controllers\Admin\ProductController::class, 'getItems'])->name('get-items');
    Route::post('/admin/add-item', [App\Http\Controllers\Admin\ProductController::class, 'addItem'])->name('add-item');
    Route::get('/admin/get-item', [App\Http\Controllers\Admin\ProductController::class, 'getItem'])->name('get-item');
    Route::post('/admin/save-item', [App\Http\Controllers\Admin\ProductController::class, 'saveItem'])->name('save-item');

    Route::get('/admin/emails', [App\Http\Controllers\Admin\EmailsController::class, 'index'])->name('emails');
    Route::get('/admin/get-emails', [App\Http\Controllers\Admin\EmailsController::class, 'getEmails'])->name('get-emails');
    Route::post('/save-email', [App\Http\Controllers\Admin\EmailsController::class, 'saveEmail'])->name('save-email');
    Route::get('/get-email', [App\Http\Controllers\Admin\EmailsController::class, 'getEmail'])->name('get-email');
    Route::post('/delete-email', [App\Http\Controllers\Admin\EmailsController::class, 'deleteEmail'])->name('delete-email');
    Route::post('/sendEmail', [App\Http\Controllers\Admin\EmailsController::class, 'sendEmail'])->name('send-email');
});
