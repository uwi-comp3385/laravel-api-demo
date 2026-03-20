<?php

use App\Http\Controllers\Api\V1\EventController;
use App\Http\Controllers\AuthController;
use App\Models\User;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Unauthenticated requests that hit auth:api middleware get redirected here
Route::get('login', fn () => response()->json(['message' => 'Token invalid or missing.'], 401))->name('login');

// JWT Auth routes
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('generate-token', [AuthController::class, 'generateToken']);

// Sanctum Auth routes
Route::post('sanctum/login', [AuthController::class, 'sanctumLogin']);
Route::middleware('auth:sanctum')->post('sanctum/logout', [AuthController::class, 'sanctumLogout']);

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);

    Route::get('users', fn () => User::all());

    Route::prefix('v1')->group(function () {
        Route::get('events', [EventController::class, 'index']);
        Route::post('events', [EventController::class, 'store']);
        Route::get('events/{id}', [EventController::class, 'show']);
        Route::put('events/{id}', [EventController::class, 'update']);
        Route::delete('events/{id}', [EventController::class, 'destroy']);
    });
});

// or you could generate a CRUD API routes
// Route::apiResource('v1/events', EventController::class)->middleware('auth:api');
