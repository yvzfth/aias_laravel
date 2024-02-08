<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\ActivityController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('user/login', 'login');
    Route::post('user/register', 'register');
    Route::post('user/logout', 'logout');
    Route::post('user/refresh', 'refresh');
});


Route::get('table', [DataController::class, 'index']);

Route::get('activities', [ActivityController::class, 'activity']);
Route::post('activities', [ActivityController::class, 'store']);
Route::post('submissions', [SubmissionController::class, 'store']);
