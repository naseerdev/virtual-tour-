<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\address;
use App\meal;
use DB;
use App\tour;
use App\rating;

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
       $ratings=DB::select("select rating from ratings where hostel_name='$hname';");
      $Rating=rating::where('hostel_name',$hname)->orderBy('created_at', 'DESC')->paginate(2);
       //return DB::select("select 'uname','comment','created_at' from ratings where hostel_name='$hname';");
     // return rating::where('rating',$hname)->get(); 

        return view('pages.hostel')->with('address', $address)->with('meal',$meal)->with('userID',$userID)->with('ratings',$ratings)->with('Rating',$Rating);
    }

    public function visitVirtually($id)
    {
        $tour =new tour();
        $floors_array =$tour::where('user_id', $id)->pluck('floors');
        $createHotspot_array=$tour::where('user_id', $id)->pluck('createHotspot');
        return view('pages.visitVirtually')->with('floors_array', $floors_array)->with('createHotspot_array',$createHotspot_array);
    }

    public function Review(Request $request)
    {
        $rate=json_decode($request['rate']);
        $cmnt=json_decode($request['cmnt']);
        $adminhostelID=json_decode($request['adminhostelID']);
        $Hname=json_decode($request['Hname']);
        $user = auth()->user()->name;
        $rating=new rating;
        $rating->hostel_name=$Hname;
        $rating->user_id=$adminhostelID;
        $rating->rating=$rate;
        $rating->comment=$cmnt;
        $rating->uname=$user;
        $rating->save();

        return response()->json("success");

    }

    
}
