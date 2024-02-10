<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group([
    'prefix' => '/'.LaravelLocalization::setLocale().'/',
    
    'middleware'=> ['web','localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
  ], function () {

      Route::get('/', function () {
          return view('welcome');
      });
  });
