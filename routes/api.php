<?php

use App\Http\Controllers\Api\AttendenceController;
use App\Http\Controllers\Api\AttendenceStatusController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EmployeeSummaryController;
use App\Http\Controllers\Api\LeaveCheckController;
use App\Http\Controllers\Api\LeaveRequestController;
use App\Http\Controllers\Api\NewRequestController;
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

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    //
    // Route::apiResource('/summary',EmployeeSummaryController::class);
    Route::get('/summary', 'App\Http\Controllers\API\EmployeeSummaryController@index');
    Route::apiResource('/attendence',AttendenceController::class);
    Route::apiResource('/attendence-status',AttendenceStatusController::class);
    Route::apiResource('/leave-request',LeaveRequestController::class);
    Route::apiResource('/leave-check',LeaveCheckController::class);
   
});
Route::post('/login', 'App\Http\Controllers\API\AuthController@login');
Route::post('/new-request', [NewRequestController::class, 'store']);
