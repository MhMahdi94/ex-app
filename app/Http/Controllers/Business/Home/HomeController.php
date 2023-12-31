<?php

namespace App\Http\Controllers\Business\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){
        return view('business.home.home');
    }
}
