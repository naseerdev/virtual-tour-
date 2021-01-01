@extends('layouts.app')

@section('content')

<section id="form">
   
        
    
        @foreach($address as $address)
    
    <div class="container ">
        
        {!! Form::open(['action' => 'addressController@update','method' =>'POST']) !!}
        
        <div class="form-group row  container-margin">
            <div class=" col-lg-12 ">
                <h1 class=" custom-font custom-size">Update</h1>
                <p class=" custom-paragrah">Here you can change the information about your hostel.  </p>
                 
    
            </div>
            <div class="col-md-5 col-sm-12 mt-5 responsive-top ">
                <h3 class="text-muted form-labels">Update your Hostel Name</h3>
            </div>
            <div class="col-md-5 col-sm-12 mt-5  responsive-bottom">
                <input class="form-control form-control-lg input-custom" type="text" name="hostel" value=" {{$address->hostel_name}}" required>
            </div>

            <div class="col-md-5 col-sm-12 mt-5 responsive-top ">
                <h3 class="text-muted form-labels">Update your phone number</h3>
            </div>
            <div class="col-md-5 col-sm-12 mt-5  responsive-bottom">
                <input class="form-control form-control-lg input-custom" type="tel" name="phone" value="{{$address->ph_no}}" required >
            </div>

            <div class="col-md-5 col-sm-12 mt-5 responsive-top ">
                <h3 class="text-muted form-labels">Update your Email address</h3>
            </div>
            <div class="col-md-5 col-sm-12 mt-5  responsive-bottom">
                <input class="form-control form-control-lg input-custom" type="email" name="email" value="{{$address->email_add }}" required>
            </div>
    
            <div class="col-md-5 col-sm-12 mt-5 responsive-top ">
                <h3 class="text-muted form-labels">Update City Name</h3>
            </div>
            <div class="col-md-5 col-sm-12 mt-5  responsive-bottom">
                <input class="form-control form-control-lg input-custom" type="text" name="city" value="{{$address->city }}" required>
            </div>
    
    
    
            <div class="col-md-5 col-sm-12 mt-5 responsive-top ">
                <h3 class="text-muted form-labels">Update Hostel Address</h3>
            </div>
            <div class="col-md-5 col-sm-12 my-5  responsive-bottom">
                <input class="form-control form-control-lg input-custom" type="text" name="address" value="{{$address->h_address}}" required >
            </div>
        </div>
    </div><!-- end of address -->
    
    <div class="container mt-3">
        <div class="row  text-center "> 
                <div class=" col-lg-12 mt-3 ">
                    <h1 class=" custom-font custom-size">Wifi Availability</h1>
                    <p class=" custom-paragrah">Does your hostel provides free wifi to students?  </p>
                     
                </div>
                
                <div class=" btn-group  btn-group-toggle col-lg-3 mx-auto " data-toggle="buttons">
                    <label class="btn btn-primary active custom-size-button">
                      <input type="radio" name="options"  value="yes" autocomplete="off" checked> YES
                    </label>
                    <label class="btn btn-primary custom-size-button">
                      <input type="radio" name="options" value="no" autocomplete="off"> NO
                    </label>
                    
                  </div>
        </div>
        <hr>
    </div><!-- end of wifi avalibility section -->
    
   @endforeach
    
    
    <div class="container mt-5">
        <div class="row  text-center"> 
                <div class=" col-lg-12 mt-3">
                    <h1 class=" custom-font custom-size">Update Weekly Meal Information</h1>
                    <p class=" custom-paragrah">Provides information on what to eat for all weak.  </p>
                     
                </div>
        </div>
  @foreach ($meal as $meal)
      
  

        <div class="row mt-5">    
         <div class="col-lg-4 col-md-12 col-sm-12">
           
            <h3 class="label-design">Monday</h3>
         </div>  
        
             <div class="col-lg-4 col-md-6 col-sm-12 days-responsive">
         
            <input class="form-control form-control-lg input-custom input-meal" type="text" name="monday_breakfast" placeholder="breakfast" value="{{$meal->monday_b}}" required>
    
             </div>
             <div class="col-lg-4 col-md-6 col-sm-12">
                <input class="form-control form-control-lg input-custom input-meal" type="text" name="monday_dinner" placeholder="dinner" value="{{$meal->monday_d}}" required>
            </div>
            
         </div><!-- end of monday -->
         <div class="row mt-2">    
            <div class="col-lg-4 col-md-12 col-sm-12">
              
               <h3 class="label-design">Tuesday</h3>
            </div>  
           
                <div class="col-lg-4 col-md-6 col-sm-12 days-responsive">
            
               <input class="form-control form-control-lg input-custom input-meal" type="text" name="tuesday_breakfast" placeholder="breakfast" value="{{$meal->tuesday_b}}" required>
       
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                   <input class="form-control form-control-lg input-custom input-meal" type="text" name="tuesday_dinner" placeholder="dinner" value="{{$meal->tuesday_d}}" required>
               </div>
               
            </div><!-- end of tuesday -->
            <div class="row mt-2">    
                <div class="col-lg-4 col-md-12 col-sm-12">
                  
                   <h3 class="label-design">Wednesday</h3>
                </div>  
               
                    <div class="col-lg-4 col-md-6 col-sm-12 days-responsive">
                
                   <input class="form-control form-control-lg input-custom input-meal" type="text" name="wednesday_breakfast" placeholder="Breakfast" value="{{$meal->wednesday_b}}" required>
           
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                       <input class="form-control form-control-lg input-custom input-meal" type="text" name="wednesday_dinner" placeholder="Dinner" value="{{$meal->wednesday_d}}" required>
                   </div>
                   
                </div><!-- end of wednesday -->
                <div class="row mt-2">    
                    <div class="col-lg-4 col-md-12 col-sm-12">
                      
                       <h3 class="label-design">Thursday</h3>
                    </div>  
                   
                        <div class="col-lg-4 col-md-6 col-sm-12 days-responsive">
                    
                       <input class="form-control form-control-lg input-custom input-meal" type="text" name="thursday_breakfast" placeholder="Breakfast" value="{{$meal->thursday_b}}" required>
               
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                           <input class="form-control form-control-lg input-custom input-meal" type="text" name="thursday_dinner" placeholder="Dinner" value="{{$meal->thursday_d}}" required>
                       </div>
                       
                    </div><!-- end of thursday -->
                    <div class="row mt-2">    
                        <div class="col-lg-4 col-md-12 col-sm-12">
                          
                           <h3 class="label-design">Friday</h3>
                        </div>  
                       
                            <div class="col-lg-4 col-md-6 col-sm-12 days-responsive">
                        
                           <input class="form-control form-control-lg input-custom input-meal" type="text" name="friday_breakfast" placeholder="Breakfast" value="{{$meal->friday_b}}" required>
                   
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                               <input class="form-control form-control-lg input-custom input-meal" type="text" name="friday_dinner" placeholder="Dinner" value="{{$meal->friday_d}}" required>
                           </div>
                           
                        </div><!-- end of friday -->
                        <div class="row mt-2">    
                            <div class="col-lg-4 col-md-12 col-sm-12">
                              
                               <h3 class="label-design">Saturday</h3>
                            </div>  
                           
                                <div class="col-lg-4 col-md-6 col-sm-12 days-responsive">
                            
                               <input class="form-control form-control-lg input-custom input-meal" type="text" name="saturday_breakfast" placeholder="Breakfast" value="{{$meal->saturday_b}}" required>
                       
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                   <input class="form-control form-control-lg input-custom input-meal" type="text" name="saturday_dinner" placeholder="Dinner" value="{{$meal->saturday_d}}" required>
                               </div>
                               
                            </div><!-- end of saturday -->
                            <div class="row mt-2">    
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                  
                                   <h3 class="label-design">Sunday</h3>
                                </div>  
                               
                                    <div class="col-lg-4 col-md-6 col-sm-12 days-responsive">
                                
                                   <input class="form-control form-control-lg input-custom input-meal" type="text" name="sunday_breakfast" placeholder="Breakfast" value="{{$meal->sunday_b}}" required>
                           
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                       <input class="form-control form-control-lg input-custom input-meal" type="text" name="sunday_dinner" placeholder="Dinner" value="{{$meal->sunday_d}}" required>
                                   </div>
                                   
                                </div><!-- end of sunday -->
    
    
    
                                <div class="container mt-5 mb-5">
                                    <div class="row  text-center"> 
                                        <div class=" col-lg-12 mt-3">
                                    
                                            <p class=" custom-paragrah">Other comments you want to give about your hostel write here.  </p>
                                            <div class="form-group">
                                                
                                                <textarea class="form-control" name="exampleFormControlTextarea1" rows="3" required ><?php echo $address->admin_cmnt; ?></textarea>
                                              </div>
                                        </div>


                                        <div class="col-lg-3 mx-auto">
                                            {{Form::hidden('_method','GET')}}
                                            {{Form::submit('Update',['class'=>'btn btn-primary get-started-custom'])}}
                                            {!! Form::close() !!}
                                            </div>
                                        
                                    </div>
                                </div>
                                
                                <hr>
                                
                                @endforeach

    
    
    </div><!-- end of meal info -->
   
    <div class="container mt-5 mb-5">
        <div class="row  text-center"> 
                <div class=" col-lg-12 mt-3">
                    <h1 class=" custom-font custom-size">Update Virtual Tour</h1>
                    <p class=" custom-paragrah">Update rooms and panorama shots of each room.  </p>
                     
                </div>
                <div class="col-lg-3 mx-auto">
                    <button onclick="location.href='{{ url('/createTour') }}'" class='btn btn-primary get-started-custom'>Update Tour</button>
               
                </div>
        </div>
    </div>

       
    
    
    </section><!-- end of input form layout -->
    @include('inc.footer')
    @endsection
   