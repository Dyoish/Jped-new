<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//API CONTROLLERS
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ForgotPasswordController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\AddressController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\OtherProducts;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These 
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//AUTHENTICATION
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
Route::post('/reset-password', [ForgotPasswordController::class, 'reset']);

Route::post('/profile/update-profile', [ProfileController::class, 'update_profile'])->middleware('auth:sanctum');
Route::post('/profile/change-password', [ProfileController::class, 'change_password'])->middleware('auth:sanctum');

// FOR ADMIN // TESTS //
Route::apiResource('users', UserController::class);


//trial