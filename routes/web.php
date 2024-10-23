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
Route::group(['middleware' => 'auth'], function () {

    //PROFILE
    Route::get('/change_number', [Profile_Controller::class, 'New_PhoneNumber_Route']);

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
Route::get('/verify', function () {
    return view('Verify_Page');
});
Route::post('/verify', function () {
    return view('Verify_Page');
});
Route::post('/verify', [ForgetPasswordManager::class, 'forgetPassword'])->name('Verify_Page');

Route::get('/enterEmail', [ForgetPasswordManager::class, 'forgetPassword'])->name("forget.password");
Route::post('/enterEmail', [ForgetPasswordManager::class, 'forgetPasswordPost'])->name("forget.password.post");
Route::get('/conPass/{token}', [ForgetPasswordManager::class, 'resetPassword'])->name("resetPassword")->name("reset.password");
Route::post('/conPass', [ForgetPasswordManager::class, 'resetPasswordPost'])->name("resetPassword")->name("reset.password.post");

Route::get('/forget-password', [ForgetPasswordManager::class, 'forgetPassword'])->name('forget.password');
Route::post('/forget-password', [ForgetPasswordManager::class, 'forgetPasswordPost']);
Route::get('/reset-password/{token}', [ForgetPasswordManager::class, 'resetPassword'])->name('reset.password');
Route::post('/reset-password', [ForgetPasswordManager::class, 'resetPasswordPost']);

Route::get('/adminlogin', [DashboardController::class, 'adminlogin']);
Route::post('/adminlogin', [DashboardController::class, 'adminAuth'])->name('adminpost');

//Admin panel
Route::group(['middleware' => 'userid'], function () {
    Route::get('/admindashboards', [DashboardController::class, 'admindashboard'])->name('admindashboards');
    Route::get('/adminbookings', [DashboardController::class, 'adminbookings']);
    Route::get('/admincustomers', [DashboardController::class, 'admincustomers']);
    Route::get('/admincustomers/{id}/delete', [UserController::class, 'destroy']);

    // Route for the statistics page
    Route::get('/adminstatistics', [StatisticsController::class, 'index'])->name('admin.statistics');

    // Route::get('productmanagements/create',[App\Http\Controllers\productController::class,'create']);
// Route::post('productmanagements/create',[App\Http\Controllers\productController::class,'store']);
// Route::get('productmanagements/{id}/edit',[App\Http\Controllers\productController::class,'edit']);
// Route::put('productmanagements/{id}/edit',[App\Http\Controllers\productController::class,'update']);
// Route::get('productmanagements/{id}/delete',[App\Http\Controllers\productController::class,'destroy']);
});

//products
Route::get('/product_demo/{id}', [DashboardController::class, 'details']);
Route::get('/terms', [DashboardController::class, 'terms']);

//Photography Categories/Services
Route::get('/portrait_category', [Category_Controller::class, 'Portrait_Category_Route']);
Route::get('/concert_category', [Category_Controller::class, 'Concert_Category_Route']);
Route::get('/events_category', [Category_Controller::class, 'Events_Category_Route']);
Route::get('/companion_category', [Category_Controller::class, 'Companion_Category_Route']);
Route::get('/cosplay_category', [Category_Controller::class, 'Cosplay_Category_Route']);
Route::get('/model_category', [Category_Controller::class, 'Model_Category_Route']);
Route::get('/products_category', [Category_Controller::class, 'Products_Category_Route']);
Route::get('/monitor_category', [Category_Controller::class, 'Monitor_Category_Route']);
Route::get('/pre_built_units', [Category_Controller::class, 'PreBuilt_Category_Route']);
Route::get('/documentary_category', [Category_Controller::class, 'Documentary_Category_Route']);

Route::get('/gallery', function () {
    return view('Gallery');
});

Route::get('/about', function () {
    return view('aboutus');
});

//Route::get('/', [GalleryController::class, 'index']);

Route::get('/book', [BookController::class, 'index']);
// Route::get('Book', BookController::class,);

// Define the route for showing the booking form

Route::post('/books', [BookController::class, 'store']);

Route::post('/add_booking/{id}', [BookController::class, 'add_booking']);
Route::post('/add_booking', [BookController::class, 'store'])->name('add_booking');


Route::get('/booking-form', [BookController::class, 'showBookingForm'])->name('show_booking_form');

Route::get('/booking', [BookController::class, 'showAllBookings'])->name('show_all_bookings');

//admin button (?)
Route::get('/dashboard/bookings/pending', [DashboardController::class, 'pendingBookings'])->name('dashboard.bookings.pending');
Route::patch('/dashboard/bookings/confirm/{id}', [DashboardController::class, 'confirmBooking'])->name('dashboard.bookings.confirm');
Route::patch('/dashboard/bookings/reject/{id}', [DashboardController::class, 'rejectBooking'])->name('dashboard.bookings.reject');

//admin button
Route::post('/booking/{id}/approve', [DashboardController::class, 'approveBooking'])->name('approveBooking');
Route::post('/booking/{id}/reject', [DashboardController::class, 'rejectBooking'])->name('rejectBooking');

//booking info button *website)
Route::post('/bookings/{id}/cancel', [BookController::class, 'cancel'])->name('bookings.cancel');

//export data
// Route::get('bookings/export', function () {
//     return Excel::download(new BookingsExport, 'bookings.xlsx');
// })->name('bookings.export');

Route::get('bookings/export/csv', function () {
    $exporter = new BookingsExport();
    return $exporter->exportCSV();
})->name('bookings.export.csv');

Route::get('/export-bookings', [DashboardController::class, 'exportBookings'])->name('export.bookings');

//update button
Route::post('/bookings/update/{id}', [BookController::class, 'update'])->name('bookings.update');

Route::get('/bookings/{id}/edit', [BookController::class, 'edit'])->name('bookings.edit');

Route::get('/bookings', [BookController::class, 'index'])->name('bookings.index');

// cancel button
Route::post('/bookings/{id}/cancel', [BookController::class, 'cancel'])->name('bookings.cancel');

Route::delete('/bookings/{id}/cancel', [BookController::class, 'cancel'])->name('bookings.cancel');
Route::post('/bookings/cancel/{id}', [BookController::class, 'cancel'])->name('bookings.cancel');

//admin: approve and reject
Route::post('/bookings/approve/{id}', [DashboardController::class, 'approve'])->name('bookings.approve');
Route::post('/bookings/cancel/{id}', [DashboardController::class, 'cancel'])->name('bookings.cancel');

Route::post('/check_booking', [BookController::class, 'checkBooking']);