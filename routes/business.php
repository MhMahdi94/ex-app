<?php

use App\Http\Controllers\Business\Auth\LoginController;
use App\Http\Controllers\Business\Home\HomeController;
use App\Http\Controllers\Business\User\UserController;
use App\Http\Controllers\Company\Home\HomeController as HomeHomeController;
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
    Route::get('/login',[LoginController::class, 'show_login_view'])->name('business.show_login');
    Route::post('login',[LoginController::class, 'login'])->name('business.login');
    //Route::post('register',[LoginController::class, 'login'])->name('company.login');
      //home
      Route::group(['prefix' => '/home',
      'as' => 'home.',],function ()  {
        Route::get('/',[HomeController::class, 'index'])->name('home');
      });
      

       //employees
       Route::group(['prefix' => '/user',
       'as' => 'user.',],function ()  {
         Route::get('/',[UserController::class, 'index'])->name('user_index');
         Route::get('/create',[UserController::class, 'create'])->name('user_create');
         Route::post('/store',[UserController::class, 'store'])->name('user_store');
         Route::get('/edit/{id}',[UserController::class, 'edit'])->name('user_edit');
         Route::put('/update/{id}',[UserController::class, 'update'])->name('user_update');
         Route::delete('/delete/{id}',[UserController::class, 'destroy'])->name('user_destroy');
         Route::get('/details/{id}',[UserController::class, 'details'])->name('user_details');
       });
      
  });


