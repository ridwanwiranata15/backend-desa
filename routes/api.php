<?php

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
