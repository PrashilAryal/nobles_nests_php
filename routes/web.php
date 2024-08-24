<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\BlogController;

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

// START: Page Routes
Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/contact', [AuthController::class, 'contact'])->name('contact');
Route::get('/all-properties', [AuthController::class, 'properties'])->name('properties');
Route::get('/about-us', [AuthController::class, 'about'])->name('about');
// END: Page Routes

// Start: User Controller Routes
Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
// End: User Controller Routes

// Start: User Register Routes
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
// End: User Register Routes

// Start: User Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/', [AuthController::class, 'home'])->name('home');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// End: User Login Routes

// Start: Profile routes
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile')->middleware('auth');
Route::get('/dashboard', [ProfileController::class, 'showDashboard'])->name('dashboard')->middleware('auth');
// End: Profile routes

// Start: Property Controller Routes
Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.show');
Route::get('/properties', [PropertyController::class, 'addPropertyView'])->name('propertiesAdd')->middleware('auth');
Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store')->middleware('auth');
Route::get('/properties/{property}/edit', [PropertyController::class, 'edit'])->name('propertiesEdit')->middleware('auth');
Route::put('/properties/{property}', [PropertyController::class, 'update'])->name('properties.update')->middleware('auth');
Route::patch('properties/{property}/delete', [PropertyController::class, 'propertyDestroy'])->name('propertyDestroy')->middleware('auth');
// End: Property Controller Routes

// Route::get('/users/details{user}', [UserController::class, 'show'])->name('user.show')->middleware('auth');

// Start: User Controller Routes - Self
Route::get('/users', [UserController::class, 'addUserView'])->name('usersAdd')->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('userEdit')->middleware('auth');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::patch('users/{users}/destroy', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');
// End: User Controller Routes - Self

// START: Message
Route::post('/send-message', [MessageController::class, 'send_message'])->name('send_message');
Route::get('/view-message', [MessageController::class, 'view_message']);
Route::get('/delete-message/{id}', [MessageController::class, 'delete_message']);
// END: Message

// START: Admin Control
Route::get('/adminDashboard', [ProfileController::class, 'showAdminDashboard'])->name('adminDashboard')->middleware('auth');

Route::get('/view-users', [AuthController::class, 'view_user']);
Route::get('/view-properties', [AuthController::class, 'view_properties']);
Route::get('/blog-upload', [BlogController::class, 'blog_Upload'])->name('blog-Upload');
Route::post('/blog-store', [BlogController::class, 'store'])->name('blogs.store');
Route::patch('properties/{property}/destroy', [AuthController::class, 'adminDestroyProperty'])->name('properties.adminDestroyProperty')->middleware('auth');

// Route for the search form page
Route::get('/search', [PropertyController::class, 'search_properties'])->name('search_properties');

// Route for the search results page
Route::get('/results', [PropertyController::class, 'search_results'])->name('search_results');

Route::get('/transactions', [AuthController::class, 'transactions'])->name('transactions');
// END: Admin Control

// START: Stripe Payment
// Route::get('products/{id}', [PropertyController::class, 'show']);
Route::get('stripe/{id}', [StripeController::class, 'stripe']);
Route::post('stripe/{id}', [StripeController::class, 'stripePost'])->name('stripe.post');
// END: Stripe Payment

// START : Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog-details/{id}', [BlogController::class, 'blog_details'])->name('blog.details');
// END : Blog