<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Authentication_Controller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\Authetication_Controller;
use App\Http\Controllers\Category_Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Profile_Controller;
use App\Http\Controllers\BookController;
use Symfony\Component\HttpKernel\Profiler\Profile;

use App\Http\Controllers\PasswordResetController;

use App\Exports\BookingsExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\StatisticsController;


use App\Http\Controllers\GalleryController;

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
// Route::get('/dashboard',[DashboardController::class, 'dashboard']);

// Route::get('/login',[LoginController::class, 'login']);

// Route::get('/signup',[SignupController::class, 'signup']);

Route::get('/', function () {
    return view('DashBoard');
})->name('home');
;
Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
;

//Authentication
Route::get('/login', [LoginController::class, 'Login'])->name('Login');
Route::post('/login', [LoginController::class, 'Loginpost'])->name('Login.post');
Route::get('/signup', [LoginController::class, 'Signup'])->name('Signup');
Route::post('/signup', [LoginController::class, 'Signuppost'])->name('Signup.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//PROFILE
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [Profile_Controller::class, 'Profile_Route']);

    Route::get('/change_passwordV', [Profile_Controller::class, 'Pass_Verification_Route']);
    Route::post('/change_password', [Profile_Controller::class, 'New_Password_Route']);
    Route::get('/change_email', [Profile_Controller::class, 'New_Email_Route']);
    Route::get('/my_account/edit', [LoginController::class, 'edit'])->name('user.edit-profile');
    Route::put('/my_account', [LoginController::class, 'update'])->name('user.update-profile');
    Route::get('/my_account', [LoginController::class, 'Profile_Route'])->name('user.profile');

    Route::get('/verify', function () {
        return view('Verify_Page');
    });

    Route::post('/verify', function () {
        return view('Verify_Page');
    });
});

//FORGOT PASSWORD
Route::get('/verify', function () {
    return view('Verify_Page');
});
Route::post('/verify', function () {
    return view('Verify_Page');
});
Route::get('/forget-password', [ForgetPasswordManager::class, 'forgetPassword'])->name('forget.password');
Route::post('/forget-password', [ForgetPasswordManager::class, 'forgetPasswordPost'])->name('forget.password.post');
Route::get('/reset-password/{token}', [ForgetPasswordManager::class, 'showResetForm'])->name('reset.password');
Route::post('/reset-password', [ForgetPasswordManager::class, 'resetPasswordPost'])->name('reset.password.post');
Route::post('/password/update', [ForgetPasswordManager::class, 'updatePassword'])->name('password.update');

//ADMIN LOGIN
Route::get('/adminlogin', [DashboardController::class, 'adminlogin']);
Route::post('/adminlogin', [DashboardController::class, 'adminAuth'])->name('adminpost');

//Admin panel
Route::group(['middleware' => 'userid'], function () {
    Route::get('/admindashboards', [DashboardController::class, 'admindashboard'])->name('admindashboards');
    Route::get('/adminbookings', [DashboardController::class, 'adminbookings']);
    Route::get('/admincustomers', [DashboardController::class, 'admincustomers']);
    Route::get('/admincustomers/{id}/delete', [UserController::class, 'destroy']);

});


//Photography Categories/Services
Route::get('/portrait_category', [Category_Controller::class, 'Portrait_Category_Route']);
Route::get('/concert_category', [Category_Controller::class, 'Concert_Category_Route']);
Route::get('/companion_category', [Category_Controller::class, 'Companion_Category_Route']);
Route::get('/cosplay_category', [Category_Controller::class, 'Cosplay_Category_Route']);
Route::get('/model_category', [Category_Controller::class, 'Model_Category_Route']);
Route::get('/products_category', [Category_Controller::class, 'Products_Category_Route']);

Route::get('/gallery', function () {
    return view('Gallery');
});

//ABOUT US 
Route::get('/about', function () {
    return view('aboutus');
});


//BOOKING ROUTES
Route::get('/book', [BookController::class, 'index']);

Route::post('/books', [BookController::class, 'store']);

Route::post('/add_booking/{id}', [BookController::class, 'add_booking']);
Route::post('/add_booking', [BookController::class, 'store'])->name('add_booking');

Route::get('/booking-form', [BookController::class, 'showBookingForm'])->name('show_booking_form');

Route::get('/booking', [BookController::class, 'showAllBookings'])->name('show_all_bookings');


//admin button on booking (accept, reject)
Route::get('/dashboard/bookings/pending', [DashboardController::class, 'pendingBookings'])->name('dashboard.bookings.pending');
Route::patch('/dashboard/bookings/confirm/{id}', [DashboardController::class, 'confirmBooking'])->name('dashboard.bookings.confirm');
Route::patch('/dashboard/bookings/reject/{id}', [DashboardController::class, 'rejectBooking'])->name('dashboard.bookings.reject');

//admin button on booking (accept, reject)
Route::post('/booking/{id}/approve', [DashboardController::class, 'approveBooking'])->name('approveBooking');
Route::post('/booking/{id}/reject', [DashboardController::class, 'rejectBooking'])->name('rejectBooking');

//booking info cancel button)
Route::post('/bookings/{id}/cancel', [BookController::class, 'cancel'])->name('bookings.cancel');

//export table on admin booking
Route::get('bookings/export/csv', function () {
    $exporter = new BookingsExport();
    return $exporter->exportCSV();
})->name('bookings.export.csv');

Route::get('/export-bookings', [DashboardController::class, 'exportBookings'])->name('export.bookings');

//update button
Route::post('/bookings/update/{id}', [BookController::class, 'update'])->name('bookings.update');
Route::get('/bookings/{id}/edit', [BookController::class, 'edit'])->name('bookings.edit');
Route::get('/bookings', [BookController::class, 'index'])->name('bookings.index');

//wala to
Route::post('/bookings/{id}/reject', [BookController::class, 'reject'])->name('bookings.reject');

//admin: approve and reject
Route::post('/bookings/approve/{id}', [DashboardController::class, 'approve'])->name('bookings.approve');
Route::post('/bookings/{id}/reject', [DashboardController::class, 'reject'])->name('bookings.reject');

//confirm booking
Route::post('/conPass', [PasswordResetController::class, 'sendResetLink']);

Route::post('/check_booking', [BookController::class, 'checkBooking']);