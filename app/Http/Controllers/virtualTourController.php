<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tour;
use DB;
use App\address;

class virtualTourController extends Controller
{
    public function create()
    {
        $tour =new tour();
        $userid=auth()->user()->id;
        $floors_array =$tour::where('user_id', $userid)->pluck('floors');
        $createHotspot_array=$tour::where('user_id', $userid)->pluck('createHotspot');

       // $floors_array=DB::select("select '"floors"' from addresses where user_id='$userid';");
      //  $createHotspot_array=DB::select("select * from meals where user_id='$userid';");
      //  return view('pages.update')->with('address', $address)->with('meal',$meal);
     return view('pages.createTour')->with('floors_array', $floors_array)->with('createHotspot_array',$createHotspot_array)->with('userid',$userid
    
    );
    }

    public function action(Request $request)
    {

        
        $extension = $request->file('file');
        $extension = $request->file('file')->getClientOriginalExtension(); // getting excel extension
        $dir = 'assets/files/';
        $filename = uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;
        $request->file('file')->move($dir, $filename);

        return response()->json(['path' => $dir.$filename]);
    }
   
  //  public function previewTour()
    //{ 
  //      $tour =new tour();
  //      $userid=auth()->user()->id;
  //      $floors_array =$tour::where('user_id', $userid)->pluck('floors');
   //     $createHotspot_array=$tour::where('user_id', $userid)->pluck('createHotspot');

 
  //   return view('pages.previewTour')->with('floors_array', $floors_array)->with('createHotspot_array',$createHotspot_array);
  //  }
    

    public function store(Request $request)
    {
      
        
        
        $floors = json_decode($request['floors']);
        $createHotspot = json_decode($request['createHotspot']);
        
        $tour =new tour();
        $tour->floors=json_encode($floors);
        $tour->createHotspot=json_encode($createHotspot);
        $tour->user_id=auth()->user()->id;
        $tour->save();
        
       
    
    }

    public function update(Request $request)
    {
        
        $floors = json_decode($request['floors']);
        $createHotspot = json_decode($request['createHotspot']);
        $user_id=auth()->user()->id;

      
         
        

     DB::table('tours')
              ->where('user_id',$user_id)
              ->update([ 'floors'=>json_encode($floors),'createHotspot'=>json_encode($createHotspot)]);   
           //   return response()->json(['path' => $floors]);
              
                    

    }

 //   public function visitSite()
   // {
      //  $tour =new tour();
     //   $userid=auth()->user()->id;
     //   $floors_array =$tour::where('user_id', $userid)->pluck('floors');
     //   $createHotspot_array=$tour::where('user_id', $userid)->pluck('createHotspot');


       // $address=DB::select("select * from addresses where user_id='$userid';");
        //$meal=DB::select("select * from meals where user_id='$userid';");
        //return view('pages.visitSite')->with('address', $address)->with('meal',$meal);
        
    //}


    
}
