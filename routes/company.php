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
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    "namespace"=>"Company",
    'prefix' => '/'.LaravelLocalization::setLocale().'/company',
    'as' => 'company.',
    'middleware'=> ['company','localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
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
      
      //stock
      Route::group(['prefix' => '/stock',
      'as' => 'stock.',],function ()  {
        Route::get('/',[ProductController::class, 'index'])->name('stock_index');
        Route::get('/pdf',[ProductController::class, 'generatePDF'])->name('report_pdf');
        
        Route::get('/create',[ProductController::class, 'create'])->name('stock_create');
        Route::get('/import-export/{id}',[ProductController::class, 'importExport'])->name('stock_import_export');
        Route::post('/import-export/update',[ProductController::class, 'importExportUpdate'])->name('stock_import_export_update');
        Route::post('/store',[ProductController::class, 'store'])->name('stock_store');
        Route::get('/edit/{id}',[ProductController::class, 'edit'])->name('stock_edit');
        Route::put('/update/{id}',[ProductController::class, 'update'])->name('stock_update');
        Route::delete('/delete/{id}',[ProductController::class, 'destroy'])->name('stock_destroy');
        Route::get('/details/{id}',[ProductController::class, 'details'])->name('stock_details');
      });

      //coa
      Route::group(['prefix' => '/accounts',
      'as' => 'coa.',],function ()  {
        Route::get('/',[AccountController::class, 'index'])->name('coa_index');
        Route::get('/pdf',[AccountController::class, 'generatePDF'])->name('coa_pdf');
        Route::get('/assets',[AccountController::class, 'assets'])->name('coa_assets');
        Route::get('/liabilities',[AccountController::class, 'liabilities'])->name('coa_liabilities');
        Route::get('/equity',[AccountController::class, 'equity'])->name('coa_equity');
        Route::get('/expenses',[AccountController::class, 'expenses'])->name('coa_expenses');
        Route::get('/revenue',[AccountController::class, 'revenue'])->name('coa_revenue');
        Route::get('/create',[AccountController::class, 'create'])->name('coa_create');
        Route::post('/store',[AccountController::class, 'store'])->name('coa_store');
        Route::get('/edit/{id}',[AccountController::class, 'edit'])->name('coa_edit');
        Route::get('/show/{id}',[AccountController::class, 'show'])->name('coa_show');
        Route::put('/update/{id}',[AccountController::class, 'update'])->name('coa_update');
        Route::delete('/delete/{id}',[AccountController::class, 'destroy'])->name('coa_destroy');
        Route::get('/details/{id}',[AccountController::class, 'details'])->name('coa_details');
      });

      //financial calendar
      Route::group(['prefix' => '/financial-calendar',
      'as' => 'financial_calendar.',],function ()  {
        Route::get('/',[FinancialYearController::class, 'index'])->name('financial_year_index');
        Route::get('/create',[FinancialYearController::class, 'create'])->name('financial_year_create');
        Route::post('/store',[FinancialYearController::class, 'store'])->name('financial_year_store');
        Route::get('/edit/{id}',[FinancialYearController::class, 'edit'])->name('financial_year_edit');
        Route::get('/show/{id}',[FinancialYearController::class, 'show'])->name('financial_year_show');
        Route::put('/update/{id}',[FinancialYearController::class, 'update'])->name('financial_year_update');
        Route::delete('/delete/{id}',[FinancialYearController::class, 'destroy'])->name('financial_year_destroy');
        Route::get('/details/{id}',[FinancialYearController::class, 'details'])->name('financial_year_details');
      });

      //journals
      Route::group(['prefix' => '/journals',
      'as' => 'journals.',],function ()  {
        Route::get('/',[JournalsController::class, 'index'])->name('journals_index');
        Route::get('/pdf/{id}',[JournalsController::class, 'generatePDF'])->name('journals_pdf');
        Route::get('/create',[JournalsController::class, 'create'])->name('journals_create');
        Route::post('/store',[JournalsController::class, 'store'])->name('journals_store');
        Route::get('/edit/{id}',[JournalsController::class, 'edit'])->name('journals_edit');
        Route::get('/show/{id}',[JournalsController::class, 'show'])->name('journals_show');
        Route::put('/update/{id}',[JournalsController::class, 'update'])->name('journals_update');
        Route::delete('/delete/{id}',[JournalsController::class, 'destroy'])->name('journals_destroy');
        Route::get('/details/{id}',[JournalsController::class, 'details'])->name('journals_details');
      });

       //documents
       Route::group(['prefix' => '/documents',
       'as' => 'documents.',],function ()  {
         Route::get('/',[DocumentController::class, 'index'])->name('document_index');
         Route::get('/pdf/{id}',[DocumentController::class, 'generatePDF'])->name('report_pdf');
         Route::get('/create',[DocumentController::class, 'create'])->name('document_create');
         Route::post('/store',[DocumentController::class, 'store'])->name('document_store');
         Route::get('/edit/{id}',[DocumentController::class, 'edit'])->name('document_edit');
         Route::get('/show/{id}',[DocumentController::class, 'show'])->name('document_show');
         Route::put('/update/{id}',[DocumentController::class, 'update'])->name('document_update');
         Route::delete('/delete/{id}',[DocumentController::class, 'destroy'])->name('document_destroy');
         Route::get('/details/{id}',[DocumentController::class, 'details'])->name('document_details');
       });
  });


