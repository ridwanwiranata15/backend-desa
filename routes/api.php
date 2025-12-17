<?php

use App\Http\Controllers\Api\Admin\DashboardController;
use App\Http\Controllers\Api\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [LoginController::class, 'index']);

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('/logout', [LoginController::class, 'logout']);
});
Route::prefix('admin')->group(function(){
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('dashboard', DashboardController::class);
        Route::get('/permissions', [\App\Http\Controllers\Api\Admin\PermissionController::class, 'index']);
        Route::get('/permissions/all', [\App\Http\Controllers\Api\Admin\PermissionController::class, 'all']);
        Route::get('/roles/all', [\App\Http\Controllers\Api\Admin\RoleController::class, 'all']);
        Route::apiResource('/roles', App\Http\Controllers\Api\Admin\RoleController::class);
        Route::apiResource('/users', App\Http\Controllers\Api\Admin\UserController::class);
        Route::apiResource('/categories', App\Http\Controllers\Api\Admin\CategoryController::class);
        Route::apiResource('/posts', App\Http\Controllers\Api\Admin\PostController::class);
        Route::apiResource('/products', App\Http\Controllers\Api\Admin\ProductController::class);
        Route::apiResource('/pages', App\Http\Controllers\Api\Admin\PageController::class);
        Route::apiResource('/photos', App\Http\Controllers\Api\Admin\PhotoController::class);
        Route::apiResource('/sliders', App\Http\Controllers\Api\Admin\SliderController::class, ['except' => ['create', 'show', 'update']]);
         Route::apiResource('/aparaturs', App\Http\Controllers\Api\Admin\AparaturController::class);
    });
});
Route::prefix('public')->group(function(){
    Route::get('/posts', [App\Http\Controllers\Api\Public\PostController::class, 'index']);

    //show posts
    Route::get('/posts/{slug}', [App\Http\Controllers\Api\Public\PostController::class, 'show']);

    //index posts home
    Route::get('/posts_home', [App\Http\Controllers\Api\Public\PostController::class, 'homePage']);
    Route::get('/products', [App\Http\Controllers\Api\Public\ProductController::class, 'index']);

    //show page
    Route::get('/products/{slug}', [App\Http\Controllers\Api\Public\ProductController::class, 'show']);

    //index products home
    Route::get('/products_home', [App\Http\Controllers\Api\Public\ProductController::class, 'homePage']);
     Route::get('/pages', [App\Http\Controllers\Api\Public\PageController::class, 'index']);

    //show page
    Route::get('/pages/{slug}', [App\Http\Controllers\Api\Public\PageController::class, 'show']);
    Route::get('/aparaturs', [App\Http\Controllers\Api\Public\AparaturController::class, 'index']);
    Route::get('/photos', [App\Http\Controllers\Api\Public\PhotoController::class, 'index']);
    Route::get('/sliders', [App\Http\Controllers\Api\Public\SliderController::class, 'index']);
});
