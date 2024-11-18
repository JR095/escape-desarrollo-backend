<?php

use App\Models\Company;
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
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\LoginCompanyController;
use App\Http\Controllers\CantonController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ContactController;
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
Route::post('/favorite', [UserController::class, 'favorite']);
Route::post('/follower', [FollowerController::class, 'follower']);

Route::get('/favorites/{id}', [UserController::class, 'getFavorites']);
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
Route::get('/items/{idCategory}/{idSubCategory}/{idCanton}/{idDistrict}/{id}', [CategoryController::class, 'getItems']);
Route::get('/favorite/{idCategory}/{idSubCategory}/{idCanton}/{idDistrict}/{user_id}', [CategoryController::class, 'getFavoriteFilter']);

Route::get('/companies/{id}', [CompanyController::class, 'show']);
Route::get('/company/{id}/{user}', [CompanyController::class, 'companyShow']);
Route::get('/companyinfo/{id}/{user}', [CompanyController::class, 'companyInfo']);

Route::get('/subCategoryFilter/{id}', [CompanyController::class, 'subCategoryFilter']);
Route::get('/categoryFilter/{id}', [CompanyController::class, 'categoryFilter']);
Route::get('/following/{id}', [CompanyController::class, 'companyfollow']);

Route::get('/filter/{$id_category}/{$id_subcategory}/{$id_canton}/{$id_district}', [CompanyController::class, 'categoryFilter']);

Route::post('/update-user', [UserController::class, 'update']);
Route::post('/change-password', [UserController::class, 'changePassword']);
Route::post('/change-password-company', [CompanyController::class, 'changePassword']);

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

Route::post('/update-company', [CompanyController::class, 'update']);

Route::get('/rating', [RatingController::class, 'index']);
Route::post('/save-rating', [RatingController::class, 'store']);

Route::middleware('auth:api')->get('/authenticated-user', [UserController::class, 'getAuthenticatedUser']);
Route::middleware('auth:company')->get('/authenticated-company', [CompanyController::class, 'getAuthenticatedCompany']);

Route::post('/create/comment', [CommentController::class, 'store']);
Route::get('/posts/{postId}/comments', [CommentController::class, 'getPostComments']);
Route::post('/update/comment/{id}', [CommentController::class, 'update']);
Route::delete('/delete/comment/{id}', [CommentController::class, 'destroy']);
Route::get('/count/comments/{postId}', [CommentController::class, 'countComments']); 

Route::post('/posts/{postId}/like', [LikesController::class, 'toggleLike']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/translate', [TranslationController::class, 'translate']);

Route::post('/forgot/password', [UserController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset/password/{token}', [UserController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/reset/password', [UserController::class, 'reset'])->name('password.reset');

Route::get('password/reset/{token}', function ($token) {
    Log::info('Reset password route hit with token: ' . $token);
    return app()->make('App\Http\Controllers\UserController')->showResetForm($token);
})->name('password.reset');

Route::post('/reset/password', [UserController::class, 'reset'])->name('password.reset');

Route::post('/company/forgot/password', [CompanyController::class, 'sendResetLinkEmail'])->name('company.password.email');
Route::get('/company/reset/password/{token}', [CompanyController::class, 'showResetForm'])->name('company.password.reset-company.form');
Route::post('/company/reset/password', [CompanyController::class, 'reset'])->name('company.password.reset-company');

Route::get('company/password/reset/{token}', function ($token) {
    Log::info('Reset password route hit with token: ' . $token);
    return app()->make('App\Http\Controllers\CompanyController')->showResetForm($token);
})->name('password.reset-company');

Route::post('/company/reset/password', [CompanyController::class, 'reset'])->name('company.password.reset-company');

Route::post('upload-image', [CompanyController::class, 'uploadImage']);

Route::post('/contact', [ContactController::class, 'store']);
