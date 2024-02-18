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
    //summary
    Route::get('/summary', 'App\Http\Controllers\API\EmployeeSummaryController@index');
    
    //attendence
   // Route::apiResource('/attendence',AttendenceController::class);
    Route::get('/attendence', 'App\Http\Controllers\API\AttendenceController@index');
    Route::post('/attendence', 'App\Http\Controllers\API\AttendenceController@store');
    Route::get('/attendence/{id}', 'App\Http\Controllers\API\AttendenceController@show');
    Route::put('/attendence/{id}', 'App\Http\Controllers\API\AttendenceController@update');
    //attendence status
    Route::apiResource('/attendence-status',AttendenceStatusController::class);
    Route::get('/attendence-status', 'App\Http\Controllers\API\AttendenceStatusController@index');
    Route::post('/attendence-status', 'App\Http\Controllers\API\AttendenceStatusController@store');
    Route::get('/attendence-status/{id}', 'App\Http\Controllers\API\AttendenceStatusController@show');
    Route::put('/attendence-status/{id}', 'App\Http\Controllers\API\AttendenceStatusController@update');

    //leave request
    //Route::apiResource('/leave-request',LeaveRequestController::class);
    Route::get('/leave-request', 'App\Http\Controllers\API\LeaveRequestController@index');
    Route::post('/leave-request', 'App\Http\Controllers\API\LeaveRequestController@store');
    Route::get('/leave-request/{id}', 'App\Http\Controllers\API\LeaveRequestController@show');
    Route::put('/leave-request/{id}', 'App\Http\Controllers\API\LeaveRequestController@update');

    //leave check
    //Route::apiResource('/leave-check',LeaveCheckController::class);
    Route::get('/leave-check', 'App\Http\Controllers\API\LeaveCheckController@index');
    Route::post('/leave-check', 'App\Http\Controllers\API\LeaveCheckController@store');
    Route::get('/leave-check/{id}', 'App\Http\Controllers\API\LeaveCheckController@show');
    Route::put('/leave-check/{id}', 'App\Http\Controllers\API\LeaveCheckController@update');
   
});
Route::post('/login', 'App\Http\Controllers\API\AuthController@login');
Route::post('/new-request', [NewRequestController::class, 'store']);
