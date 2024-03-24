<?php

namespace App\Http\Controllers\Business\Home;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\PosClient;
use App\Models\PosProduct;
use App\Models\PosRequest;
use App\Models\PosRequestContent;
use App\Models\PosUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{
    //

    public function index(){
        $total_orders=PosRequest::where('company_id',Auth::guard('business')->user()->business_id)->count();
        $total_revenue=PosRequest::where('company_id',Auth::guard('business')->user()->business_id)->sum('total_order');
        $clients=PosClient::where('company_id',Auth::guard('business')->user()->business_id)->count();
        $users=Business::where('business_id',Auth::guard('business')->user()->business_id)->count();
        $recent_products= PosProduct::where('company_id',Auth::guard('business')->user()->business_id)->limit(5)->get();
        $best_sellers=PosRequestContent::select( 'product_id',DB::raw('COUNT(id) as cnt'))->where('company_id',Auth::guard('business')->user()->business_id)->groupBy('product_id')->orderBy('cnt', 'DESC')->limit(5)->get();
        // PosRequestContent::get()->groupBy('product_id');
     //   return $best_sellers;

        $chart_options = [
            'chart_title' => __('routes.Sales'),
            'report_type' => 'group_by_date',
            'model' => 'App\Models\PosRequest',
            
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
            'filter_field' => 'created_at',
            'filter_days' => 30, // show only last 30 days
        ];
        $chart1 = new LaravelChart($chart_options);
        
       
        return view('business.home.home', compact('recent_products','total_orders','total_revenue','clients','users','chart1','best_sellers'));
    }
}
