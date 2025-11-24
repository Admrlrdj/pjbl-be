<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

// Dynamic Pages
Route::get('/our-story', [HomeController::class, 'ourStory'])->name('our-story'); 
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'store'])->name('contact.store');

// Products
Route::get('/products', [HomeController::class, 'allProducts'])->name('products.all');
Route::get('/products/{slug}', [HomeController::class, 'productDetail'])->name('product.detail');
Route::get('/category/{slug}', [HomeController::class, 'productsByCategory'])->name('products.category');
Route::get('/search', [HomeController::class, 'searchProducts'])->name('products.search');


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
