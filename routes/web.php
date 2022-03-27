<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardStoreSettingController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
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


Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/detail/{id}', [DetailController::class, 'index'])->name('detail');
Route::post('/detail/{id}', [DetailController::class, 'create'])->name('add-to-cart');

Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/{id}', [CategoryController::class, 'detail'])->name('category-detail');



Route::post('/checkout/callback', [CheckoutController::class, 'callback'])->name('midtrans-callback');

Route::get('/success', [CartController::class, 'success'])->name('success');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart-delete');

    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard-home');
    Route::get('/dashboard-product', [DashboardProductController::class, 'index'])->name('dashboard-product');
    Route::get('/dashboard-product-create', [DashboardProductController::class, 'create'])->name('dashboard-product-create');
    Route::post('/dashboard-product-store', [DashboardProductController::class, 'store'])->name('dashboard-product-store');
    Route::get('/dashboard-product-detail/{id}', [DashboardProductController::class, 'show'])->name('dashboard-product-detail');
    Route::post('/dashboard-product-detail/{id}', [DashboardProductController::class, 'update'])->name('dashboard-product-update');
    Route::post('/dashboard-product-detail/gallery/upload', [DashboardProductController::class, 'uploadGallery'])->name('dashboard-product-gallery-upload');
    Route::get('/dashboard-product-detail/gallery/delete/{id}', [DashboardProductController::class, 'deleteGallery'])->name('dashboard-product-gallery-delete');


    Route::get('/dashboard-transaction', [DashboardTransactionController::class, 'index'])->name('dashboard-transaction');
    Route::get('/dashboard-transaction-detail/{id}', [DashboardTransactionController::class, 'show'])->name('dashboard-transaction-detail');
    Route::post('/dashboard-transaction-detail/{id}', [DashboardTransactionController::class, 'update'])->name('dashboard-transaction-update');

    Route::get('/dashboard-account-setting', [DashboardSettingController::class, 'account'])->name('dashboard-account-setting');
    Route::get('/dashboard-store-setting', [DashboardSettingController::class, 'store'])->name('dashboard-store-setting');
    Route::post('/dashboard-redirect-setting/{redirect}', [DashboardSettingController::class, 'update'])->name('dashboard-redirect-setting');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin-dashboard');
    Route::resource('category', AdminCategoryController::class);
    Route::resource('user', UserController::class);
    Route::resource('product', ProductController::class);
    Route::resource('product-galleries', ProductGalleryController::class);
    Route::resource('banner-homepage', BannerController::class);
});
