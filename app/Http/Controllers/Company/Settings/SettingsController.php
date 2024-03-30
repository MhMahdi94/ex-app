<?php

namespace App\Http\Controllers\Company\Settings;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    //currency
    public function currency()
    {
        //
        $currencies= Currency::where('company_id',Auth::guard('employee')->user()->company_id )->get();
        return view('company.settings.currency', compact('currencies'));
    }

    public function currency_create()
    {
        //
      
        return view('company.settings.currency_create');
    }

    public function currency_store(Request $request)
    {
        //
      
        
        Currency::create([
            'name'=>$request->currency_name,
            'code'=>$request->currency_code,
            'company_id'=>Auth::guard('employee')->user()->company_id
        ]);
        return redirect()->back();
    }
}
