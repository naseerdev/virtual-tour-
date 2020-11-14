<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\address;
use App\meal;
use DB;
class addressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      /*  $this->validate($request,[
            'hostel'=>'required',
            'city'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'monday_breakfast'=>'required',
            'monday_dinner'=>'required'

        ]);*/
        // create address model
        $address =new address;
        $meal =new meal;
        $address->hostel_name=$request->input('hostel');
        $address->h_address =$request->input('address');
        $address->city =$request->input('city');
        $address->ph_no =$request->input('phone');
        $address->email_add =$request->input('email');
        $address->wifi =$request->input('options');
        $address->admin_cmnt =$request->input('exampleFormControlTextarea1');
        $address->user_id=auth()->user()->id;
        $address->save();
        
        $meal->monday_b=$request->input('monday_breakfast');
        $meal->monday_d=$request->input('monday_dinner');
        $meal->tuesday_b=$request->input('tuesday_breakfast');
        $meal->tuesday_d=$request->input('tuesday_dinner');
        $meal->wednesday_b=$request->input('wednesday_breakfast');
        $meal->wednesday_d=$request->input('wednesday_dinner');
        $meal->thursday_b=$request->input('thursday_breakfast');
        $meal->thursday_d=$request->input('thursday_dinner');
        $meal->friday_b=$request->input('friday_breakfast');
        $meal->friday_d=$request->input('friday_dinner');
        $meal->saturday_b=$request->input('saturday_breakfast');
        $meal->saturday_d=$request->input('saturday_dinner');
        $meal->sunday_b=$request->input('sunday_breakfast');
        $meal->sunday_d=$request->input('sunday_dinner');
        $meal->user_id=auth()->user()->id;
        $meal->save();




        
        return redirect('createTour');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
       
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $userid=auth()->user()->id;
        $address=DB::select("select * from addresses where user_id='$userid';");
        $meal=DB::select("select * from meals where user_id='$userid';");
        return view('pages.update')->with('address', $address)->with('meal',$meal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   



    public function update(Request $request)
    {
        
        $userid=auth()->user()->id;
        DB::table('addresses')
            ->where('user_id', $userid)
            ->update([ 'hostel_name'=>$request->input('hostel'),
                       'h_address'=>$request->input('address'),
                       'city'=>$request->input('city'),
                       'wifi'=>$request->input('options'),
                       'ph_no'=>$request->input('phone'),
                       'email_add'=>$request->input('email'),
                       'admin_cmnt'=>$request->input('exampleFormControlTextarea1')
                        ]);
        DB::table('meals')
                ->where('user_id', $userid)
                 ->update([ 'monday_b'=>$request->input('monday_breakfast'),
                 'monday_d'=>$request->input('monday_dinner'),
                 'tuesday_b'=>$request->input('tuesday_breakfast'),
                 'tuesday_d'=>$request->input('tuesday_dinner'),
                 'wednesday_b'=>$request->input('wednesday_breakfast'),
                 'wednesday_d'=>$request->input('wednesday_dinner'),
                 'thursday_b'=>$request->input('thursday_breakfast'),
                 'thursday_d'=>$request->input('thursday_dinner'),
                 'friday_b'=>$request->input('friday_breakfast'),
                 'friday_d'=>$request->input('friday_dinner'),
                 'saturday_b'=>$request->input('saturday_breakfast'),
                 'saturday_d'=>$request->input('saturday_dinner'),
                 'sunday_b'=>$request->input('sunday_breakfast'),
                 'sunday_d'=>$request->input('sunday_dinner')
                          
                                    ]);                



                                    $userid=auth()->user()->id;
                                    $address=DB::select("select * from addresses where user_id='$userid';");
                                    $meal=DB::select("select * from meals where user_id='$userid';");
                                    return view('pages.update')->with('address', $address)->with('meal',$meal);
                        
                                  

            


        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
