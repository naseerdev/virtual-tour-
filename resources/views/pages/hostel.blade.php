@extends('layouts.app')

@section('content')
@php
$userid=json_encode($userID);
    
@endphp

@foreach ($address as $address)
    

@foreach ($meal as $meal)
    


<section>

    <div id="visitSite" class="visitsite" >
        <div style="z-index:1" class="background-home">
            <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5 text-center">
                    <h1 class=" hostel-name">{{$address->hostel_name}}</h1>
                    <div class="hname-design col-lg-6 mx-auto">
    
                    </div>
                   
                        <p  class="info-tour">Click Here For Virtually Visit Hostel.  </p>
                        
                    
                </div>
            </div>
        </div>
        </div>

    </div>
    <div  class="btn-position">
    <button  id="visit-virtual" class="visit-virtually">Visit Hostel</button>
    </div>
</section><!-- end of virtually visit section -->
<section>
    <div class="container">
    <div class="row">
        <div class="col-lg-12 mt-5 text-center">
            <h3 class=" custom-font custom-size">Weekly Meal Information</h3>
            <p class=" custom-paragrah">Here is Information about meal which serve whole week.  </p>

        </div>
        <div class="col-lg-12 mt-5">
            <table class="table table-borderless table-condensed table-hover text-center ">
                <thead >
                  <tr >
                    <th scope="col"></th>
                    <th style="color:white;background-color:#21adc9;font-size:30px;border-radius:50px; "  >Breakfast</th>
                    <th style="color:white;background-color:#21adc9;font-size:30px;border-radius:50px;"   >Dinner</th>
                  </tr>
                </thead>
                <tbody>
                  <tr >
                    <th style="color:#21adc9;font-size:30px;" scope="row">Monday</th>
                    <td style="font-size:25px;color:#7A7777">{{$meal->monday_b}}</td>
                    <td style="font-size:25px;color:#7A7777">{{$meal->monday_d}}</td>
                    
                  </tr>
                  <tr>
                    <th style="color:#21adc9;font-size:30px;" scope="row">Tuesday</th>
                    <td style="font-size:25px;color:#7A7777">{{$meal->tuesday_b}}</td>
                    <td style="font-size:25px;color:#7A7777">{{$meal->tuesday_d}}</td>
                    
                  </tr>
                  <tr>
                    <th style="color:#21adc9;font-size:30px;" scope="row">Wednesday</th>
                    <td style="font-size:25px;color:#7A7777">{{$meal->wednesday_b}}</td>
                    <td style="font-size:25px;color:#7A7777">{{$meal->wednesday_d}}</td>

                  </tr>
                  <tr>
                    <th style="color:#21adc9;font-size:30px;" scope="row">Thursday</th>
                    <td style="font-size:25px;color:#7A7777">{{$meal->thursday_b}}</td>
                    <td style="font-size:25px;color:#7A7777">{{$meal->thursday_d}}</td>

                  </tr>
                  <tr>
                    <th style="color:#21adc9;font-size:30px;" scope="row">Friday</th>
                    <td style="font-size:25px;color:#7A7777">{{$meal->friday_b}}</td>
                    <td style="font-size:25px;color:#7A7777">{{$meal->friday_d}}</td>

                  </tr>
                  <tr>
                    <th style="color:#21adc9;font-size:30px;" scope="row">Saturday</th>
                    <td style="font-size:25px;color:#7A7777">{{$meal->saturday_b}}</td>
                    <td style="font-size:25px;color:#7A7777">{{$meal->saturday_d}}</td>

                  </tr>
                  <tr>
                    <th style="color:#21adc9;font-size:30px;" scope="row">Sunday</th>
                    <td style="font-size:25px;color:#7A7777">{{$meal->sunday_b}}</td>
                    <td style="font-size:25px;color:#7A7777">{{$meal->sunday_d}}</td>

                  </tr>
                </tbody>
              </table>

        </div>
        <div class="col-lg-12 mt-5 text-center">
            <h1 class=" custom-font custom-size">Wifi Availability</h1>
            <p class=" custom-paragrah">Does our hostel provides free wifi to students?  </p>
            <div class="col-sm-2  mx-auto make-wifi-responsive">
            <h1 class="wifi-avalibility">{{$address->wifi}}</h1>
            </div>
           <hr>
            <p class=" custom-paragrah mt-5">Other comments which hostel admin says about his hostel.  </p>
            <div class="form-group ">
                
                <textarea disabled class="form-control" name="exampleFormControlTextarea1" rows="3"  ><?php echo $address->admin_cmnt; ?></textarea>
              </div>

        </div>
        <div class="col-lg-6 text-center mt-5">
            <h1 class="contact">Contact Us</h1>
            <div class="row"> 
            <div class="col-lg-12 d-flex justify-content-center mt-3">
                <div class="d-flex">
                    <p style="color:#7A7777;font-size:28px" ><i style="color: #3490dc;margin-right:3px" class="fa fa-phone fa-1x"></i>Phone no:</p>
                         <p class="ph-no">{{$address->ph_no}}</p>
                </div>
            </div>

         <div class="col-lg-12 d-flex justify-content-center mt-2">
             <div class="d-flex">
                 <p style="color:#7A7777;font-size:28px" ><i style="color: #3490dc;margin-right:3px" class="fa fa-envelope fa-1x"></i>Email:</p>
                    <p class="ph-no">{{$address->email_add}}</p>
             </div>
         </div>

         <div class="col-lg-12 d-flex justify-content-center mt-2">
            <div class="d-flex">
                <p style="color:#7A7777;font-size:28px" ><i style="color: #3490dc;margin-right:3px" class="fa fa-home fa-1x"></i>Address:</p>
                   <p class="ph-no">{{$address->h_address}}</p>
            </div>
        </div>


         
            </div>


        </div>
        <div class="col-lg-6 d-flex justify-content-center">
          <a id="visit" class="v-hover">
                <img class="v-img"  src="public/images/circle.png">
            </a>
        </div>







    </div>
</div>

</section>
@endforeach
@endforeach



<script>
$( document ).ready(function() {
    $(".pnlm-controls-container").remove();
    
});

var adminhostelID;
$("#visit-virtual").click(function()
{
    adminhostelID=JSON.parse(<?php echo $userid; ?> );
    window.location = "http://localhost:8080/virtualtour/visitVirtually/"+adminhostelID;
    
});

$("#visit").click(function()
{
    adminhostelID=JSON.parse(<?php echo $userid; ?> );
    window.location = "http://localhost:8080/virtualtour/visitVirtually/"+adminhostelID;
    

});


   
 


</script>
@endsection