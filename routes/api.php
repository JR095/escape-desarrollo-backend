<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;

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
Route::middleware('auth:sanctum')->post('/update-user', [UserController::class, 'update']);

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/companies/search', [CompanyController::class, 'search']);
Route::post('/search/store', [SearchController::class, 'store']);
Route::get('/searches/recent', [SearchController::class, 'recent']);
Route::get('/companies/suggestions', [SearchController::class, 'getSuggestions']);
Route::delete('/search/destroy/{id}', [SearchController::class, 'destroy']);

Route::post('/update-user', [UserController::class, 'update']);
Route::post('/change-password', [UserController::class, 'changePassword']);

Route::post('/forgot/password', [UserController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset/password/{token}', [UserController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/reset/password', [UserController::class, 'reset'])->name('password.reset');