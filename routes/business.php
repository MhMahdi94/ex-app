<?php

use App\Http\Controllers\Admin\Business\BusinessController;
use App\Http\Controllers\Business\Auth\LoginController;
use App\Http\Controllers\Business\Category\CategoryController;
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

       //business
       Route::group(['prefix' => '/categories',
       'as' => 'categories.',],function ()  {
         Route::get('/',[CategoryController::class, 'index'])->name('category_index');
         Route::get('/create',[CategoryController::class, 'create'])->name('category_create');
         Route::post('/store',[CategoryController::class, 'store'])->name('category_store');
         Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('category_edit');
         Route::put('/update/{id}',[CategoryController::class, 'update'])->name('category_update');
         Route::delete('/delete/{id}',[CategoryController::class, 'destroy'])->name('category_destroy');
         Route::get('/details/{id}',[CategoryController::class, 'details'])->name('category_details');
       });
      
  });


