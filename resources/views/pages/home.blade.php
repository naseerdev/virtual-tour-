 @extends('layouts\app')
 
 
 @section('content')
 

 <section class="py-5"  id="home">

    <div class="background-home">
     <div class="container">
         <div class="row">
             <div class="col-lg-4 col-sm-12 text-center">
                 <h1 class="display-2 set-font-size mt-5 py-5 text-white">Enter Name of City</h1>
                 <p class="text-white lore mb-4" > Give Us City Name Then We Provide You Suitable Hostel For You.</p>
                 
                 <input class="form-control form-control-lg mb-4 py-4 " type="text" id="hname" placeholder="Enter City Name" required>
                 <button id="findhostel" class="btn btn-outline-primary tn-custom-style  btn-lg text-white"  role="button">Find Hostel <i class="fa fa-arrow-right text-white"></i></button>
                 
             </div>
             <div id="hostel_names" style="max-height:400px;text-align:center" class="col-lg-8 col-sm-12 d-none d-lg-block py-5 px-2">
         <h3 class="list-hostel"  >List of Available Hostels</h3>
 
 
             </div>
 
         </div>
 
 
     </div>       
 
    </div> 
 
 
 </section><!-- end of home section -->
 <section id="gallery">
     <div class="container-fluid">
         <div class="row mt-5">
             <div class="col-lg-12 text-center">
                 <h1 class="examplevt" >Examples of Virtual Tours</h1>

             </div>
             <div class="col-lg-3 col-md-6 mt-3 text-center justify-content-center">
                 <img id="entrance"  class="img-hover"  src="public\images\entrance.jpg" onclick="exampleImgs(this)">
                 <p class="pik-name" >Way of Entrance</p>
                
             </div>
             <div class="col-lg-3 col-md-6 mt-3 text-center justify-content-center">
                <img id="balcony" class="img-hover"  src="public\images\balcony.jpg" onclick="exampleImgs(this)">
                <p class="pik-name" >Balcony</p>
            </div>

            <div class="col-lg-3 col-md-6 mt-3 text-center justify-content-center">
                <img id="room" class="img-hover"  src="public\images\room1.jpg" onclick="exampleImgs(this)">
                <p class="pik-name" >Room</p>
            </div>


            <div class="col-lg-3 col-md-6 mt-3 text-center justify-content-center">
                <img id="living-room" class="img-hover"  src="public\images\living.jpg" onclick="exampleImgs(this)">
                <p class="pik-name" >living-room</p>
            </div>

         </div>

         

     </div>

     <div id="exampleTour" class="exampleTour">
        <div  class="show-roomName" id="show-roomName" >
        </div>
     </div>

 </section><!--end of gallery section -->
 <section id="resources">
     <div style="background-color:#f2f2f2;" id="about_us">
         <div class="container ">
             <div class="row">

                <div class="col-lg-12 text-center mt-5">
                    <h1 class="examplevt" >How It Works</h1>
   
                </div>
                <div class="col-lg-4 mt-4 text-center justify-content-center">
                    <p class="count">1</p>
                    <img width="300" height="350" src="public\images\How-to-do-it-photos-for-www-cameras-min-370x370.png">
                    <h3 class="pik-name">
                        Shoot Photos
                    </h3>
                    <p style="font-size: 15px">
                        Photograph a house with any 360 camera in 15 min. No photography skills needed.
                    </p>


                </div>
                <div class="col-lg-4 mt-4  text-center  justify-content-center">
                    <p class="count ">2</p>
                    
                    <div class="mx-auto"  style="width:360px;height:350px ">
                    <img style="position:relative" width="360" height="350"  src="public\images\unnamed.png"  >
                    <iframe class="set-video" width="155" height="319" src="https://www.youtube.com/embed/-JN8iex0yG8">
                    </iframe>
                    </div>
                
                    <h3 class="pik-name">
                        Create Tour
                    </h3>
                    <p style="font-size: 15px">
                        Upload photos directly from your phone to create an interactive vr tour in 10 min. No coding skills required. 


                    </p>
                </div>
                <div class="col-lg-4 mt-4 text-center justify-content-center">
                    <p class="count">3</p>
                    <img class="mt-5 mb-4"  width="300" height="270" src="public\images\vt.jpeg ">
                    <h3 class="pik-name">
                        Publish & Share
                    </h3>
                    <p style="font-size: 15px">
                        Publish immediately to any real estate portal or share on FACEBOOK. You can also EMBED it on your website.
                    </p>
                </div>
             </div>

             </div>
         </div>
     </div>




 </section><!-- end of about us section -->
 <section id="contact_us">
     <div class="container">
         <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <h1 class="examplevt" >Contact Us</h1>
             </div>
             <div class="col-lg-6 send-mail-img flex justify-content-center mt-5">
                 <img class="mt-4 mail-hover" width="300" height="250" src="public\images\How-To-Send-Email-To-New-Users.png" alt="Sent Mail">
             </div>
             
             <div class="col-lg-6 justify-content-center mt-5 less-margin">
                <form>
                <div class="wrap-input1 validate-input mt-3" data-validate="Name is required">
                <input class="form-control form-control-lg input-custom " type="text" id="name_std" placeholder="Name" required>
                </div>
                
                <div class="wrap-input1 validate-input mt-3" data-validate="Valid email is required: ex@abc.xyz">
                <input class="form-control form-control-lg input-custom" type="email" id="email_std" placeholder="Email" required>
                </div>
                <div class="wrap-input1 validate-input mt-3" data-validate="Subject is required">
                <input class="form-control form-control-lg input-custom" type="text" id="subject" placeholder="Subject" required> 
                </div>
                <div class="wrap-input1 validate-input mt-3" data-validate="Message is required">
                    <textarea style="width: 100%;height:100px;" class="input1" id="message" placeholder="Message" required></textarea>
                </div>
                <div class="flex justify-content-center mt-3" >
                <button id="sendMail" class="send-btn">Send Email <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </button>
                </div>
            </form>
             </div>
            
             

         </div>
     </div>




 </section><!-- end of contact us -->
 @include('inc.footer')
 <script>
       $(document).ready(function(){
        var enter="entrance";
        ExampleHotspot(enter);
        $("#show-roomName").html("");
        $("#show-roomName").append("<h3 id='current-room' class='heading-position'>"+'Entrance'+"<i style='display:inline;z-index:1000;margin-left:2px !important;' class='fa fa-fw fa-home ml-3' ></i><h3>  ");
    });  
    
    
