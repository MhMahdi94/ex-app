<?php

use App\Http\Controllers\Admin\Admins\AdminsController;
use App\Http\Controllers\Company\Auth\LoginController;
use App\Http\Controllers\Company\Department\DepartmentController;
use App\Http\Controllers\Company\Employee\EmployeeController;
use App\Http\Controllers\Company\Employee\EmployeeDetailsController;
use App\Http\Controllers\Company\Home\HomeController as HomeHomeController;
use App\Http\Controllers\Company\Leave\LeaveRequestController;
use App\Http\Controllers\Company\Leave\LeaveSettingController;
use Illuminate\Support\Facades\Route;
Route::group([
    "namespace"=>"Company",
    'prefix' => '/company',
    'as' => 'company.',
    'middleware'=> 'company'
  ], function () {
    Route::get('/', function () {
          return 'hello';
      });
    //auth
    Route::get('/login',[LoginController::class, 'show_login_view'])->name('company.show_login');
    Route::post('login',[LoginController::class, 'login'])->name('company.login');
    //Route::post('register',[LoginController::class, 'login'])->name('company.login');
      //home
      Route::group(['prefix' => '/home',
      'as' => 'home.',],function ()  {
        Route::get('/',[HomeHomeController::class, 'index'])->name('home');
      });
      

       //employees
       Route::group(['prefix' => '/employees',
       'as' => 'employees.',],function ()  {
         Route::get('/',[EmployeeController::class, 'index'])->name('employees_index');
         Route::get('/create',[EmployeeController::class, 'create'])->name('employees_create');
         Route::post('/store',[EmployeeController::class, 'store'])->name('employees_store');
         Route::get('/edit/{id}',[EmployeeController::class, 'edit'])->name('employees_edit');
         Route::put('/update/{id}',[EmployeeController::class, 'update'])->name('employees_update');
         Route::delete('/delete/{id}',[EmployeeController::class, 'destroy'])->name('employees_destroy');
         Route::get('/details/{id}',[EmployeeController::class, 'details'])->name('employees_details');
       });
       //department
       Route::group(['prefix' => '/department',
       'as' => 'department.',],function ()  {
         Route::get('/',[DepartmentController::class, 'index'])->name('department_index');
         Route::get('/create',[DepartmentController::class, 'create'])->name('department_create');
         Route::post('/store',[DepartmentController::class, 'store'])->name('department_store');
         Route::get('/edit/{id}',[DepartmentController::class, 'edit'])->name('department_edit');
         Route::put('/update/{id}',[DepartmentController::class, 'update'])->name('department_update');
         Route::delete('/delete/{id}',[DepartmentController::class, 'destroy'])->name('department_destroy');
         Route::get('/details/{id}',[DepartmentController::class, 'details'])->name('department_details');
       });
      //company
      //employee-details
      Route::group(['prefix' => '/employee-details',
      'as' => 'employee-details.',],function ()  {
        Route::get('/',[EmployeeDetailsController::class, 'index'])->name('employee_details_index');
        Route::get('/create',[EmployeeDetailsController::class, 'create'])->name('employee_details_create');
        Route::post('/store',[EmployeeDetailsController::class, 'store'])->name('employee_details_store');
        Route::get('/edit/{id}',[EmployeeDetailsController::class, 'edit'])->name('employee_details_edit');
        Route::put('/update/{id}',[EmployeeDetailsController::class, 'update'])->name('employee_details_update');
        Route::delete('/delete/{id}',[EmployeeDetailsController::class, 'destroy'])->name('employee_details_destroy');
        Route::get('/details/{id}',[EmployeeDetailsController::class, 'details'])->name('employee_details_details');
      });

      //leave settings
      Route::group(['prefix' => '/leave-settings',
      'as' => 'leave-settings.',],function ()  {
        Route::get('/',[LeaveSettingController::class, 'index'])->name('leave_settings_index');
        Route::get('/create',[LeaveSettingController::class, 'create'])->name('leave_settings_create');
        Route::post('/store',[LeaveSettingController::class, 'store'])->name('leave_settings_store');
        Route::get('/edit/{id}',[LeaveSettingController::class, 'edit'])->name('leave_settings_edit');
        Route::put('/update/{id}',[LeaveSettingController::class, 'update'])->name('leave_settings_update');
        Route::delete('/delete/{id}',[LeaveSettingController::class, 'destroy'])->name('leave_settings_destroy');
        Route::get('/details/{id}',[LeaveSettingController::class, 'details'])->name('leave_settings_details');
      });

      //leave requests
      Route::group(['prefix' => '/leave-requests',
      'as' => 'leave-requests.',],function ()  {
        Route::get('/',[LeaveRequestController::class, 'index'])->name('leave_requests_index');
        Route::get('/create',[LeaveRequestController::class, 'create'])->name('leave_requests_create');
        Route::post('/store',[LeaveRequestController::class, 'store'])->name('leave_requests_store');
        Route::get('/edit/{id}',[LeaveRequestController::class, 'edit'])->name('leave_requests_edit');
        Route::put('/update/{id}',[LeaveRequestController::class, 'update'])->name('leave_requests_update');
        Route::delete('/delete/{id}',[LeaveRequestController::class, 'destroy'])->name('leave_requests_destroy');
        Route::get('/details/{id}',[LeaveRequestController::class, 'details'])->name('leave_requests_details');
      });
  });


