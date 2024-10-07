<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DailyPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisteredCompanyController;
use App\Http\Controllers\LoginCompanyController;
use App\Http\Controllers\CantonController;
use App\Http\Controllers\DistrictController;
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
Route::middleware('auth:sanctum')->get('/company', function (Request $request) {
    return $request->company();
});
Route::middleware('auth:sanctum')->post('/update-user', [UserController::class, 'update']);

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/companies/search', [CompanyController::class, 'search']);
Route::post('/search/store', [SearchController::class, 'store']);
Route::get('/searches/recent', [SearchController::class, 'recent']);
Route::get('/companies/suggestions', [SearchController::class, 'getSuggestions']);
Route::delete('/search/destroy/{id}', [SearchController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'categories']);
Route::get('/subcategories/{id}', [CategoryController::class, 'show']);
Route::get('/canton', [CategoryController::class, 'canton']);
Route::get('/district/{id}', [CategoryController::class, 'district']);
Route::get('/items/{id1}/{id2}/{id3}/{id4}', [CategoryController::class, 'getItems']);

Route::get('/companies', [CompanyController::class, 'show']);
Route::get('/company/{id}', [CompanyController::class, 'companyShow']);
Route::get('/subCategoryFilter/{id}', [CompanyController::class, 'subCategoryFilter']);
Route::get('/categoryFilter/{id}', [CompanyController::class, 'categoryFilter']);

Route::get('/filter/{$id_category}/{$id_subcategory}/{$id_canton}/{$id_district}', [CompanyController::class, 'categoryFilter']);



Route::post('/update-user', [UserController::class, 'update']);
Route::post('/change-password', [UserController::class, 'changePassword']);

Route::post('/forgot/password', [UserController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset/password/{token}', [UserController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/reset/password', [UserController::class, 'reset'])->name('password.reset');

Route::post('/create/post', [DailyPostController::class, 'store']);
Route::get('/posts', [DailyPostController::class, 'index']);
Route::post('/update/post/{id}', [DailyPostController::class, 'update']);
Route::get('/posts/{id}', [DailyPostController::class, 'show']);
Route::delete('/delete/post/{id}', [DailyPostController::class, 'destroy']);
Route::get('/company-posts', [DailyPostController::class, 'getCompanyPosts']);

Route::post('/company-register', [RegisteredCompanyController::class, 'store']);
Route::post('/company-login', [LoginCompanyController::class, 'login']);

Route::get('/cantons', [CantonController::class, 'index']);
Route::get('/cantons/{id}/districts', [DistrictController::class, 'getByCanton']);
