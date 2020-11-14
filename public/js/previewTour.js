/* pannellum.viewer('panorama', {
    "type": "equirectangular",
    "panorama": "http://localhost:8080/virtualtour/public/images/balcony-min-min.jpg",
    "autoLoad": true
});


/*
var openMenu=document.createElement("BUTTON");
    openMenu.innerHTML="Open Menu";
    openMenu.setAttribute('id','custom-lookbtn');
    $("#panorama").append(openMenu);
    
    $("#custom-lookbtn").addClass("btn btn-primary custom-look"); */


$("#custom-lookbtn").click(function()
{
   
    $("#left-sidebarMenu").addClass("col-lg-3 col-md-6");
     $("#panorama").addClass("col-lg-9 col-md-6");
     $("#panorama").removeClass("col-lg-12");
    $("#custom-lookbtn").css("visibility","hidden");

    $("#left-sidebarMenu").css("visibility","visible");
    $("#left-sidebarMenu").addClass("sidebar");
    $("#left-sidebarMenu").css("padding","0px");
    $("#left-sidebarMenu").attr("position","relative");
    var btn=document.createElement("BUTTON");
    btn.setAttribute("id","closeMenu");
    btn.innerHTML='Close Menu';
    var para=document.createElement("p");
    para.setAttribute("id","yourTour");
    para.innerHTML='Here is your Tour';
    $("#left-sidebarMenu").append(para);
    $("#yourTour").css("padding","6px");
    $("#yourTour").addClass("custom-para-style");
   
   
    btn.setAttribute("onclick","Menuclose()");

    $("#left-sidebarMenu").append(btn);
    $("#closeMenu").addClass("btn btn-primary custom-close-menu");

});

function Menuclose()
{ 
    $("#panorama").removeClass("col-lg-9 col-md-6");
    $("#panorama").addClass("col-lg-12");
    $("#left-sidebarMenu").css("visibility","hidden");
    $("#custom-lookbtn").css("visibility","visible");
    $("#yourTour").remove();
    $("#closeMenu").remove();

    
    
}


$("#dropdown-change-floor").html("");

  for(var i=0;i<floors.length;i++)
  {
 // var selected=(floorName===floors[i].floorName)?"selected":"";
  $("#dropdown-change-floor").append("<option  value='" + floors[i].floorName + "'>" + floors[i].floorName + "</option>");
  }




  function Addsidebarroom(FloorName,IMGPath,RoomName)
     {
  $("#imgList").append("<li class='room' data-floor='"+FloorName+"'  style='position:relative;margin-bottom:8px;cursor:pointer;'><img style='width:100%;height:180px;position:relative;' src=http://localhost:8080/virtualtour/"+IMGPath+" onclick='imageselect(this)'  />"
   +"<p style='position:absolute; bottom:-16px;padding-bottom:3px;background-color:#3490dc;width:100%;text-align:center ;color:white;font-size:12px'>"+RoomName+"</p></li>");
   }



   $("#dropdown-change-floor").change(function(){
  
    var v=0;
    var FloorName=$("#dropdown-change-floor").find(":selected").attr("value");
    var SidebarRooms=GetRooms(FloorName,floors);
    roomHSpot(SidebarRooms[v].roomName);
    $("#imgList").html("");
      for(var i=0;i<SidebarRooms.length;i++)
      {
        Addsidebarroom(SidebarRooms[i].floorName,SidebarRooms[i].path,SidebarRooms[i].roomName);
      }
      
      
  
  });


  function imageselect(img) {
      
    $("#panorama").show();
     $("#roomsinput").hide();
     $(".pnlm-hotspot").remove();
   

var src = img.src;
var FloorName=$("#dropdown-change-floor").find(":selected").attr("value");
for(i=0;i<createHotspot.length;i++)
{
  if(FloorName===createHotspot[i].fName)
  {
      
    for(var obj in createHotspot[i].scenes)
    {
      
      if(createHotspot[i].scenes[obj].panorama===src)
      {
        
        roomHSpot(obj);
        
      } 
    }

  }
}

$("#contextMenu").hide();

}



function roomHSpot(CpanoramaRoomname)
{
 
  var FloorName=$("#dropdown-change-floor").find(":selected").attr("value");
 
  defaultRoom={};
  defaultRoom={
  "default": {
        "firstScene": CpanoramaRoomname,
        "sceneFadeDuration": 1000,
        "autoLoad":"true",
        "autoRotate": -2, 
        "compass": true,


  }
};



for(var i=0;i<createHotspot.length;i++)
{
  if(FloorName===createHotspot[i].fName)
  {
    //$.extend(a,createHotspot[i].);
    defaultRoom.scenes=createHotspot[i].scenes;
    console.log(defaultRoom);
    
    
   
  }
}

 





 viewer =pannellum.viewer('panorama',defaultRoom);









 

 $("#show-roomName").html("");
 $("#show-roomName").append("<h3 id='current-room' class='heading-position'>"+defaultRoom["default"].firstScene+"<i style='display:inline;z-index:1000;margin-left:2px !important;' class='fa fa-fw fa-home ml-3' ></i><h3>  ");

}




var FloorName_current=$("#dropdown-change-floor").find(":selected").attr("value");
for(i=0;i<createHotspot.length;i++)
{
  if(FloorName_current===createHotspot[i].fName)
  {
    for(var obj in createHotspot[i].scenes)
    {
      
        roomHSpot(obj);
        break;
      
    }
  }
}










