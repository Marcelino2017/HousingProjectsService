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
        Route::get('/housingproject', 'index');
        Route::post('housingproject', 'store');
        Route::get('/housingproject/{housingProject}', 'show');
        Route::put('/housingproject/{housingProject}', 'update');
        Route::delete('/housingproject/{housingProject}', 'destroy');
    });

    Route::controller(HouseController::class)->group(function () {
        Route::get('/house', 'index');
        Route::post('house', 'store');
        Route::get('/house/{house}', 'show')->name('show');
        Route::put('/house/{house}', 'update');
        Route::delete('/house/{house}', 'destroy');
    });

    Route::controller(PaymentController::class)->group(function () {
        Route::get('/payment', 'index');
        Route::post('payment', 'store');
        Route::get('/payment/{payment}', 'show');
        Route::put('/payment/{payment}', 'update');
        Route::delete('/payment/{payment}', 'destroy');
    });
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
