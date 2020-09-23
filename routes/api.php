<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [\App\Http\Controllers\Api\Auth\AuthController::class, 'login'])
    ->name('api.auth.login');

Route::post('/register', [\App\Http\Controllers\Api\Auth\AuthController::class, 'register'])
    ->name('api.auth.register');

Route::post('/logout', [\App\Http\Controllers\Api\Auth\AuthController::class, 'logout'])
    ->name('api.auth.logout');

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', [\App\Http\Controllers\Api\User\UserController::class, 'index'])
        ->name('api.user.index');

    Route::get('/movies', [\App\Http\Controllers\Api\Movie\MovieController::class, 'index'])
        ->name('api.movie.index');

    Route::get('/movies/{id}', [\App\Http\Controllers\Api\Movie\MovieController::class, 'show'])
        ->name('api.movie.show');

    Route::get('/categories', [\App\Http\Controllers\Api\Category\CategoryController::class, 'index'])
        ->name('api.category.index');

    Route::get('/categories', [\App\Http\Controllers\Api\Category\CategoryController::class, 'index'])
        ->name('api.category.index');

    Route::get('/payment/setup-intent', [\App\Http\Controllers\Api\Payment\PaymentController::class, 'index'])
        ->name('api.payment.index');

    Route::post('/payment/store', [\App\Http\Controllers\Api\Payment\PaymentController::class, 'store'])
        ->name('api.payment.store');

});
