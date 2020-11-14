<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\address;
use App\meal;
use DB;
use App\tour;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userid=auth()->user()->id;
       // $address=address::all();
       $address=DB::select("select user_id from addresses where user_id='$userid';");
       $hostelN = DB::table('addresses')->where('user_id',$userid)->value('hostel_name');
       
        //$meal =meal::find($id);
       // $data=array(
       
         //   'address' =>'address',
         //   'meal' =>'meal'
      //  );
        return view('dashboard')->with('address',$address)->with('hostelN',$hostelN);
    }

    public function hostel(Request $request)
    {
        $hostelName=$request->input(['hname']);
        $address=DB::select("select hostel_name from addresses where city='$hostelName';");
        

        return response()->json($address);


    }
    public function showHostel($hname)
    {
     
        $userID = DB::table('addresses')->where('hostel_name',$hname)->value('user_id');
     //  $userID=DB::select("select user_id from addresses where hostel_name='$hname';");
      
     $address=DB::select("select * from addresses where user_id='$userID';");
       $meal=DB::select("select * from meals where user_id='$userID';");
       

        return view('pages.hostel')->with('address', $address)->with('meal',$meal)->with('userID',$userID);
    }

    public function visitVirtually($id)
    {
        $tour =new tour();
        $floors_array =$tour::where('user_id', $id)->pluck('floors');
        $createHotspot_array=$tour::where('user_id', $id)->pluck('createHotspot');
        return view('pages.visitVirtually')->with('floors_array', $floors_array)->with('createHotspot_array',$createHotspot_array);
    }

    
}
