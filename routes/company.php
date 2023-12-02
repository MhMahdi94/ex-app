<?php

use App\Http\Controllers\Admin\Admins\AdminsController;
use App\Http\Controllers\Company\Auth\LoginController;
use App\Http\Controllers\Company\Employee\EmployeeController;
use App\Http\Controllers\Company\Employee\EmployeeDetailsController;
use App\Http\Controllers\Company\Home\HomeController as HomeHomeController;
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
  });


