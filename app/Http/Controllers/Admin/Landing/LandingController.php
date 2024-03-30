<?php

namespace App\Http\Controllers\Admin\Landing;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Feature;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //

    public function banner()
    {
        //
        $banner= Banner::first();
        
        return view('admin.banner.banner',compact('banner'));
    }
    public function contact()
    {
        //
        $contact= Contact::first();
        
        return view('admin.contact.contact',compact('contact'));
    }

    public function save_contact(Request $request)
    {
        
        $contact= Contact::first();
        if($contact){
             $contact->mobile_no=$request->mobile_no;
            $contact->email=$request->email;
            $contact->save();
        }
        else{
            Contact::create([
            'mobile_no'=>$request->mobile_no,
            'email'=>$request->email,
            ]);
        }
        return redirect()->back();
    }
    public function save_banner(Request $request)
    {
        //
       // return $request->all();
        if($request->banner_bg){

            $fileName = time().'.'.$request->banner_bg->extension();  
            $request->banner_bg->move(public_path('uploads'), $fileName);
            
        }
        $banner= Banner::first();
        if($banner){
            $banner->banner_title=['en'=>$request->banner_title_english, 'ar'=>$request->banner_title_arabic];
           
            $banner->banner_desc=['en'=>$request->banner_desc_english, 'ar'=>$request->banner_desc_arabic];
            
            $banner->banner_bg=$fileName;
            $banner->save();
        }
        else{
            Banner::create([
                'banner_title'=>['en'=>$request->banner_title_english, 'ar'=>$request->banner_title_arabic],
            
            'banner_desc'=>['en'=>$request->banner_desc_english, 'ar'=>$request->banner_desc_arabic],
            
            'banner_bg'=>$fileName,
            ]);
        }
        return redirect()->back();
    }

    public function features()
    {
        //
        $features= Feature::get();
        return view('admin.features.index',compact('features'));
    }
    public function create_features()
    {
        //
       // $features= Feature::get();
        return view('admin.features.create');
    }
    public function save_features(Request $request)
    {
        //
      //  return $request->all();
       
      Feature::create([
        'title'=>['en'=>$request->title_english, 'ar'=>$request->title_arabic],
    
    'desc'=>['en'=>$request->desc_english, 'ar'=>$request->desc_arabic],
    
    
    ]);
         return redirect()->back();
    }
    public function edit_feature(String $id)
    {
        //
       $feature= Feature::find($id);
        return view('admin.features.edit', compact('feature'));
    }
}
