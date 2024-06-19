<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', [AuthController::class, 'home'])->name('home')->middleware('auth');

// Route::get('/', function () {
//     return view('home');
// });

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
Route::get('/', [AuthController::class, 'home'])->name('home')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// End: User Login Routes

// Start: Profile routes
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile')->middleware('auth');
Route::get('/dashboard', [ProfileController::class, 'showDashboard'])->name('dashboard')->middleware('auth');
// End: Profile routes


// Start: Property Controller Routes
Route::get('/properties', [PropertyController::class, 'addPropertyView'])->name('propertiesAdd')->middleware('auth');
Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store')->middleware('auth');
Route::get('/properties/{property}/edit', [PropertyController::class, 'edit'])->name('propertiesEdit')->middleware('auth');
Route::put('/properties/{property}', [PropertyController::class, 'update'])->name('properties.update')->middleware('auth');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');
Route::patch('properties/{property}/destroy', [PropertyController::class, 'destroy'])->name('properties.destroy')->middleware('auth');
// End: Property Controller Routes

// Route::get('/users/details{user}', [UserController::class, 'show'])->name('user.show')->middleware('auth');

// Start: User Controller Routes
Route::get('/users', [UserController::class, 'addUserView'])->name('usersAdd')->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('userEdit')->middleware('auth');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::patch('users/{users}/destroy', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');
// End: User Controller Routes