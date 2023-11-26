<?php

use App\Http\Controllers\Admin\Admins\AdminsController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Companies\CompanyController;
use App\Http\Controllers\Admin\Home\HomeController;
use App\Http\Controllers\Admin\Owners\OwnerController;
use App\Http\Controllers\Admin\Packages\PackagesController;
use App\Http\Controllers\Admin\Requests\RequestsController;
use App\Http\Controllers\Admin\Roles\RolesController;
use Illuminate\Support\Facades\Route;
Route::group([
    "namespace"=>"Admin",
    'prefix' => '/admin',
    'as' => 'admin.',
    'middleware'=> 'admin'
  ], function () {
    // Route::get('/', function () {
    //       return view('welcome');
    //   });
    //auth
    Route::get('/login',[LoginController::class, 'show_login_view'])->name('admin.show_login');
    Route::post('login',[LoginController::class, 'login'])->name('admin.login');
  
      //home
      Route::group(['prefix' => '/home',
      'as' => 'home.',],function ()  {
        Route::get('/',[HomeController::class, 'index'])->name('home');
      });
      

       //admins
       Route::group(['prefix' => '/admins',
       'as' => 'admins.',],function ()  {
         Route::get('/',[AdminsController::class, 'index'])->name('admins_index');
         Route::get('/create',[AdminsController::class, 'create'])->name('admins_create');
         Route::post('/store',[AdminsController::class, 'store'])->name('admins_store');
         Route::get('/edit/{id}',[AdminsController::class, 'edit'])->name('admins_edit');
         Route::put('/update/{id}',[AdminsController::class, 'update'])->name('admins_update');
         Route::delete('/delete/{id}',[AdminsController::class, 'destroy'])->name('admins_destroy');
       });
      //company
      Route::group(['prefix' => '/companies',
      'as' => 'companies.',],function ()  {
        Route::get('/',[CompanyController::class, 'index'])->name('companies_index');
        Route::get('/create',[CompanyController::class, 'create'])->name('companies_create');
        Route::post('/store',[CompanyController::class, 'store'])->name('companies_store');
        Route::get('/edit/{id}',[CompanyController::class, 'edit'])->name('companies_edit');
        Route::put('/update/{id}',[CompanyController::class, 'update'])->name('companies_update');
        Route::delete('/delete/{id}',[CompanyController::class, 'destroy'])->name('companies_destroy');
      });
      //owner
      Route::group(['prefix' => '/owners',
      'as' => 'owners.',],function ()  {
        Route::get('/',[OwnerController::class, 'index'])->name('owners_index');
        Route::get('/create',[OwnerController::class, 'create'])->name('owners_create');
        Route::post('/store',[OwnerController::class, 'store'])->name('owners_store');
        Route::get('/edit/{id}',[OwnerController::class, 'edit'])->name('owners_edit');
        Route::put('/update/{id}',[OwnerController::class, 'update'])->name('owners_update');
        Route::delete('/delete/{id}',[OwnerController::class, 'destroy'])->name('owners_destroy');
      });
       //packages
       Route::group(['prefix' => '/packages',
       'as' => 'packages.',],function ()  {
         Route::get('/',[PackagesController::class, 'index'])->name('packages_index');
         Route::get('/create',[PackagesController::class, 'create'])->name('packages_create');
         Route::post('/store',[PackagesController::class, 'store'])->name('packages_store');
         Route::get('/edit/{id}',[PackagesController::class, 'edit'])->name('packages_edit');
         Route::put('/update/{id}',[PackagesController::class, 'update'])->name('packages_update');
         Route::delete('/delete/{id}',[PackagesController::class, 'destroy'])->name('packages_destroy');
       });

       //requests
       Route::group(['prefix' => '/requests',
       'as' => 'requests.',],function ()  {
         Route::get('/',[RequestsController::class, 'index'])->name('requests_index');
         Route::put('/update/{id}',[RequestsController::class, 'update'])->name('requests_update');
       });

       //roles
       Route::group(['prefix' => '/roles',
       'as' => 'roles.',],function ()  {
         Route::get('/',[RolesController::class, 'index'])->name('roles_index');
       });
  });


