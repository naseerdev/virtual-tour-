@extends('layouts.app')

@section('content')
@php
$userid=json_encode($userID);
$ratings=json_encode($ratings);
    
@endphp

@foreach ($address as $address)
    

@foreach ($meal as $meal)
    


<section>

    <div id="visitSite" class="visitsite" >
        <div style="z-index:1" class="background-home">
            <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5 text-center">
                    <h1 id="hostel_N" class=" hostel-name">{{$address->hostel_name}}</h1>
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
    <div class="row">
    <div style="background-color:#F6F4F4 " class="col-lg-6 mt-5  justify-content-center">
      <div>
        <h1 class="contact mt-3">Give Ratting About This Hostel</h1>
        <fieldset style="margin:22px 38% !important" class="starability-fade"> 
          
          <input type="radio" id="rate1" name="rating" value="1" />
          <label for="rate1" title="Terrible">1 star</label>

          
          <input type="radio" id="rate2" name="rating" value="2" />
          <label for="rate2" title="Not good">2 stars</label>

          <input type="radio" id="rate3" name="rating" value="3" />
          <label for="rate3" title="Average">3 stars</label>

          <input type="radio" id="rate4" name="rating" value="4" />
          <label for="rate4" title="Very good">4 stars</label>
      
      
          <input type="radio" id="rate5" name="rating" value="5" />
          <label for="rate5" title="Amazing">5 stars</label>
         
        </fieldset>
        <input id="comment_review" style="margin: -10px !important" class="form-control form-control-lg input-custom" type="text" name="review_comment" placeholder="Comment about this hostel">
        <div class="d-flex justify-content-center mt-4">
        <button id="publish" class="btn btn-primary btn-lg">Publish</button>
        </div>
        


      </div>
     
        
   
    </div>

    <div style="background-color:#F6F4F4 " class="col-lg-6 mt-5 ">
      
      <h1 style="text-align: center" class="contact mt-3">Overall Ratings</h1>
     <div class="mt-4  flex justify-content-center">
      <span id="star1" class="fa fa-star auto-size "></span>
      <span id="star2" class="fa fa-star auto-size "></span>
      <span id="star3" class="fa fa-star auto-size "></span>
      <span id="star4" class="fa fa-star auto-size"></span>
      <span id="star5" class="fa fa-star auto-size"></span>
     </div>
     <div>
     <p style="text-align: center" id="Ratings"></p> 
     </div>
      


   
      <div>
        @if(count($Rating)>0)
        @foreach ($Rating as $Rat)
        <div  class="d-flex ">
          <p style="padding-top: 5px"><i class="fa fa-user user-cls mr-2"></i></p>


        <p style="font-size: 30px;color:black;">{{$Rat->uname}}</p>
        <div class="ml-3 " style="font-size:20px;width:100%">
        <p style="border: 0.5px solid#E5E5E5  ;border-radius:5px;padding-left:4px">{{$Rat->comment}}</p>
        </div>
        </div>
        
        @endforeach
        <div class="flex justify-content-center">
        {{$Rating->links()}} 
        </div>
       
        @else
        <p>No comments found</p>
        @endif
        
        
      </div>






    </div>




    </div>


    @endforeach
    @endforeach

    
</div>




<div style="position:fixed;top:50%;right:0;">
  <button  id="start-chat" class="btn btn-primary start-chat"><i style="color:white;margin-right:3px" class="fa fa-comments fa-1x"></i>Start Chat</button>
</div>











</section>
@include('inc.footer')



    



<script>


  $("#publish").click(function()
  {
    var rate=$("input[name='rating']:checked").val();
    var cmnt=$("#comment_review").val();
    adminhostelID=JSON.parse(<?php echo $userid; ?> );
    var Hname=$("#hostel_N").text();
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


   $.ajax({ 
       type: "POST", 
       url: "GiveReview", 
       data:{'rate':JSON.stringify(rate),'cmnt':JSON.stringify(cmnt),'adminhostelID':JSON.stringify(adminhostelID),'Hname':JSON.stringify(Hname)},
       error: function(xhr, status, error) {
      alert(xhr.responseText);
    },
    success:function(result)
    {
      if(result=="success");
      {
        location.reload();
      }
     
      
        
    }
    
});
    

    



  });


  var Rate;
var x;
var overallRating=0;
Rate=<?php echo $ratings; ?> ;

$( document ).ready(function() {
    $(".pnlm-controls-container").remove();
    for(var u=0;u<Rate.length;u++)
{

  
  x=Rate[u].rating;
  overallRating=overallRating+x;


}
var totalrating= overallRating/5;
console.log(totalrating);

  if(totalrating<=1)
  {
    $('#star1').css('color','black');
  $('#star2').css('color','black');
  $('#star3').css('color','black');
  $('#star4').css('color','black');
  $('#star5').css('color','black');
 
  }
  else if(totalrating<=2)
  {
  $('#star1').css('color','#f5bd23');
  

  }
  else if(totalrating<=3)
  {
    $('#star1').css('color','#f5bd23');
  $('#star2').css('color','#f5bd23');
  


  }
 else if(totalrating<=4)
 {
  $('#star1').css('color','#f5bd23');
  $('#star2').css('color','#f5bd23');
  $('#star3').css('color','#f5bd23');
  
  

 }
  
  else if(totalrating<=5){
    $('#star1').css('color','#f5bd23');
  $('#star2').css('color','#f5bd23');
  $('#star3').css('color','#f5bd23');
  $('#star4').css('color','#f5bd23');
 

  }
  else if(totalrating==5)
{
  $('#star1').css('color','#f5bd23');
  $('#star2').css('color','#f5bd23');
  $('#star3').css('color','#f5bd23');
  $('#star4').css('color','#f5bd23');
  $('#star5').css('color','#f5bd23');

}

$("#Ratings").text(totalrating+"/5");

  






    
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

$("#start-chat").click(function()
{
  adminhostelID=JSON.parse(<?php echo $userid; ?> );
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


   $.ajax({ 
       type: "POST", 
       url: "startChat", 
       data:{'adminhostelID':JSON.stringify(adminhostelID)},
       error: function(xhr, status, error) {
      alert(xhr.responseText);
    },
    success:function(result)
    {
      if(result=="success")
      {
        window.location="http://localhost:8080/virtualtour/chat";

      }
      
        
    }
    
});  

});


   
 


</script>
@endsection