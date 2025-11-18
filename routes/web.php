<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// Development Routes
Route::view('/example-page', 'example-page');
Route::view('/example-auth', 'example-auth');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest', 'preventBackHistory'])->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/login', 'loginForm')->name('login');
            Route::post('/login', 'loginHandler')->name('login_handler');
            Route::get('/forgot-password', 'forgotForm')->name('forgot');
        });
    });

    Route::middleware(['auth', 'preventBackHistory'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'adminDashboard')->name('dashboard');
            Route::post('/logout', 'logoutHandler')->name('logout');
            Route::get('/profile', 'profileView')->name('profile');
            Route::post('/update-profile-picture', 'updateProfilePicture')->name('update_profile_picture');
            Route::get('/settings', 'generalSettings')->name('settings');
            Route::post('/update-logo', 'updateLogo')->name('update_logo');
            Route::post('/update-favicon', 'updateFavicon')->name('update_favicon');
            Route::get('/categories', 'categoriesPage')->name('categories');
            Route::get('/products', 'productsPage')->name('products');
            Route::get('/contact-us', 'contactUsPage')->name('contact_us');
            Route::get('/locations', 'locationsPage')->name('locations');
            Route::get('/faqs', 'faqsPage')->name('faqs');
            Route::get('/testimonials', 'testimonialsPage')->name('testimonials');
        });
    });
});
