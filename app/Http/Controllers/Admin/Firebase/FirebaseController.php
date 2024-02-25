<?php

namespace App\Http\Controllers\Admin\Firebase;

use App\Http\Controllers\Controller;
use App\Models\FirebaseConfig;
use App\Models\FirebaseToken;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function App\Helpers\sendNotification;

class FirebaseController extends Controller
{

    public function config()
    {
        //
        $firebase_config=FirebaseConfig::first();
       // dd( $firebase_config);
       return view('admin.firebase.config', compact('firebase_config'));
    }

    public function setConfig(Request $request)
    {
        //dd($request->all());
        FirebaseConfig::updateOrCreate(['id'=>1],[
            'url'=>$request->firebase_url,
            'server_key'=>$request->firebase_server_key
        ]);

        return redirect()->back();
    }

    public function saveToken(Request $request){
        // return $request->all();
        $data=FirebaseToken::updateOrCreate(
            [
                'user_id'=>Auth::id(),
                'guard_name'=>$request->guard_name
            ],[
                'user_id'=>Auth::id(),
                'guard_name'=>$request->guard_name,
                'token'=>$request->token 
            ]
        );
        return response($data,200);
    }

    public function sendMessage(Request $request){
        $data=FirebaseToken::first();
        $result= sendNotification('Titke ','Body',$data->token);
        return $result;
    }

    public function getNotifications(){
        $notifications=Notification::where(['user_id'=>Auth::id(),'guard_name'=>'employee'])->get();
        return response(compact('notifications'),200);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
      
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
