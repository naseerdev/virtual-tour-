@extends('layouts.app')
@php


  $floor=json_encode($floors_array);
  $createhotspot=json_encode($createHotspot_array);
 $userid=json_encode($userid);
    

@endphp

@section('content')
<section  id="image_upload">
  
<div class="container-fluid">
  
    <div class="row ">
        <div class="col-lg-3 col-md-6 sidebar pt-3">
          <button style="width: 100% !important" id="backToDashboard" class="btn-lg btn-primary get-started-custom  ">Back To Dashboard</button> 
          <hr >
          <div class="row">
          <div class="col-lg-6 col-md-12 ">
              <button id="preview" type="button" class="btn btn-outline-success btn-lg">Preview</button>
          </div>
          <div class="col-lg-6 col-md-12">
            <button id="addNext" type="button" class="btn btn-outline-success btn-lg">Add Next </button>
          </div>
          <div class="col-lg-12 btn-group mt-2">
            <select id="dropdown-floor" class="mt-3 form-control  form-control-lg input-custom">
              
          </select>
              
            

          </div>
        </div>
        <div class="mt-4">
            <ul id="imglist" class="list-unstyled mt-n3" >
                
            </ul>
        </div>
        </div>
        <div class="col-lg-9 col-md-6 upload_button_area">
          <div id="roomsinput" >
            
            <div class="row mt-5">
              
                <div class="col-lg-3">
                
                <h4 class="text-primary custom-size-label">Enter Room Name</h4> 
                
                <input class="mt-3 form-control form-control-lg input-custom" type="text" id="room_name" name="room_name" placeholder="Room Name" >
              
                </div>
              
                <div id="divID" class="col-lg-3"> 
                  <h4 class="text-primary custom-size-label">Select Floor</h4> 
                  <select id="floors" class="mt-3 form-control form-control-lg input-custom increase-margin">
                      <option value="groundfloor">Grounf floor</option>
                      <option value="floor1">1st floor</option>
                      <option value="floor2">2nd floor</option>
                      <option value="floor3">3rd floor</option>
                      <option value="custom">Custom</option>
                  </select>
                </div>
              
                <div class="col-lg-3">
                  <h4 class="text-primary custom-size-label">Student Capacity</h4> 
                  <input class="mt-3 form-control form-control-lg input-custom " type="text" id="std_capacity" name="std_capacity" placeholder="Student Capacity">
                </div>
                <div class="col-lg-3">
                  <h4 class="text-primary custom-size-label">Current Livings</h4> 
                  <input class="mt-3 form-control form-control-lg input-custom increase-margin" type="text" id="current_livings" name="current_livings" placeholder="Current livings">
                </div>
            </div>
     
            <div class="row mt-5" >
              <div class=" col-lg-5 d-flex flex-column justify-content-center mt-5">
          
              <img src="public\images\dropzone_cloud.png" alt="cloud" class="mx-auto img-fluid d-block w-28 cloud_img" >
              <span class="input-group-btn mx-auto mt-2 ">
                <form id="image-form">
                  <span class="btn btn-primary btn-file custom-adj">
                    Select File  <input type="file" id="imgInp" required>
                  </span>
                </form>
              </span>
          <p class="mx-auto">Choose Panorama For Room.</p>
              </div>
      <div class=" col-lg-7">
      <img  id="img-upload"  />
  </div>

  <div class="mt-3 col-lg-4 mx-auto d-flex flex-column justify-content-center mt-5 ">
      <button id="add_room" onclick="addroom()" class="btn btn-primary aad-room">Add Room</button>
  </div>
         



</div>
       
     
          
          
   </div>
   <div id="panorama"  class="tour" >
    <div id="contextMenu" class="card primary" >
      <p class="mt-3 custom-hotspot-para">Create hotspot<i class="fa fa-fw fa-home ml-3" ></i></p>
      <hr class="end-margin" >
      <ul id="room-hotspot" class="nav nav-pills flex-column " style="cursor: pointer">
      </ul>
      
    </div>
    <div class="show-roomName" id="show-roomName" >
    </div>
    
              
          </div>
        </div>
        
