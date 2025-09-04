<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Auth - register
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// Companies
use App\Http\Controllers\CompanyController;

Route::post('/companies/create', [CompanyController::class, 'create']);
Route::get('/companies/read', [CompanyController::class, 'read']);
Route::get('/companies/{id}', [CompanyController::class, 'readById']);
Route::get('/companies/me', [CompanyController::class, 'readMe']);
Route::put('/companies/{id}', [CompanyController::class, 'update']);


// // Available Position
// Route::post('/positions/create', [AvailablePositionController::class, 'create']);
// Route::get('/positions/active', [AvailablePositionController::class, 'getActive']);
// Route::get('/positions/my-created', [AvailablePositionController::class, 'getMyCreated']);
// Route::put('/positions/update/{id}', [AvailablePositionController::class, 'update']);
// Route::delete('/positions/drop/{id}', [AvailablePositionController::class, 'drop']);
