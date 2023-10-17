<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Guest\RatingController;
use App\Http\Controllers\Owner\ListingController;
use App\Http\Controllers\Guest\WishlistController;
use App\Http\Controllers\Admin\AdminListingController;
use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ListingRequestController;
use App\Http\Controllers\Guest\GuestReservationController;
use App\Http\Controllers\Owner\OwnerDashboardController;
use App\Http\Controllers\Owner\OwnerReservationController;
use App\Http\Controllers\Guest\ReservationRequestController;
use App\Models\Listing;
use App\Models\ListingRequest;

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


//Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/createGuest', [AuthController::class, 'create_guest']);
Route::get('/createOwner', [AuthController::class, 'create_owner']);
Route::post('/create/user', [AuthController::class, 'storeUser']);
Route::post('/create/owner', [AuthController::class, 'storeOwner']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::put('/profile/update', [UserController::class, 'update']);
Route::get('/account', [HomeController::class, 'settings'])->middleware('auth');

//OWNER
Route::get('/owner/dashboard', [OwnerDashboardController::class, 'dashboard']);
Route::get('/owner/listings', [ListingController::class, 'index']);
Route::get('/owner/reservations', [OwnerReservationController::class, 'index']);
Route::get('/owner/create-listing', [ListingController::class, 'create']);
Route::get('/owner/edit-listing/{listing}', [ListingController::class, 'edit']);
Route::post('/owner/createListing', [ListingController::class, 'store']);
Route::put('/owner/update-listing/details/{listing}', [ListingController::class, 'update_details']);
Route::put('/owner/update-listing/photos/{listing}', [ListingController::class, 'update_photos']);
Route::put('/owner/update-listing/property/{listing}', [ListingController::class, 'update_property']);
Route::put('/owner/update-listing/pricing/{listing}', [ListingController::class, 'update_pricing']);
Route::delete('/owner/delete-listing/{listing}', [ListingController::class, 'destroy']);

//ADMIN
Route::delete('/delete/listing/{listing}', [AdminListingController::class, 'destroy']);
Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboard'])->middleware('auth')->name('admin-dashboard');
Route::delete('/user/delete/{user}', [UserController::class, 'destroy']);
Route::get('/admin/create-admin', [AdminController::class, 'create']);
Route::get('/admin/manage-users', [UserController::class, 'index'])->name('manage_users');
Route::get('/admin/manage-users/{entry}', [UserController::class, 'manage_users_entry'])->name('manage_users_entry');
Route::get('/admin/manage-listings', [AdminListingController::class, 'index'])->name('manage_listing');
Route::get('/admin/manage-listings/{entry}', [AdminListingController::class, 'manage_listing_entry']);
Route::get('/admin/manage-reservations', [AdminReservationController::class, 'index']);
Route::get('/admin/listing-requests', [ListingRequestController::class, 'index']);
Route::put('/admin/approve-listing/{listing}', [ListingRequestController::class, 'approve']);
Route::put('/admin/decline-listing/{listing}', [ListingRequestController::class, 'decline']);

//GUEST
Route::post('/reserve', [ReservationRequestController::class, 'store']);
Route::get('/confirm-reservation/{listing}', [HomeController::class, 'confirm_reservation'])->middleware('auth');
Route::post('/wishlist/save', [WishlistController::class, 'store'])->middleware('auth');
Route::delete('/wishlist/unsave',[WishlistController::class, 'destroy'])->middleware('auth');
Route::get('/wishlists', [WishlistController::class, 'index'])->middleware('auth');
Route::post('/rate-listing/{listing_id}', [RatingController::class, 'store'])->middleware('auth');
Route::put('/reservations/cancel/{reservation}', [GuestReservationController::class, 'cancel']);
Route::get('/map', [HomeController::class, 'map']);
Route::get('/reservations', [HomeController::class, 'reservations'])->middleware('auth')->name('reservations');
Route::get('/room/{listing}', [HomeController::class, 'show']);
Route::get('/guidelines', [HomeController::class, 'guidelines']);
Route::get('/rules', [HomeController::class, 'rules']);
Route::get('/profile/{user}', [HomeController::class, 'profile']);
Route::get('/',[HomeController::class, 'index']);
Route::get('/contact-us', [HomeController::class, 'contact_us']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/notifications', [HomeController::class, 'notifications']);

// Route::get('/about', function() {
//     return Inertia::render('About');
// });





