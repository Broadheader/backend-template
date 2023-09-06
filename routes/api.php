<?php

use App\Http\Controllers\API\Authentication\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Models\Subscription;
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

    Route::post('auth/login', [AuthController::class, 'login']);

    
    Route::apiResource('subscriptions', SubscriptionController::class);
    Route::get('services', [ServiceController::class, 'index']);

    Route::middleware('auth:sanctum')->group( function () {
        Route::apiResource('services', ServiceController::class);
        // Route::resource('products', ProductController::class);  
        Route::apiResource('users', UserController::class);
        Route::apiResource('branches', BranchController::class);  
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('clients', ClientController::class);
        Route::apiResource('client-subscriptions', SubscriptionController::class);
        Route::apiResource('cars', CarController::class);
        Route::apiResource('cashiers', CashierController::class);
        Route::apiResource('history', HistoryController::class);

        Route::get('managers', [UserController::class, 'managers']);
    });
