<?php

use App\Http\Controllers\Api\NewRequestController;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Feature;
use App\Models\Package;
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
        $banner=Banner::first();
        $services=Package::get();
        $features=Feature::get();
        $contact= Contact::first();
          return view('welcome',compact('banner','services','features','contact') );
      })->name('welcome');

      Route::post('/new-request',[NewRequestController::class,'store'])->name('new_request');
  });
