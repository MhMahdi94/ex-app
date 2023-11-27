<?php

use App\Http\Controllers\Admin\Admins\AdminsController;
use App\Http\Controllers\Company\Auth\LoginController;
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
      
  });


