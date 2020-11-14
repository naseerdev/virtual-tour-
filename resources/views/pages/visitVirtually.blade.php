@extends('layouts.app')

@section('content')
@php
  $floor=json_encode($floors_array);
  $createhotspot=json_encode($createHotspot_array);  
@endphp
<section class="preview-tour">
<div class="container-fluid">
    <div class="row">
        <div style="position:relative" class="col-lg-12 padding-end ">
            <div  id="left-sidebarMenu">
                <div class="col-lg-12 btn-group  mt-5 ">
                    <div class="row">
                    <div class="col-lg-12 btn-group mt-2 ">
                        <select id="dropdown-change-floor" class="mt-3 form-control  form-control-lg input-custom">
                          
                      </select>
                          
                        
            
                      </div>
                  <div class="mt-4 col-lg-12">
                    <ul id="imgList" class="list-unstyled mt-n3" >
                        
                    </ul>
                </div>
                    </div>
                      
                    
        
                  </div>
                
                 
            </div>
            <div class="set-position ml-auto" style="width:100%;height:100%;padding:0px !important;" id="panorama">
                <div  class="show-roomName" id="show-roomName" >
                </div>
               
             
            </div>
            <div style="position:absolute;top:55px;left:50px">
                   <button id="custom-lookbtn" class="btn btn-primary custom-look">Open Menu</button> </div>
           
                

        </div>
            
            

          
        </div>

    </div>


</div>
</section>
    <script>
        
if(<?php echo $floor; ?>.length>0 )
{
  flr=JSON.parse(<?php echo $floor; ?> );
  createH=JSON.parse (<?php echo  $createhotspot; ?>) ;
  console.log(flr);
  console.log(createH);

}






$( document ).ready(function() {
    if(floors.length===0)
  {
    florempty=true;
  }
  if(!flrempty)
  {
    var FloorName=$("#dropdown-change-floor").find(":selected").attr("value");
  var SidebarRooms=GetRooms(FloorName,floors);
  $("#imgList").html("");
  for(var j=0;j<SidebarRooms.length;j++)
    {
      Addsidebarroom(SidebarRooms[j].floorName,SidebarRooms[j].path,SidebarRooms[j].roomName);
    }

  }

  var Fname=$("#dropdown-change-floor").find(":selected").attr("value");
for(var i=0;i<createHotspot.length;i++)
{
      if(Fname===createHotspot[i].fName)
      {
          for(var obj in createHotspot[i].scenes)
          {
              for(var j=0;j< createHotspot[i].scenes[obj].hotSpots.length;j++)
              {
                createHotspot[i].scenes[obj].hotSpots[j].clickHandlerFunc=hotspotClicked;
                 //  console.log("success");
              }
          
                
                  
               

          }
      }
}
 










});









        </script>

@endsection