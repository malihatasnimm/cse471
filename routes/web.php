

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

// Define the route for the home page using HomeController
Route::get('/', [HomeController::class, 'index']);

// Define the route for the admin login page using AdminLoginController
Route::get('/admin/login', [AdminLoginController::class, 'index']);
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');

// Authentication routes
Auth::routes();

// Define the route for the home page after login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Define the route for the admin home page after login
Route::get('/admin/home', function () {
    return view('admin.home');
})->name('admin.home')->middleware('auth');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
