<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Business;
use App\Models\Company;
use App\Models\Department;
use App\Models\Employees;
use App\Models\NewRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){
        $admins_count=Admin::count();
        $new_requests_count=NewRequest::count();
        $companies_count=Company::count();
        $business_count=Business::count();
        $employees_count=Employees::count();
        $departments_count=Department::count();

        $last_companies=Company::orderBy('id','desc')->take(5)->get();
        $last_requests=NewRequest::orderBy('id','desc')->take(5)->get();
        //dd($last_companies);
        //return[$admins_count, $new_requests_count, $companies_count, $business_count];
        return view('admin.home.home', compact('admins_count',
            'new_requests_count',
            'companies_count',
            'business_count',
            'employees_count',
            'departments_count',
            'last_companies',
            'last_requests'
        ));
    }
}
