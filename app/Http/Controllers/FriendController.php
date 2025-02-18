<?php

namespace App\Http\Controllers;

use App\Friend;
use Illuminate\Http\Request;
use Auth;
use App\User;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $friend = new Friend;
       $adminhostelID=json_decode($request['adminhostelID']);
       $user_id = Auth::user()->id;
       if($user_id !== $adminhostelID)
       {

       $friend = Friend::firstOrNew(['user_id' =>$user_id,'friend_id'=>$adminhostelID]);
       
       $friend->save();
       }
      // DB::table('friends')::firstOrNew(['user_id' => $user_id],['friend_id'=>$adminhostelID]);
      
     

   //   $friend->user_id = Auth::user()->id;
   //    $friend->friend_id = $adminhostelID;
   //    $friend->save();
     //   Session::flash('success', 'Friend has been added');
     return response()->json("success");
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        //
    }
}
