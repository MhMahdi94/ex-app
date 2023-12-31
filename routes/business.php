<?php

use App\Http\Controllers\Admin\Admins\AdminsController;
use App\Http\Controllers\Company\Account\AccountController;
use App\Http\Controllers\Company\Account\COALEVELONEController;
use App\Http\Controllers\Company\Auth\LoginController;
use App\Http\Controllers\Company\Department\DepartmentController;
use App\Http\Controllers\Company\Documents\DocumentController;
use App\Http\Controllers\Company\Employee\EmployeeController;
use App\Http\Controllers\Company\Employee\EmployeeDetailsController;
use App\Http\Controllers\Company\FinancialYear\FinancialYearController;
use App\Http\Controllers\Company\Home\HomeController as HomeHomeController;
use App\Http\Controllers\Company\Journals\JournalsController;
use App\Http\Controllers\Company\Leave\LeaveRequestController;
use App\Http\Controllers\Company\Leave\LeaveSettingController;
use App\Http\Controllers\Company\Stock\ProductController;
use Illuminate\Support\Facades\Route;
Route::group([
    "namespace"=>"Business",
    'prefix' => '/business',
    'as' => 'business.',
    'middleware'=> 'business'
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
      
  });


