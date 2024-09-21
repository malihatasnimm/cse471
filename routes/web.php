

<?php

/*
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin.AdminLoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

// Define the route for the home page using HomeController
Route::get('/', [HomeController::class, 'index']);

// Remove the duplicate route definition for '/'
// Route::get('/', function() {
//     return view('welcome');
// });

// Define the route for the admin login page using AdminLoginController
Route::get('/admin/login', [AdminLoginController::class, 'index']);
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');

Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home');

// Authentication routes
Auth::routes();

// Define the route for the home page after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/



use App\Http\Controllers\Admin\AdminLoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TemplateController;

use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\ShopController; 
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ShoppingDetailsController;
use App\Http\Controllers\Frontend\ShoppingCartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\BlogDetailsController;

use App\Http\Controllers\Frontend\ShopGridController;

use App\Http\Controllers\NewsletterSubscriptionController;

Route::post('/subscribe', [NewsletterSubscriptionController::class, 'subscribe'])->name('subscribe');





Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
#Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
#Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');




Route::get('/search', [ShoppingCartController::class, 'search'])->name('search');
Route::get('/add-to-cart/{id}', [ShoppingCartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/shopping-cart', [ShoppingCartController::class, 'viewCart'])->name('shopping.cart');


use App\Http\Controllers\SubscriptionController;

Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscribe');


Route::get('/remove-from-cart/{id}', [ShoppingCartController::class, 'removeFromCart'])->name('remove.from.cart');

Route::get('/checkout', [ShoppingCartController::class, 'checkout'])->name('checkout');




Route::get('/shop-grid', [ShopGridController::class, 'index'])->name('shop-grid.index');


Route::get('/blog-details', [BlogDetailsController::class, 'index'])->name('blog-details.index');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

Route::get('/shopping-cart', [ShoppingCartController::class, 'index'])->name('shopping.cart');

Route::get('/shop-details', [ShoppingDetailsController::class, 'index'])->name('shop.details');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);


Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');



Route::get('/pages', [PagesController::class,'index'])->name('pages.index');


#Route::get('/blog', [BlogController::class, 'index']);


#Route::get('/shop', [ShopController::class, 'index']);







// Define the route for the admin login page using AdminLoginController
Route::get('/admin/login', [AdminLoginController::class, 'index']);
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');

Route::get('/home', [TemplateController::class, 'index']);
// Authentication routes
Auth::routes();

// Define the route for the home page after login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Define the route for the admin home page after login
Route::get('/admin/home', function () {
    return view('admin.home');
})->name('admin.home')->middleware('auth');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
