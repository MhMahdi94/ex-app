<?php

namespace App\Http\Controllers\Company\Home;

use App\Http\Controllers\Controller;
use App\Models\API\Attendence;
use App\Models\API\LeaveRequest;
use App\Models\Company;
use App\Models\Department;
use App\Models\Employees;
use App\Models\Expenses;
use App\Models\Revenue;
use App\Models\StockProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees_count = Employees::where('company_id', Auth::guard('employee')->user()->company_id)->count();
        $departments_count = Department::where('company_id', Auth::guard('employee')->user()->company_id)->count();
        $leave_requests = LeaveRequest::where('company_id', Auth::guard('employee')->user()->company_id)->count();
        $total_revenues = Revenue::where('company_id', Auth::guard('employee')->user()->company_id)->sum('amount');
        $total_expenses = Expenses::where('company_id', Auth::guard('employee')->user()->company_id)->sum('amount');
        //dd([$employees_count,$departments_count,$total_revenues,$total_expenses]);

        $check_in_count = Attendence::where('company_id', Auth::guard('employee')->user()->company_id)
            ->whereDate('created_at', Carbon::today())
            ->count();

        $chart_options = [
            'chart_title' => __('routes.Revenue'),
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Revenue',

            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'line',
            // 'filter_field' => 'created_at',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
            'filter_days' => 30, // show only last 30 days
        ];
        $chart_options2 = [
            'chart_title' => __('routes.Expenses'),
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Expenses',

            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'line',
            // 'filter_field' => 'created_at',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
            'filter_days' => 30, // show only last 30 days
        ];
        $chart1 = new LaravelChart($chart_options, $chart_options2);

        $last_employees = Employees::where('company_id', Auth::guard('employee')->user()->company_id)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        $products = StockProduct::where('company_id', Auth::guard('employee')->user()->company_id)
            ->count();
        $products_sum = StockProduct::where('company_id', Auth::guard('employee')->user()->company_id)
            ->sum('price');
        $subs_date = Company::where('id', Auth::guard('employee')->user()->company_id)->select('subscriptionEnd')->first();
        $date = Carbon::parse($subs_date->subscriptionEnd);
        $now = Carbon::now();

        $remaining = $date->diffInDays($now);
        
        return view('company.home.home', compact(
            'employees_count',
            'departments_count',
            'total_revenues',
            'total_expenses',
            'check_in_count',
            'chart1',
            'last_employees',
            'leave_requests',
            'products',
            'products_sum',
            'remaining'

        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
