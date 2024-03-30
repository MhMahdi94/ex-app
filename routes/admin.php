<?php

use App\Http\Controllers\Admin\Admins\AdminsController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Business\BusinessController;
use App\Http\Controllers\Admin\BusinessOwner\BusinessOwnerController;
use App\Http\Controllers\Admin\Companies\CompanyController;
use App\Http\Controllers\Admin\Firebase\FirebaseController;
use App\Http\Controllers\Admin\Home\HomeController;
use App\Http\Controllers\Admin\Landing\LandingController;
use App\Http\Controllers\Admin\Owners\OwnerController;
use App\Http\Controllers\Admin\Packages\PackagesController;
use App\Http\Controllers\Admin\Requests\RequestsController;
use App\Http\Controllers\Admin\Roles\RoleController;
use App\Http\Controllers\Admin\Roles\RolesController;
use App\Http\Controllers\Api\NewRequestController;
use App\Http\Controllers\Company\Calendar\CalendarController;
use App\Http\Livewire\CompanyCalendar;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    "namespace"=>"Admin",
    'prefix' => '/'.LaravelLocalization::setLocale().'/admin',
    'as' => 'admin.',
    'middleware'=> ['admin','localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
  ], function () {
    // Route::get('/', function () {
    //       return view('welcome');
    //   });
    //auth
    Route::get('/login',[LoginController::class, 'show_login_view'])->name('admin.show_login');
    Route::post('login',[LoginController::class, 'login'])->name('admin.login');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
      //home
      Route::group(['prefix' => '/home',
      'as' => 'home.',],function ()  {
        Route::get('/',[HomeController::class, 'index'])->name('home');
      });
      

       //admins
       Route::group(['prefix' => '/admins',
       'as' => 'admins.',],function ()  {
         Route::get('/',[AdminsController::class, 'index'])->name('admins_index');
         Route::post('/search',[AdminsController::class, 'search'])->name('admins_search');
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
        Route::post('/search',[CompanyController::class, 'search'])->name('companies_search');
        Route::get('/create',[CompanyController::class, 'create'])->name('companies_create');
        Route::get('/renew/{id}',[CompanyController::class, 'renew'])->name('companies_renew');
        Route::put('/renew/{id}',[CompanyController::class, 'renewContract'])->name('companies_renew_contract');
        Route::post('/store',[CompanyController::class, 'store'])->name('companies_store');
        Route::get('/edit/{id}',[CompanyController::class, 'edit'])->name('companies_edit');
        Route::put('/update/{id}',[CompanyController::class, 'update'])->name('companies_update');
        Route::delete('/delete/{id}',[CompanyController::class, 'destroy'])->name('companies_destroy');
      });
      //owner
      Route::group(['prefix' => '/owners',
      'as' => 'owners.',],function ()  {
        Route::get('/',[OwnerController::class, 'index'])->name('owners_index');
        Route::post('/search',[OwnerController::class, 'search'])->name('owners_search');
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
      //business
      Route::group(['prefix' => '/business',
      'as' => 'business.',],function ()  {
        Route::get('/',[BusinessController::class, 'index'])->name('business_index');
        Route::post('/search',[BusinessController::class, 'search'])->name('business_search');
        Route::get('/create',[BusinessController::class, 'create'])->name('business_create');
        Route::post('/store',[BusinessController::class, 'store'])->name('business_store');
        Route::get('/edit/{id}',[BusinessController::class, 'edit'])->name('business_edit');
        Route::put('/update/{id}',[BusinessController::class, 'update'])->name('business_update');
        Route::delete('/delete/{id}',[BusinessController::class, 'destroy'])->name('business_destroy');
      });
      //business owner
      Route::group(['prefix' => '/business_owner',
      'as' => 'business_owner.',],function ()  {
        Route::get('/',[BusinessOwnerController::class, 'index'])->name('business_owner_index');
        Route::post('/search',[BusinessOwnerController::class, 'search'])->name('business_owner_search');
        Route::get('/create',[BusinessOwnerController::class, 'create'])->name('business_owner_create');
        Route::post('/store',[BusinessOwnerController::class, 'store'])->name('business_owner_store');
        Route::get('/edit/{id}',[BusinessOwnerController::class, 'edit'])->name('business_owner_edit');
        Route::put('/update/{id}',[BusinessOwnerController::class, 'update'])->name('business_owner_update');
        Route::delete('/delete/{id}',[BusinessOwnerController::class, 'destroy'])->name('business_owner_destroy');
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
         Route::get('/create',[RolesController::class, 'create'])->name('roles_create');
         Route::post('/store',[RolesController::class, 'store'])->name('roles_store');
         Route::get('/edit/{id}',[RolesController::class, 'edit'])->name('roles_edit');
         Route::put('/update/{id}',[RolesController::class, 'update'])->name('roles_update');
         Route::delete('/delete/{id}',[RolesController::class, 'destroy'])->name('roles_destroy');
       });

       //banner
       Route::group(['prefix' => '/landing',
       'as' => 'landing.',],function ()  {
        Route::get('/contact',[LandingController::class, 'contact'])->name('landing_contact');
        Route::post('/contact/save',[LandingController::class, 'save_contact'])->name('landing_contact_save');
         Route::get('/banner',[LandingController::class, 'banner'])->name('landing_banner');
         Route::post('/banner/save',[LandingController::class, 'save_banner'])->name('landing_banner_save');
         Route::get('/features',[LandingController::class, 'features'])->name('landing_features');
         Route::post('/features/save',[LandingController::class, 'save_features'])->name('landing_features_save');
         Route::get('/features/create',[LandingController::class, 'create_features'])->name('landing_features_create');
        //  Route::post('/store',[RolesController::class, 'store'])->name('roles_store');
         Route::get('/features/edit/{id}',[LandingController::class, 'edit_feature'])->name('landing_features_edit');
        //  Route::put('/update/{id}',[RolesController::class, 'update'])->name('roles_update');
        //  Route::delete('/delete/{id}',[RolesController::class, 'destroy'])->name('roles_destroy');
       });

        //firebase
        Route::group(['prefix' => '/firebase',
        'as' => 'firebase.',],function ()  {
          Route::get('/config',[FirebaseController::class, 'config'])->name('firebase_config');
          Route::post('/config/set',[FirebaseController::class, 'setConfig'])->name('firebase_set_config');
         // Route::post('/send',[FirebaseController::class, 'sendMessage'])->name('firebase_send');
          Route::post('/store',[FirebaseController::class, 'store'])->name('firebase_store');
          Route::get('/edit/{id}',[FirebaseController::class, 'edit'])->name('firebase_edit');
          Route::put('/update/{id}',[FirebaseController::class, 'update'])->name('firebase_update');
          Route::delete('/delete/{id}',[FirebaseController::class, 'destroy'])->name('firebase_destroy');
        });

        
  });