</div>
</div>

</section>
<div class="t"> 
</div>

<script>
  
  var userID=JSON.parse(<?php echo $userid; ?> );



$("#imgInp").change(function() {
  //on change event  
  var file_data = $('#imgInp').prop('files')[0];
  formdata = new FormData();
  formdata.append('file', file_data);
  $.ajaxSetup({
      headers: {
          'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
  });

  $.ajax({
    url: "{{ route('ajaxupload.action') }}",
    type: "POST",
    data: formdata,
    contentType: false, // The content type used when sending data to the server.
    cache: false, // To unable request pages to be cached
    processData: false,
    success: function (result) {
      room = {};
      roomhotspot= {};
     
      room.path = result.path;
      console.log("should not ");
     
      

      
     // roomhotspot.room_name.path=result.path;
      
 

    
    $("#contextMenu").hide();

    
    },
    error: function(xhr, status, error) {
      alert(xhr.responseText);
    }
  });
 
});



if(<?php echo $floor; ?>.length>0 )
{
  flr=JSON.parse(<?php echo $floor; ?> );
  createH=JSON.parse (<?php echo  $createhotspot; ?>) ;
  //console.log(flr);

}


$("#backToDashboard").click(function()
{
  if(flr === undefined)
  {
    isnotdata();
    window.location = "http://localhost:8080/virtualtour/dashboard";
    console.log("if");

  }
  else
  {
    isdata();
    window.location = "http://localhost:8080/virtualtour/dashboard";
    console.log("else");

  }

});
  

 

$("#preview").click(function()
  {
    if(flr === undefined)
    {
      
      isnotdata();
      window.location = "http://localhost:8080/virtualtour/visitVirtually/"+userID;

    }
    else{
      
      isdata();
      window.location = "http://localhost:8080/virtualtour/visitVirtually/"+userID;
    }
    
  




  });


 


function isdata()
{
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


   $.ajax({ 
       type: "POST", 
       url: "tourUpdate", 
       data:  {'floors':JSON.stringify(floors),'createHotspot':JSON.stringify(createHotspot)},
       error: function(xhr, status, error) {
      alert(xhr.responseText);
    }
    
}); 


 //window.location={{ route('previewTour') }};
  

}
function isnotdata()
{
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


   $.ajax({ 
       type: "POST", 
       url: "tour", 
       data:  {'floors':JSON.stringify(floors),'createHotspot':JSON.stringify(createHotspot)},
       error: function(xhr, status, error) {
      alert(xhr.responseText);
    }
}); 

}

$( document ).ready(function() {
var florempty=false;
  if(floors.length===0)
  {
    florempty=true;
  }
  if(!florempty)
  {
    var FloorName=$("#dropdown-floor").find(":selected").attr("value");
  var SidebarRooms=GetRooms(FloorName,floors);
  $("#imglist").html("");
  for(var j=0;j<SidebarRooms.length;j++)
    {
      AddSidebarRoom(SidebarRooms[j].floorName,SidebarRooms[j].path,SidebarRooms[j].roomName);
    }

  }

  var FloorName=$("#dropdown-floor").find(":selected").attr("value");
  for(var i=0;i<createHotspot.length;i++)
  {
        if(FloorName===createHotspot[i].fName)
        {
            for(var obj in createHotspot[i].scenes)
            {
                for(var j=0;j< createHotspot[i].scenes[obj].hotSpots.length;j++)
                {
                  createHotspot[i].scenes[obj].hotSpots[j].clickHandlerFunc=hotspotClicked;
                  createHotspot[i].scenes[obj].hotSpots[j].createTooltipFunc=hotspotA;
                   //  console.log("success");
                }
            
                  
                    
                 
  
            }
        }
  }



});
     
</script>
@endsection