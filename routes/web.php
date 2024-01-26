<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', function (Request $request) {
//     return view('locale');
// });
Route::get('/locale/{locale}', function (Request $request, $locale) {
   // return $locale;
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');