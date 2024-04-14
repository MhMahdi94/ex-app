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
        $currencies = Currency::where('company_id', Auth::guard('employee')->user()->company_id)->get();
        return view('company.settings.currency', compact('currencies'));
    }

    public function currency_create()
    {
        //

        return view('company.settings.currency_create');
    }
    public function currency_edit(string $id)
    {
        //
        $currency = Currency::find($id);
        return view('company.settings.currency_edit', compact('currency'));
    }
    public function currency_store(Request $request)
    {
        //

        // return $request->all();
        Currency::create([
            'name' => $request->currency_name,
            'code' => $request->currency_code,
            'exchange_rate' => $request->exchange_rate,
            'company_id' => Auth::guard('employee')->user()->company_id
        ]);
        return redirect()->back();
    }

    public function currency_update(Request $request, string $id)
    {
        //

        // return $request->all();
        $currency = Currency::find($id);

        $currency->name = $request->currency_name;
        $currency->code = $request->currency_code;
        $currency->exchange_rate = $request->exchange_rate;
        $currency->company_id = Auth::guard('employee')->user()->company_id;
        $currency->save();
        return redirect()->back();
    }

    public function currency_delete(string $id)
    {
        //
        $currency = Currency::find($id)->delete();
        //return view('company.settings.currency_edit', compact('currency'));
    }
}
