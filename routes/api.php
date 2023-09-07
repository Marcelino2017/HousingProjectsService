<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Houses\HouseController;
use App\Http\Controllers\HousingProject\HousingProjectController;
use App\Http\Controllers\Payments\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function ()  {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::controller(HousingProjectController::class)->group(function () {
        Route::get('/housingproject', 'index')->name('index');
        Route::post('housingproject', 'store')->name('store');
        Route::get('/housingproject/{housingProject}', 'show')->name('show');
        Route::put('/housingproject/{housingProject}', 'update')->name('update');
        Route::delete('/housingproject/{housingProject}', 'destroy')->name('destroy');
    });

    Route::controller(HouseController::class)->group(function () {
        Route::get('/house', 'index')->name('index');
        Route::post('house', 'store')->name('store');
        Route::get('/house/{house}', 'show')->name('show');
        Route::put('/house/{house}', 'update')->name('update');
        Route::delete('/house/{house}', 'destroy')->name('destroy');
    });

    Route::controller(PaymentController::class)->group(function () {
        Route::get('/payment', 'index')->name('index');
        Route::post('payment', 'store')->name('store');
        Route::get('/payment/{payment}', 'show')->name('show');
        Route::put('/payment/{payment}', 'update')->name('update');
        Route::delete('/payment/{payment}', 'destroy')->name('destroy');
    });
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
