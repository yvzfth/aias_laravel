<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\KatsayiController;
use App\Http\Controllers\SettingsController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('user/login', 'login');
    Route::post('user/register', 'register');
    Route::post('user/logout', 'logout');
    Route::post('user/refresh', 'refresh');
});



Route::get('activities', [ActivityController::class, 'activity']);
Route::post('activities', [ActivityController::class, 'store']);
Route::put('activities/{id}', [ActivityController::class, 'update']);
Route::delete('activities/{id}', [ActivityController::class, 'destroy']);
Route::post('submissions', [SubmissionController::class, 'store']);



// routes/api.php









Route::put('/users', [SettingsController::class, 'update']);
