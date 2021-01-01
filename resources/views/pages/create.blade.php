@extends('layouts.app')

@section('content')

<section id="form">
    <div class="container ">
        {!! Form::open(['action' => 'addressController@store','method' =>'POST']) !!}
        <div class="form-group row  container-margin">
            <div class=" col-lg-12 ">
                <h1 class=" custom-font custom-size">Create</h1>
                <p class=" custom-paragrah">Now Provide Us All information About Your hostel.  </p>
                 
    
            </div>
            <div class="col-md-5 col-sm-12 mt-5 responsive-top ">
                <h3 class="text-muted form-labels">Enter your Hostel Name</h3>
            </div>
            <div class="col-md-5 col-sm-12 mt-5  responsive-bottom">
                <input class="form-control form-control-lg input-custom" type="text" name="hostel" placeholder="Enter Hostel Name" required>
            </div>


            <div class="col-md-5 col-sm-12 mt-5 responsive-top ">
                <h3 class="text-muted form-labels">Enter your phone number</h3>
            </div>
            <div class="col-md-5 col-sm-12 mt-5  responsive-bottom">
                <input class="form-control form-control-lg input-custom" type="tel" name="phone" placeholder="Enter Phone Number" required>
            </div>

            <div class="col-md-5 col-sm-12 mt-5 responsive-top ">
                <h3 class="text-muted form-labels">Enter your Email address</h3>
            </div>
            <div class="col-md-5 col-sm-12 mt-5  responsive-bottom">
                <input class="form-control form-control-lg input-custom" type="email" name="email" placeholder="Enter Email Address" required>
            </div>
    
            <div class="col-md-5 col-sm-12 mt-5 responsive-top ">
                <h3 class="text-muted form-labels">Enter City Name</h3>
            </div>
            <div class="col-md-5 col-sm-12 mt-5  responsive-bottom">
                <input class="form-control form-control-lg input-custom" type="text" name="city" placeholder="Enter City Name" required>
            </div>
    
    
    
            <div class="col-md-5 col-sm-12 mt-5 responsive-top ">
                <h3 class="text-muted form-labels">Your Hostel Address</h3>
            </div>
            <div class="col-md-5 col-sm-12 my-5  responsive-bottom">
                <input class="form-control form-control-lg input-custom" type="text" name="address" placeholder="Enter Address" required>
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
                      <input type="radio" name="options" id="option1" autocomplete="off" checked> YES
                    </label>
                    <label class="btn btn-primary custom-size-button">
                      <input type="radio" name="options" id="option2" autocomplete="off"> NO
                    </label>
                    
                  </div>
        </div>
        <hr>
    </div><!-- end of wifi avalibility section -->
    
    
    
    <div class="container mt-5">
        <div class="row  text-center"> 
                <div class=" col-lg-12 mt-3">
                    <h1 class=" custom-font custom-size">Weekly Meal Information</h1>
                    <p class=" custom-paragrah">Provides information on what to eat for all weak.  </p>
                     
                </div>
        </div>
        <div class="row mt-5">    
         <div class="col-lg-4 col-md-12 col-sm-12">
           
            <h3 class="label-design">Monday</h3>
         </div>  
        
             <div class="col-lg-4 col-md-6 col-sm-12 days-responsive">
         
            <input class="form-control form-control-lg input-custom input-meal" type="text" name="monday_breakfast" placeholder="Breakfast" required>
    
             </div>
             <div class="col-lg-4 col-md-6 col-sm-12">
                <input class="form-control form-control-lg input-custom input-meal" type="text" name="monday_dinner" placeholder="Dinner" required>
            </div>
            
         </div><!-- end of monday -->
         <div class="row mt-2">    
            <div class="col-lg-4 col-md-12 col-sm-12">
              
               <h3 class="label-design">Tuesday</h3>
            </div>  
           
                <div class="col-lg-4 col-md-6 col-sm-12 days-responsive">
            
               <input class="form-control form-control-lg input-custom input-meal" type="text" name="tuesday_breakfast" placeholder="Breakfast" required>
       
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                   <input class="form-control form-control-lg input-custom input-meal" type="text" name="tuesday_dinner" placeholder="Dinner" required>
               </div>
               
            </div><!-- end of tuesday -->
            <div class="row mt-2">    
                <div class="col-lg-4 col-md-12 col-sm-12">
                  
                   <h3 class="label-design">Wednesday</h3>
                </div>  
               
                    <div class="col-lg-4 col-md-6 col-sm-12 days-responsive">
                
                   <input class="form-control form-control-lg input-custom input-meal" type="text" name="wednesday_breakfast" placeholder="Breakfast" required>
           
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                       <input class="form-control form-control-lg input-custom input-meal" type="text" name="wednesday_dinner" placeholder="Dinner" required>
                   </div>
                   
                </div><!-- end of wednesday -->
                <div class="row mt-2">    
                    <div class="col-lg-4 col-md-12 col-sm-12">
                      
                       <h3 class="label-design">Thursday</h3>
                    </div>  
                   
                        <div class="col-lg-4 col-md-6 col-sm-12 days-responsive">
                    
                       <input class="form-control form-control-lg input-custom input-meal" type="text" name="thursday_breakfast" placeholder="Breakfast" required>
               
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                           <input class="form-control form-control-lg input-custom input-meal" type="text" name="thursday_dinner" placeholder="Dinner" required>
                       </div>
                       
                    </div><!-- end of thursday -->
                    <div class="row mt-2">    
                        <div class="col-lg-4 col-md-12 col-sm-12">
                          
                           <h3 class="label-design">Friday</h3>
                        </div>  
                       
                            <div class="col-lg-4 col-md-6 col-sm-12 days-responsive">
                        
                           <input class="form-control form-control-lg input-custom input-meal" type="text" name="friday_breakfast" placeholder="Breakfast" required>
                   
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                               <input class="form-control form-control-lg input-custom input-meal" type="text" name="friday_dinner" placeholder="Dinner" required>
                           </div>
                           
                        </div><!-- end of friday -->
                        <div class="row mt-2">    
                            <div class="col-lg-4 col-md-12 col-sm-12">
                              
                               <h3 class="label-design">Saturday</h3>
                            </div>  
                           
                                <div class="col-lg-4 col-md-6 col-sm-12 days-responsive">
                            
                               <input class="form-control form-control-lg input-custom input-meal" type="text" name="saturday_breakfast" placeholder="Breakfast" required>
                       
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                   <input class="form-control form-control-lg input-custom input-meal" type="text" name="saturday_dinner" placeholder="Dinner" required>
                               </div>
                               
                            </div><!-- end of saturday -->
                            <div class="row mt-2">    
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                  
                                   <h3 class="label-design">Sunday</h3>
                                </div>  
                               
                                    <div class="col-lg-4 col-md-6 col-sm-12 days-responsive">
                                
                                   <input class="form-control form-control-lg input-custom input-meal" type="text" name="sunday_breakfast" placeholder="Breakfast" required>
                           
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                       <input class="form-control form-control-lg input-custom input-meal" type="text" name="sunday_dinner" placeholder="Dinner" required>
                                   </div>
                                   
                                </div><!-- end of sunday -->
    
    
    
                                <div class="container mt-5 mb-5">
                                    <div class="row  text-center"> 
                                        <div class=" col-lg-12 mt-3">
                                    
                                            <p class=" custom-paragrah">Other comments you want to give about your hostel write here.  </p>
                                            <div class="form-group">
                                                
                                                <textarea class="form-control" name="exampleFormControlTextarea1" rows="3" required></textarea>
                                              </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <hr>
    
    
    
    </div><!-- end of meal info -->
    
    <div class="container mt-5 mb-5">
        <div class="row  text-center"> 
                <div class=" col-lg-12 mt-3">
                    <h1 class=" custom-font custom-size">Create Virtual Tour</h1>
                    <p class=" custom-paragrah">Define rooms and provide panorama shots of each room.  </p>
                     
                </div>
                <div class="col-lg-3 mx-auto">
                {{Form::submit('Get Started',['class'=>'btn btn-primary get-started-custom'])}}
                </div>
        </div>
    </div>

       
    
    
    </section><!-- end of input form layout -->
    {!! Form::close() !!}
    @include('inc.footer')
    @endsection
   