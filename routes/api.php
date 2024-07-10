<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SupplierController;
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
Route::post('/auth/login', [AuthenticatedSessionController::class, 'login']);
Route::post('/auth/logout', [AuthenticatedSessionController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/auth/user', [AuthenticatedSessionController::class, 'getUser'])->middleware('auth:sanctum');
Route::get('/locations', [LocationController::class, 'getLocations']);
Route::get('/locations/{id}', [LocationController::class, 'show']);
Route::apiResource('employees', EmployeeController::class);