$("#sendMail").click(function()
{
    emaidata={};
    var name=$("#name_std").val();
    var email=$("#email_std").val();
    var subject=$("#subject").val();
    var message=$("#message").val();
    emaidata.name=name;
    emaidata.email=email;
    emaidata.subject=subject;
    emaidata.message=message;
  // console.log(emaidata);
    
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


   $.ajax({ 
       type: "POST", 
       url: "sendbasicemail", 
       data:{'emaildata':JSON.stringify(emaidata)},
       error: function(xhr, status, error) {
      alert(xhr.responseText);
    },
    success:function(result)
    {
        console.log(result);
    }
    
});  

});


$("#findhostel").click(function()
{
    var hostelName= $("#hname").val();
    console.log(hostelName);
     
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



    $.ajax({ 
       type: "POST", 
       url: "getHostel", 
       data:{'hname':hostelName},
       error: function(xhr, status, error) {
      alert(xhr.responseText);
    },
    success:function(result)
    {
        
        for(var i=0;i<result.length;i++)
        {
            $("#hostel_names").append("<li  style='list-style-type:none;'><a class='h_hov'  style='color:white;font-size:25px;text-decoration:none;font-weight:100'"
                +"href='"+result[i].hostel_name+"' ><i class='fa fa-chevron-right ml-3'></i>"+result[i].hostel_name+"</a></li>");
            
        }
        
    }
    
}); 
    
});




     </script>


  @endsection
